let userName = 'place your name here';
userName? console.log (userName): console.log ("Hi there!");
let userQuestion = "place your question here";
console.log (`The user asked:${userQuestion}`);
let randomNumber = Math.floor(Math.random() * 8);
let genie = '';

switch (randomNumber) {
  case 0: 
  genie = 'Most definitely happening.'; 
  break;
  case 1:
  genie = 'I believe so.';
  break;
  case 2:
  genie = 'I am confused. Try again.';
  break;
  case 3:
  genie = 'That I can not say';
  break;
  case 4:
  genie = 'I would not hold my breath.';
  break;
  case 5:
  genie = 'There may be a 50/50 chance.';
  break;
  case 6:
  genie = 'Seems tricky to me.';
  break;
  case 7: 
  genie = 'Most definitely not. ';
  break;
  }
  console.log (genie);