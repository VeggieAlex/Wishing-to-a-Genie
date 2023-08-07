<?php

namespace src\Application\Commands;

use accountInterface;
use Exception;
use Ramsey\Uuid\Uuid;

/**
 * account class
 */
 class Account implements accountInterface
 {
     /**
      * Dummy database of account UUIDs
      *
      * @var array|string[]
      */
     private array $uuidArray  = [
         '72fb8906-c1d7-45b3-b805-ee9b96285ae0',
         'e338d148-45d3-40ef-ac2e-a234b48c4a22',
         '1085648a-0cb4-4b16-aabc-b6d25af0b9ac',
     ];

     /**
      * @var InterestAccount
      */
     private InterestAccount $interestAccount;

     /**
      * @var Statement
      */
     private Statement $statements;

     /**
      * @var SkippedPayment
      */
     private SkippedPayment $skippedChange;

     /**
      * @param InterestAccount $interestAccount
      * @param Statement $statements
      * @param SkippedPayment $skippedChange
      *
      */
     public function __construct(
         InterestAccount $interestAccount,
         Statement $statements,
         SkippedPayment $skippedChange
     )
     {
         $this->interestAccount = $interestAccount;
         $this->statements = $statements;
         $this->skippedChange = $skippedChange;
     }


     /**
      * @param UserId|Uuid|\UserId $userId
      * @return InterestAccount
      * @throws Exception
      */
     public function openInterestAccount(UserId|Uuid|\UserId $userId): InterestAccount
     {
         if (in_array($userId, $this->uuidArray)) {
             throw new Exception('User already exists in the system.');
         } else {
             return new interestAccount($userId, $this->getIncome($userId), $this->calculateInterest($this->getIncome($userId)));
         }

     }

     /**
      * Deposit funds into the account
      *
      * @param $amount
      * @return void
      */
     public function deposit($amount): void
     {
         $currentAmount = $this->interestAccount->getAmount();

         $this->interestAccount->setAmount($currentAmount + $amount);
     }

     /**
      * Calculate interest based on income.
      *
      * @param int $income
      * @return float
      */
     public function calculateInterest(int $income): float
     {
         // Determine interest rate based on user income divided by 100
         $income = $income / 100;
             if ($income === null) {
                 return 0.5;
             } elseif ($income < 5000) {
                 return 0.93;
             } else {
                 return 1.2;
             }
     }

     /**
      * Looks into what interest has been incurred and adds it accordingly
      *
      * @return float
      */
     public function generateInterest(): float
     {
         $pendingChange = [];
         $changeOnHold = $this->skippedChange->getSkippedChange();
         $amountInAccount = $this->interestAccount->getAmount();
         $updatedAmountInAccount = $amountInAccount + $changeOnHold ;
            if ($changeOnHold  > .1) {
                $pendingChange[] = $changeOnHold ;
            } else {
                $updatedAmountInAccount += $changeOnHold;
            }
            return $updatedAmountInAccount;
     }

     /**
      * Account statement list.
      *
      * @return array
      */
     public function listAccountStatements(): array
     {
         $transactions = [];

         // Get all regular transactions
         $regularTransactions = $this->statements->getTransactions();
         foreach ($regularTransactions as $transaction) {
             $transactions[] = $transaction;
         }

         // Calculate and add interest payouts as transactions
         $interestPayouts = $this->statements->getInterestPayouts();
         foreach ($interestPayouts as $payout) {
             $transactions[] = $payout;
         }

         return $transactions;
     }

     /**
      * Pretend this is the income API
      */
     public function getIncome(UUID $userId): int
     {
         switch ($userId) {
             case "88224979-406e-4e32-9458-55836e4e1f95":
                 return 499999;
             case "1085648a-0cb4-4b16-aabc-b6d25af0b9ac":
                 return 10000000000;
             default:
                 return 100000000000000;
         }
     }
 }
