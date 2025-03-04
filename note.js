let boxes=document.querySelectorAll(".edit");
let yet=document.getElementById("yes");
let id1=document.getElementById("bet");
let id2=document.getElementById("het");
let deletes=document.querySelectorAll(".delete");



boxes.forEach((edits)=>{
    edits.addEventListener("click",(e)=>{
        tr = e.target.parentNode.parentNode;
        srno = tr.getElementsByTagName("td")[0].innerText;
        title = tr.getElementsByTagName("td")[1].innerText;
        description = tr.getElementsByTagName("td")[2].innerText;
        console.log(srno,title, description);
        titleEdit.value=title;
        descriptionEdit.value=description;
        snoEdit.value = e.target.id;
        console.log(snoEdit);


        $('#editModal').modal('toggle');

    })
})
deletes.forEach((delet)=>{
    delet.addEventListener("click",(e)=>{
        tr = e.target.parentNode.parentNode;
        sno = e.target.id.substr(1);
        if (confirm("Are you sure you want to delete this note!")){
            console.log("yes");
            window.location=`/login/Restaurant/notes.php?delete=${sno}`; 
        }
        else{
            console.log("no");
        }
        



    })

   
})
 
   
       
        {
            
        }