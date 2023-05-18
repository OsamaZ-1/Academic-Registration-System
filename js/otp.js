const inputs = document.querySelectorAll(".otp-input");
const button = document.querySelector("#verify-button");

//focus the first input number when the page load
window.addEventListener("load", () => inputs[0].focus());

//iterate over inputs
inputs.forEach((input, index1) =>{

  input.addEventListener("keyup", (e) => {

    //Get the previous, current, and next input code
    const currentInput = input,
          previousInput = input.previousElementSibling,
          nextInput = input.nextElementSibling;

    //only permit one number in input code
    if(input.value.length > 1)
    {
      currentInput.value = "";
      return;
    }

    //enable next input if it is disabled and the current input is not empty
    if(nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "")
    {
      nextInput.removeAttribute("disabled");
      nextInput.focus();
    }
          
    //if the backspace key is pressed
    if(e.key === "Backspace")
    {
      inputs.forEach((input, index2) =>{

        //if the index of the current input less tham or equal index2 and the previous element exist
        //disable current input, clear its value and focus previous input
        if(index1 <= index2 && previousInput)
        {
          input.setAttribute("disabled", true);
          currentInput.value = "";
          previousInput.focus();
        }
      });
     }

     //if the last input is not disabled and empty then enable verify button
     if(!inputs[3].disabled && inputs[3].value !== "")
     {
      button.removeAttribute("disabled");
      return;
     }
     button.setAttribute("disabled", true);
  });
})