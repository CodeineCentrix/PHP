/* function to display group */
function DisplayGroup(){
  // Get the elements
  var mainRes = document.getElementById("ResType");
  var res = document.getElementById("res");
  
  var div = document.getElementById("MainResGrp");
  // If the radio button is checked, display the output text
  if (mainRes.checked == true){
    MainResGrp.style.display = "block";
  } else if (res.checked==true) {
	
    MainResGrp.style.display = "none";
	 document.getElementById("resident").value="1";
  }
  else{ 
  
  MainResGrp.style.display = "none";}
}
//Show password
function ShowPassword() {
    var x = document.getElementById("psw");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
//Password validation script
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
//Accordion Script
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
//reading must not exceede 5
function ValidateReading()
{
var readinglength = document.getElementById("reading");
if (readinglength.value.length<5)
    document.window.alert("Reading digits must not exceede 5");

}}
/*password match*/
function ComparePassword()
  {
  var p1=document.getElementById("psw");
    var p2=document.getElementById("psw2");
var p3=document.getElementById("res2");
	

  if (p1.value!==p2.value)
  
  {
  p3.style.display = "block";
  p1.type="text";
    p2.type="text";

  p2.focus();}
    else
  {
    p3.style.display = "none";
  p1.type="password";
    p2.type="password";
  
 }
  }