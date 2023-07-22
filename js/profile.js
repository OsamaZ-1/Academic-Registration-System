//student email 
const oldEmail = document.querySelector("#old-email");
//email form input
const emailInput = document.querySelector("#email");
//button used to send otp to email
const verifyEmailButton = document.querySelector(".verify-email");
//container of otp code inputs
const otpField = document.querySelector(".otp-field");
//button used to verify otp entered
const verifyOtpButton = document.querySelector("#verify-button");
//button to submit the changes
const submitButton = document.querySelector("#submit-button");
//otp input fields
const otpInputs = document.querySelectorAll(".otp-input");
//div containing verified checkmark
const verified = document.querySelector("#verified-icon");
//div containing denied xmark
const notVerified = document.querySelector("#not-verified-icon")
//otp code to be generated
let otpCode = null;
//new email in case student change his email
let email = null;

//image upload input
const imageUpload = document.querySelector(".img-upload");
//profile picture
const profilePic = document.querySelector("#profile-pic");

imageUpload.addEventListener("change", () => {
  const file = imageUpload.files;
  displayImage(file[0]);
});

function displayImage(image)
{
  profilePic.setAttribute("src",URL.createObjectURL(image));
}

// Function to generate OTP
function generateOTP() {
          
  // Declare a digits variable which stores all digits
  const digits = '0123456789';
  let OTP = '';
  for (let i = 0; i < 4; i++ ) {
      OTP += digits[Math.floor(Math.random() * 10)];
  }
  return OTP;
}

//disable all otp inputs fields
//until verify-email button is clicked and otp is generated and sent to email
otpInputs.forEach((input) => {
  input.disabled = true;
});

//add an input listener on email input to check when student change it
emailInput.addEventListener("input", (e) => {
  //new enetred email
  email = emailInput.value;

  //divs that include (verified icon) & (denied icon)
  verified.style = "display: none";
  notVerified.style = "display: none";

  if(email !== oldEmail.textContent)
  { 
    //if the user changed the email 
    //we will display the verification buttons as well as otp inputs
    verifyEmailButton.style = "display: block";
    otpField.style = "display: block";
    verifyOtpButton.style = "display: block";

    //reset the otp inputs content
    otpInputs.forEach((input) => {
      input.value = "";
    })

    //disable submit button until email is verified
    submitButton.disabled = true;
    //disable verify otp button until (verify-email) button is clicked and otp is generated
    verifyOtpButton.disabled = true;
  }
  else
  { 
    //otherwise if the email is the same as the old one
    //hide the verification buttons and otp inputs
    verifyEmailButton.style = "display: none";
    otpField.style = "display: none";
    verifyOtpButton.style = "display: none";

    //enable submit button
    submitButton.disabled = false;
  }
});

//add a click listener on verify-email button
//it will enable the first otp input field and generate otp code
verifyEmailButton.addEventListener("click", (e) => {
  otpInputs[0].disabled = false;
  otpCode = generateOTP(); 

    e.preventDefault();
    //send otp to new email
    Email.send({
      SecureToken : "19738370-92fa-40fd-86be-aa39c2244419",
      To : emailInput.value,
      From : "Lufcfs.noreply@gmail.com",
      Subject : "OTP Code",
      Body : "Your OTP Code is "+otpCode
    }).then(
      message => alert(message)
    );
});

verifyOtpButton.addEventListener("click", (e) => {

    //otp entered by student
    let otpEntered = '';

    //disable submit button until student verify his new email
    submitButton.disabled = true;

    //get the otp entered by student
    otpInputs.forEach((input) => {
      otpEntered += input.value;
    });

    //if the otp is correct
    if(otpEntered === otpCode)
    { 
      //enable submit button
      submitButton.disabled = false;
      //hide the buttons and inputs used to verify new email
      verifyEmailButton.style = "display: none";
      otpField.style = "display: none";
      verifyOtpButton.style = "display: none";
      notVerified.style = "dispaly: none";
      //display the verified checkmark icon
      verified.style = "display: block";
      //set the old stored student email = new verified email 
      oldEmail.textContent = email;
      swal("Email Verified","","success");
    }
    else //if the otp is incorrect
    { 
      //display the denied xmark to represent failed verification
      notVerified.style = "display: block";
    }
});

