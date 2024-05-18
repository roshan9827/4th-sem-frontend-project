// let animationsEnabled = true;    
//     function changeAnimationOption() {
//         const animationToggle = document.getElementById('animationToggle');
        
//         if (animationToggle.value === 'on') {
//             animationsEnabled = true;
//             playAnimations();
//         } else if (animationToggle.value === 'off') {
//             animationsEnabled = false;
//             pauseAnimations();
//         }
//     }
    
//     function playAnimations() {
//         const elementsWithAnimations = document.querySelectorAll('.colorchange, .colorbgchange');
//         elementsWithAnimations.forEach(element => {
//             element.style.animationPlayState = 'running';
//         });
//     }
    
//     function pauseAnimations() {
//         const elementsWithAnimations = document.querySelectorAll('.colorchange, .colorbgchange');
//         elementsWithAnimations.forEach(element => {
//             element.style.animationPlayState = 'paused';
//         });
//     }
// Function to check if the user is already logged in
function checkLoggedInStatus() {
    let isLoggedIn = localStorage.getItem('isLoggedIn');

    if (isLoggedIn === 'true') {
        // If logged in, update the navbar
        updateNavbar(localStorage.getItem('username'));
    }
}
// Function to update the navbar
function updateNavbar(username) {
    let loginBtnElement = document.getElementById('login-btn');

    if (loginBtnElement) {
        // Clear any existing content in the login button
        loginBtnElement.innerHTML = '';

        // Check if the user is logged in
        let isLoggedIn = localStorage.getItem('isLoggedIn');

        if (isLoggedIn === 'true') {
            // Create an icon element for the user (assuming you're using Font Awesome)
            let iconElement = document.createElement('i');
            iconElement.className = 'fas fa-user'; // Replace with the appropriate Font Awesome class for the user icon

            // Create a span element for the username
            let usernameSpan = document.createElement('span');
            usernameSpan.style.color = 'rgba(255, 255, 255, 0.536)';
            usernameSpan.textContent = username;
            usernameSpan.addEventListener('mouseenter', function () {
                usernameSpan.style.color = ' white';
            });

            usernameSpan.addEventListener('mouseleave', function () {
                usernameSpan.style.color = 'rgba(255, 255, 255, 0.536)';
            });

            // Append the icon and username to the login button
            loginBtnElement.appendChild(iconElement);
            loginBtnElement.appendChild(usernameSpan);
        } else {
            // If not logged in, show default text (e.g., 'Log In')
            loginBtnElement.innerText = 'Log In';
        }
    }
}
function signupsubmit_form() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let confirm_password = document.getElementById('confirm_password').value;

    // Validate password length
    if (password.length < 6) {
        alert('Password should be at least 6 characters long');
        return false;
    }

    // Check if the passwords match
    if (password !== confirm_password) {
        alert('Passwords do not match');
        return false;
    }

    // Perform additional form validation as needed

    alert('Welcome ' + name + '! You have successfully signed up.');
    return true;
}

function login() {
    window.location.href = 'login.html';
}
// Function to handle the forgot password feature
function forgot() {
    var forgotPassDiv = document.querySelector('.forgotpass');
    forgotPassDiv.style.display = (forgotPassDiv.style.display === 'none' || forgotPassDiv.style.display === '') ? 'block' : 'none';
}
function showmedicalinfo(event) {
    event.preventDefault();
    var name = document.getElementById('name').value;
    var gender = document.getElementById('gender').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var province = document.getElementById('province').value;

    if (!name || gender === "" || !email || !phone || province === "") {
        alert('Please fill all required feild * feild are compulsory!!');
        return;
    }
    // Show medical info
    var medicalInfoSection = document.querySelector('.medical-info');
    medicalInfoSection.style.display = (medicalInfoSection.style.display === 'none') ? 'block': 'block';
}
function showconfiguration(event) {
    event.preventDefault();
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var Number = document.getElementById('Number').value;
    var province = document.getElementById('province').value;
    var city = document.getElementById('city').value;
    var bloodgroup = document.getElementById('blood-group').value;

    if (name === "" || email === "" || Number === "" || province === "" || city === "" || bloodgroup === "" ) {
        alert('Please fill all required fields. All fields are compulsory!');
        return;
    }

    // Show configuration form
    var configurationSection = document.querySelector('.configuration');
    configurationSection.style.display = (configurationSection.style.display === 'none') ? 'block' : 'block';
}

function  requestform(event) {
    var password = document.getElementById('password').value;
    var cpassword = document.getElementById('cpassword').value;
   
    // if (password === "" || cpassword === "" ) {
    //     alert('please fill password section to submit.');
    //     return;
    // }
     if (password !== cpassword ) {     
        event.preventDefault();
        alert ('Password do not match.');
        return false;
     }
        alert ('Your request is submitted. We will contact you soon....');
}

function donateform() {
    alert ('Congratulation you are regestered as donor!')
}
// Function to handle the form submission
function submit_form(event) {
    event.preventDefault();  // Prevent the default form submission behavior

    let name = document.getElementById('name').value;
    let password = document.getElementById('password').value;
    let confirm_password = document.getElementById('confirm_password').value;

    // Check if the passwords match
    if (password !== confirm_password) {
        alert('Passwords do not match');
        return false;
    }

    // Simulate a successful login (replace this with your actual login logic)
    let isLoggedIn = true;

    if (isLoggedIn) {
        alert('Welcome ' + name + '! You have successfully logged in.');

        // Store login information in localStorage
        localStorage.setItem('isLoggedIn', 'true');
        localStorage.setItem('username', name);

        // Update the navbar
        updateNavbar(name);

        // You can also redirect the user to another page if needed
        // window.location.href = 'dashboard.html';

        // Close the login popup
        document.getElementById('login-popup').style.display = 'none';
    } else {
        alert('Invalid credentials. Please try again.');
    }

    return isLoggedIn;  // Return true if login is successful
}

// Function to handle the logout feature
function logout() {
    // Check if the user is logged in
    let isLoggedIn = localStorage.getItem('isLoggedIn');

    if (isLoggedIn === 'true') {
        // Clear the login information from localStorage
        localStorage.removeItem('isLoggedIn');
        localStorage.removeItem('username');

        // Reset the navbar
        document.getElementById('login-btn').innerText = 'Log In';

        // Display logout success alert
        alert('Log out successfully!!!! Thank you for joining comeback soon please...!');
    } else {
        // Display alert if the user is not logged in
        alert('You are not logged in. Please log in first.');
    }
}

// Function to handle the signup feature
function signup() {
    window.location.href = 'sign-up.html';
}

// Call checkLoggedInStatus on page load
document.addEventListener('DOMContentLoaded', function() {
    checkLoggedInStatus();
});
document.addEventListener("DOMContentLoaded", function () {
    const menuBtn = document.querySelector(".menu-btn");
    const navList = document.querySelector(".nav-list");
  
    menuBtn.addEventListener("click", function () {
      navList.classList.toggle("show");
    });
  });
  
  document.addEventListener('DOMContentLoaded', function() {
    var currentPage = window.location.pathname.split('/').pop().split('.')[0].toLowerCase();
    var activeNavItem = document.getElementById(currentPage);

    // Handle special case for the home page
    if (currentPage === "" || currentPage === "index") {
        activeNavItem = document.getElementById('home');
    }
    if (currentPage === "login") {
        activeNavItem = document.getElementById('login-btn');
    }

    if (activeNavItem) {
        activeNavItem.classList.add('active');
    }
});