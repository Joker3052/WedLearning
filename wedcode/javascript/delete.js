const form = document.querySelector(".delete form"),
continueBtn = form.querySelector(".button input");

form.onsubmit = (e)=>
{
    e.preventDefault(); //prevent form from submit 
}
continueBtn.onclick =() =>
{
    //ajax///////////////
    let xhr = new XMLHttpRequest(); //creting xml object
    xhr.open("POST","php/delete.php",true);
    xhr.onload = () =>{
      if(xhr.readyState=== XMLHttpRequest.DONE)
      {
        if(xhr.status ===200)
        {
            let data = xhr.response;   
            
            alert(data);
            location.href = "nhanvien.php";
        }
      }
    }
    //we have to send the form data through ajax to php
    let formdata = new FormData(form); //creating new form data Object
    xhr.send(formdata);// send form data to php
}