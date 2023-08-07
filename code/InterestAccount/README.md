# **Interest Account Library Notes**

In this task I showed my ability to create classes and methods in order to achieve the purpose of creating a 
library to provide interest account functionality when used. 

I wrote phpunit tests (some are mock tests) for all methods in the class to prove that the methods within the classes 
do work and ran them through PHPStorm IDE though you can also run the tests in the terminal 
with this command: _./vendor/bin/phpunit Tests_. I was having difficulties getting PHPUnit to find the class it needed
to test though.

I installed composer as my dependency manager in order to use:
* ramsey/uuid
* guzzle
* phpunit

## The following classes I created: 
* Account
* interestAccount
* Statement
* User
* UserId
* SkippedPayment

## The following interfaces I created:
* accountInterface
* interestAccountInterface
* statementInterface
* userInterface
* skippedPaymentInterface

## Side notes
* Within _userInfo.json_ I put the Stats API into json format. 
* Within _getUserInformation.php_ I tried to figure out how to use Guzzle and in what format it needed to be.