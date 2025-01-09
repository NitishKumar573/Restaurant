

m=prompt("Enter the Name of 1st Player:")
n=prompt("Enter the Name of 2nd Player:")
let boxes=document.querySelectorAll(".hello");
let msg1=document.querySelector(".msg");
let msg2=document.querySelector(".msg-con");
let reset=document.querySelector(".hell");
let newbtn=document.querySelector(".box");
let turnO=true;
let count=0;
boxes.forEach((box) => {
    box.addEventListener("click",()=>{
        if(turnO){
            console.log("boc");
            box.innerText="X";
            turnO=false;
            box.disabled=true;
            box.style.color="red";
            box.style.fontSize="50px";
            count++
            checkWinner();
               

    
    }
        else{
            box.innerText="O";
            turnO=true;
            box.disabled=true;
            box.style.color="blue";
            box.style.fontSize="50px";

            count++
            checkWinner();
        }
        winner=checkWinner();
        if(count===9 && !winner){
            draw()
        
        }
        })
});

reset.addEventListener("click",()=>{
    count=0;
    turnO=true;
    enable();
    msg1.classList.add("hide");

})
newbtn.addEventListener("click",()=>{
    enable()
    msg1.classList.add("hide")


})

const disable=()=>{
    for(box of boxes){
        box.disabled=true;
    }
}
const enable=()=>{
    for(box of boxes){
        box.disabled=false;
        box.innerText="";
    }
}

const draw=()=>{
    msg2.innerText=`The Match was Drawn`;
    msg1.classList.remove("hide");
    disable();
    
}
win=[[0,1,2],[3,4,5],[6,7,8],[0,3,6],[0,4,8],[1,4,7],[2,5,8],[2,4,6]]
const showsWinner=(winner)=>{
    disable();
    if (winner=="X"){
        msg2.innerText=`Winner is ${m}`
        msg1.classList.remove("hide")
    }
    else{
        msg2.innerText=`Winner is ${n}`
        msg1.classList.remove("hide")

    }



}
const checkWinner=()=>{
    for(let pattern of win){
        pos1 = boxes[pattern[0]].innerText;
        pos2 = boxes[pattern[1]].innerText;
        pos3 = boxes[pattern[2]].innerText;
        if(pos1 != "" && pos2 != "" && pos3 != ""){
            if (pos1===pos2 && pos2===pos3) {
                showsWinner(pos1);
                
                              
            }

            }
        

    
        }
    }