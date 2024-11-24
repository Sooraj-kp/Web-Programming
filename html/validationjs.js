
function validateForm() {
    var firstName = document.getElementById("fname").value.trim();
    var lastName = document.getElementById("lname").value.trim();
    var username = document.getElementById("usrn").value.trim();
    var password = document.getElementById("pwd").value;
    var confirmPassword = document.getElementById("cpwd").value;
    var mobile = document.getElementById("mob").value.trim();
    var email = document.getElementById("email").value.trim();
    var gender = document.querySelector('input[name="gender"]:checked');
    var address = document.getElementById("address").value.trim();

    if (firstName === "") {
        alert("First Name must be filled out");
        document.getElementById("fname").focus();
        return false;
    }

    if (lastName === "") {
        alert("Last Name must be filled out");
        document.getElementById("lname").focus();
        return false;
    }

    if (username === "") {
        alert("Username must be filled out");
        document.getElementById("usrn").focus();
        return false;
    }

    if (password === "") {
        alert("Password must be filled out");
        document.getElementById("pwd").focus();
        return false;
    }

    if (confirmPassword === "") {
        alert("Please confirm your password");
        document.getElementById("cpwd").focus();
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match");
        document.getElementById("pwd").focus();
        return false;
    }

    if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        document.getElementById("pwd").focus();
        return false;
    }

    if (!gender) {
        alert("Gender must be selected");
        return false;
    }

    if (mobile === "") {
        alert("Mobile Number must be filled out");
        document.getElementById("mob").focus();
        return false;
    }

    if (!/^\d{10}$/.test(mobile)) {
        alert("Mobile Number must be exactly 10 digits");
        document.getElementById("mob").focus();
        return false;
    }

    if (address === "") {
        alert("Address must be filled out");
        document.getElementById("address").focus();
        return false;
    }

    if (email === "") {
        alert("Email must be filled out");
        document.getElementById("email").focus();
        return false;
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert("Please enter a valid email address");
        document.getElementById("email").focus();
        return false;
    }

    return true;
}
