//A cookie is set with key as name and value as INTOTHEWILD using the console
function openNav() {
  document.getElementById("hiddenSidebar").style.width = "50vw";
}
function closeNav() {
  document.getElementById("hiddenSidebar").style.width = "0";
}
function validate(){
  var name=document.forms["contact_form"]["username"].value;
  var email1=document.forms["contact_form"]["email"].value;
  var number=document.forms["contact_form"]["contact"].value;
  if(!alphabet(name)){
    window.alert("Enter a valid Name");
    document.getElementById("username").focus;
    return false;
  }
  if(validate(email1)){
    window.alert("Enter a valid E-Mail address");
    document.getElementById("email").focus;
    return false;
  }
  if(phonenumber(number)){
    window.alert("Enter a valid 10-digit phone number")
    document.getElementById("contact").focus;
    return false;
  }
  function alphabet(str){
    let len = str.length;
    for (i=0;i<len;i++){
        let s = str.charAt(i);
        if (!((s>='A' && s<='Z') || (s>='a' && s<='z') || (s==" "))){
            return false;
        }
    }
    return true;   
  }
  function phonenumber(no){
    var reg=/^\d{10}$/;
    if (no.match(reg)){
        return false;
    }
    else{
        return true;
    }
  }
  function validate(e){
    var reg=/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (e.match(reg)){
        return false;
    }
    else{
        return true;
    }
  }
}



