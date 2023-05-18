const message = document.querySelector("#message");
const email = document.querySelector('input[type="text"]');

//This is just a simple test to check if error or succes message exist
//Resulting from entering an email that doesn't exist or successfully performed a task
//So when user focus again on input text the message will be deleted

email.addEventListener("focus", () => {
    if(message && message.innerText !== "") message.innerHTML = "";
});


