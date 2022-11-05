const form = document.querySelector(".insert form"),
continueBtn = form.querySelector(".button input");

form.onsubmit = (e)=>
{
    e.preventDefault(); //prevent form from submit 
}

continueBtn.onclick =() =>
{
    //ajax///////////////
    let xhr = new XMLHttpRequest(); //creting xml object
    xhr.open("POST","php/insert.php",true);
    xhr.onload = () =>{
      if(xhr.readyState=== XMLHttpRequest.DONE)
      {
        if(xhr.status ===200)
        {
            let data = xhr.response;   
            // console.log(data);
            if(data == 1)
            {
              alert('success');
              location.href = "nhanvien.php";
                console.log(data);
           }
            else{
          
               alert('failed');
               location.href = "nhanvien.php";
            }
        }
      }
    }
    //we have to send the form data through ajax to php
    let formdata = new FormData(form); //creating new form data Object
    xhr.send(formdata);// send form data to php
}