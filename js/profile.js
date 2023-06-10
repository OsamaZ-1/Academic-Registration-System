const oldEmail = document.querySelector("#old-email");
const emailInput = document.querySelector("#email");
const verifyEmailButton = document.querySelector(".verify-email");
const otpField = document.querySelector(".otp-field");
const verifyOtpButton = document.querySelector("#verify-button");
const submitButton = document.querySelector("#submit-button");
const otpInputs = document.querySelectorAll(".otp-input");
let otpCode = null;

// Function to generate OTP
function generateOTP() {
          
  // Declare a digits variable 
  // which stores all digits
  var digits = '0123456789';
  let OTP = '';
  for (let i = 0; i < 4; i++ ) {
      OTP += digits[Math.floor(Math.random() * 10)];
  }
  return OTP;
}

otpInputs.forEach((input) => {
  input.disabled = "true";
});

emailInput.addEventListener("input", (e) => {
  let email = emailInput.value;

  if(email !== oldEmail.textContent)
  {
    verifyEmailButton.style = "display: block";
    otpField.style = "display: block";
    verifyOtpButton.style = "display: block";
    submitButton.disabled = "true";
    verifyOtpButton.disabled = true;
  }
  else
  {
    verifyEmailButton.style = "display: none";
    otpField.style = "display: none";
    verifyOtpButton.style = "display: none";
  }
});

verifyEmailButton.addEventListener("click", (e) => {
  otpInputs[0].disabled = false;
  otpCode = generateOTP(); 
});

verifyOtpButton.addEventListener("click", (e) => {

    e.preventDefault();

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

