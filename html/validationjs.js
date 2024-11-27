function validateForm() {
    // Get form elements
    const fname = document.getElementById("fname").value.trim();
    const lname = document.getElementById("lname").value.trim();
    const usrn = document.getElementById("usrn").value.trim();
    const pwd = document.getElementById("pwd").value;
    const cpwd = document.getElementById("cpwd").value;
    const gender = document.querySelector('input[name="gender"]:checked');
    const mob = document.getElementById("mob").value.trim();
    const address = document.getElementById("address").value.trim();
    const email = document.getElementById("email").value.trim();

    // Validate first name
    if (fname === "") {
        alert("First name cannot be empty");
        return false;
    }

    // Validate last name
    if (lname === "") {
        alert("Last name cannot be empty");
        return false;
    }

    // Validate username
    if (usrn === "") {
        alert("Username cannot be empty");
        return false;
    }

    // Validate password
    if (pwd.length < 6) {
        alert("Password must be at least 6 characters long");
        return false;
    }

    // Validate password confirmation
    if (pwd !== cpwd) {
        alert("Passwords do not match");
        return false;
    }

    // Validate gender
    if (!gender) {
        alert("Please select your gender");
        return false;
    }

    // Validate mobile number
    if (!/^\d{10}$/.test(mob)) {
        alert("Mobile number must be 10 digits long");
        return false;
    }

    // Validate address
    if (address === "") {
        alert("Address cannot be empty");
        return false;
    }

    // Validate email
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    // All validations passed
    alert("Form submitted successfully!");
    return true;
}
