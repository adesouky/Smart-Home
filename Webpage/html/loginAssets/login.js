
function check(form){
 
if(form.inputEmail.value == "admin" && form.inputPassword.value == "admin"){
window.location.href = "homepage/index.html";
} else{
alert("Incorrect Username/Password")
 }

}
