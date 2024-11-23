//initialization of global variables
const loginForm = document.getElementById("login-form");
const loginBtn = document.getElementById("login-button");


//event listener to log the user in
loginBtn.addEventListener("click", (e) => {
    e.preventDefault();
    const username = loginForm.username.value;
    const password = loginForm.password.value;

    if(username === "" && password === "") {
        location.reload("home.html");
    }
});
