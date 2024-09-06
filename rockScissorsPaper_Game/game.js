let userScore = 0;
let compScore = 0;
  const msg= document.querySelector("#msg");
const choices = document.querySelectorAll(".choice");
const userScorePara = document.querySelector("#user-score");
const compScorePara = document.querySelector("#comp-score");
const btn1 = document.querySelector("#btn1");
 
 let mode = "light";//dark
btn1.addEventListener("click", () => {
  if(mode === "light")
  {
   mode = "dark";
   document.querySelector("body").style.backgroundColor ="#081b31";
   btn1.innerText = "DarkMode On"
  }
  else {
    mode = "light";
    document.querySelector("body").style.backgroundColor ="bisque";
    btn1.innerText = "LightMode On"
  }
});




const genCompChoice = ( ) => {
  const options = ["rock" , "paper", "scissors"]
  const randIdx = Math.floor(Math.random() * 3);
  return options[randIdx];
}


const drawGame = () => {
  console.log("game was draw.");
  msg.innerText = "Game was draw.. play again";
  msg.style.backgroundColor = "#081b31";

}

const showWinner = (userWin,userChoice,compChoice) => {
 if(userWin) {
  userScore++;
  userScorePara.innerText = userScore;
  console.log("you win!");
  msg.innerText = `Congratulations! You win.. your ${userChoice} beats ${compChoice}`;
  msg.style.backgroundColor = "green";

 }
 else {
  compScore++;
  compScorePara.innerText = compScore;
  console.log ("you loose!");
  msg.innerText = `Sorry! You loose..${compChoice} beats your ${userChoice}`;
  msg.style.backgroundColor = "red";

 }
}


const playGame = (userChoice) => {
 console.log("user choice = ",userChoice)
 //generate computer choice
 const compChoice = genCompChoice();
 console.log("comp choice = ", compChoice)
   

 if(userChoice === compChoice) {
 }

 if(userChoice === compChoice) {
  drawGame();
 }

 else {
  let userWin = true ;

  if ( userChoice === "rock"){
    //scissor , paper
    userWin = compChoice === "paper" ? false : true;
  }

  else if (userChoice === "paper") {
    //scissor ,rock
    userWin = compChoice === "scissors" ?false:true;
  }

  else {
    // paper ,rock
    userWin = compChoice === "rock" ? false : true;  
  }
    showWinner(userWin,userChoice,compChoice)
  }
};

choices.forEach((choice) => {
  choice.addEventListener("click",() => {
    const userChoice = choice.getAttribute("id");
    playGame(userChoice);
  }); 
});