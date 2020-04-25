window.addEventListener('load',()=>{
    document.querySelector('#submit').addEventListener('click',submit);
    document.querySelector('#redo').addEventListener('click',addMoreRecords);
})

var url = 'http://localhost:8000/api/addentry';
function submit(){
    var loadHTML=`<svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="30px" height="30px" viewBox="0 0 128 128" xml:space="preserve"><rect x="0" y="0" width="100%" height="100%" fill="#FFFFFF" /><g><circle cx="16" cy="64" r="16" fill="#000000" fill-opacity="1"/><circle cx="16" cy="64" r="14.344" fill="#000000" fill-opacity="1" transform="rotate(45 64 64)"/><circle cx="16" cy="64" r="12.531" fill="#000000" fill-opacity="1" transform="rotate(90 64 64)"/><circle cx="16" cy="64" r="10.75" fill="#000000" fill-opacity="1" transform="rotate(135 64 64)"/><circle cx="16" cy="64" r="10.063" fill="#000000" fill-opacity="1" transform="rotate(180 64 64)"/><circle cx="16" cy="64" r="8.063" fill="#000000" fill-opacity="1" transform="rotate(225 64 64)"/><circle cx="16" cy="64" r="6.438" fill="#000000" fill-opacity="1" transform="rotate(270 64 64)"/><circle cx="16" cy="64" r="5.375" fill="#000000" fill-opacity="1" transform="rotate(315 64 64)"/><animateTransform attributeName="transform" type="rotate" values="0 64 64;315 64 64;270 64 64;225 64 64;180 64 64;135 64 64;90 64 64;45 64 64" calcMode="discrete" dur="720ms" repeatCount="indefinite"></animateTransform></g></svg>`;
    var button=document.querySelector('#submit');
    button.innerHTML=loadHTML;
    button.disabled=true;
    var name = document.querySelector('#name-txt').value;
    var email = document.querySelector('#email-txt').value;
    var pincode = document.querySelector('#pincode-txt').value;
  
    var validationResult = validation(name,email,pincode)
    if(validationResult.status){
        
        fetchResults(name,email,pincode);
    }else{
        displayMessages(validationResult.message.name,validationResult.message.email,validationResult.message.pincode);
        var button= document.querySelector('#submit');
        button.innerHTML="Submit";
        button.disabled=false;
    }
}
function validation(name,email,pincode){
    var object={status:1,message:{name:"",email:"",pincode:""}};
    var allFine = true;
    if(name===""){
        object.message.name="Name cannot be blank";
        allFine=false;
    }
    if(!emailValidate(email)){
        object.message.email="Email entered is invalid";
        allFine=false;
    }
    if(pincode.toString().length!==6 || pincode.toString().match(/^[0-9]+$/) === null){
        object.message.pincode="Pincode must be of 6 digits";
        allFine=false;
    }
    if(!allFine){
        object.status=0;
    }
    return object;
}
function emailValidate(email){
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.match(mailformat)){
    return true;
    }
    
    return false;
    
}


function fetchResults(name,email,pincode){
   
    var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

var urlencoded = new URLSearchParams();
urlencoded.append("name", name);
urlencoded.append("email", email);
urlencoded.append("pincode",pincode);

var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: urlencoded,
  redirect: 'follow'
};

fetch(url , requestOptions)
  .then(promiseResolve)
  .catch(error => console.log('error', error));


    

}
function promiseResolve(promiseResult){
    var promise = promiseResult.json();
    promise.then(data=>renderForm(data)).catch(err=>console.log(err));
}

function renderForm(jsonResponse){
    console.log(jsonResponse);
    if(jsonResponse.status===1){
        redirectToSuccessPage();
    }else{
         displayMessages(jsonResponse.message.name,jsonResponse.message.email,jsonResponse.message.pincode);
        var button= document.querySelector('#submit');
        button.innerHTML="Submit";
        button.disabled=false;
        }
}
 function displayMessages(name,email,pincode){
    var nameerr=document.querySelector('#name-error');
    var emailerr=document.querySelector('#email-error');
    var pincodeerr=document.querySelector('#pincode-error')
     if(name){
        nameerr.style="";
        nameerr.innerText=name;
     }else{
         nameerr.style="display:none";
     }
     if(email){
         emailerr.style="";
         emailerr.innerText=email;
     }else{
         emailerr.style="display:none";
     }
     if(pincode){
         pincodeerr.style="";
         pincodeerr.innerText=pincode;
     }else{
         pincodeerr.style="display:none";
     }
 }
 function redirectToSuccessPage(){
     document.querySelector('#successdiv').style="";
     document.querySelector('#form').style="display:none";
 }
 function addMoreRecords(){
    document.querySelector('#successdiv').style="display:none";
    document.querySelector('#form').style="";
    var button = document.querySelector('#submit');
    button.innerHTML="Submit";
    button.disabled=false;
 }