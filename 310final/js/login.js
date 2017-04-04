window.addEventListener("load", Init);
function Init(){
  var mainForm = document.getElementById('mainForm');
  mainForm.addEventListener('onsubmit', checkForm, false);
}

function checkForm(evt){
  var requiredElements = document.getElementsByClassName('required');
  for(var i=0; i<requiredElements.length; i++){
    if(requiredElements[i].value == ""){
      alert("Please enter a username and password.");
      evt.preventDefault();
    }
  }
}
