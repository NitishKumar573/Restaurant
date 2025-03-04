
const dale=document.querySelectorAll(".hello");

const msg=document.querySelector(".msg-container");
const hate=document.querySelector(".hate");
const ucount=document.querySelector("#user");
const ccount=document.querySelector("#comp");
const uc=document.querySelector(".user1");
const cc=document.querySelector(".comp1");
const btn=document.querySelector(".btn");
const resbtn=document.querySelector(".res-btn");
let uscore=0;
let cscore=0;


const compchoice=()=>{
   const choice=["rock","paper","scissor"];
   const randInx=Math.floor(Math.random()*3)
   return choice[randInx]

}
hate.addEventListener("click",()=>{
    ucount.innerText=0;
    ccount.innerText=0;
    uc.innerText="None";
    cc.innerText="None";
    msg.innerText="Play your move";
    msg.style.backgroundColor="black";

})
const gamedraw=(user,comp)=>{
    msg.innerHTML=`The Match was Drawn!,both choose ${user}`;
    msg.style.backgroundColor = "grey";
    uc.innerText=user;
    cc.innerText=comp;

}
const playgame=(userChoice)=>{
    let getcomp=compchoice();
    if (getcomp===userChoice){
        gamedraw(userChoice,getcomp);

    }
    else{
        let uwin=true;
        if(userChoice=="rock"){
            uwin= getcomp=== "scissor" ? true : false;

        }
        else if(userChoice=="paper"){
            uwin= getcomp==="rock" ? true : false;

        }
        else{
            uwin= getcomp==="paper" ? true : false;

        }
        showwinner(uwin,userChoice,getcomp)

    }
    

}
showwinner=(uwin,userChoice,getcomp)=>{
    if(uwin){
        uscore++;
        ucount.innerText=uscore;
        uc.innerText=userChoice;
        cc.innerText=getcomp;
        msg.innerHTML=`You Won,Your ${userChoice} beat Computer ${getcomp}`;
        msg.style.backgroundColor = "green";
        


    }
    else{
        cscore++;
        ccount.innerText=cscore;
        uc.innerText=userChoice;
        cc.innerText=getcomp;
        msg.innerHTML=`You Lose,Compuer ${getcomp} beat your ${userChoice}`;
        msg.style.backgroundColor = "red";
    }
}


dale.forEach((choice) => {
    choice.addEventListener("click",()=>{
        const userChoice = choice.getAttribute("id");
        playgame(userChoice);
    }) 
    
});

    


