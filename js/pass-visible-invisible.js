//This script is used to make a password input visible or invisible

//get the password input
const inputPassword = document.querySelector('input[type="password"]');
//get the eye icon which should be displayed when the password is visible
const eyeIcon = document.querySelector(".fa-eye");
//get the eye-slash icon which should be displayed when the password is invisible
const eyeSlashIcon = document.querySelector(".fa-eye-slash");
//get the span that includes both icons
const iconsSection = document.querySelector(".eye-icons");

//add a listener on the span including the two icons
iconsSection.addEventListener("click", () => {

  //we test if password input's type is (password)
  //so it is invisible
  if(inputPassword.type === "password")
  {
    eyeSlashIcon.style.display = "none"; //eye-slash icon should be invisible
    eyeIcon.style.display = "block"; //eye icon should be visible
    inputPassword.type = "text"; //password input's type is set to (text) to be visible
  }
  else 
  { 
    eyeIcon.style.display = "none"; //eye icon should be invisible
    eyeSlashIcon.style.display = "block"; //eye-slash icon should be visible
    inputPassword.type = "password"; //password input's type should be set back to (password) to be invisible
  }
});
