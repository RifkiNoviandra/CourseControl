$("#term-service").click(function () {
    if ($("#term-service:checked").length === 1) {
        $("#google-register").removeClass("disabled");
    } else {
        $("#google-register").addClass("disabled");
    }
});

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#new-password");

togglePassword.addEventListener("click", function () {
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    if (type === "password") {
        this.classList.remove('fa-eye');
        this.classList.add('fa-eye-slash');
    } else {
        this.classList.remove('fa-eye-slash');
        this.classList.add('fa-eye');
    }
});


