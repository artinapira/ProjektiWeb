<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swissaround</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <box-icon type='solid' name='envelope'></box-icon>
</head>
<body>
    
    
    <div class="wrapper">
        <div class="form-box login">
            <h1>Sign Up</h1>
            <form action="signup.php" method="post">
                <div class="inputbox">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                    <div class="error-message" id="usernameError"></div>
                    
                </div>
                <div class="inputbox">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <i class="bx bxs-envelope"></i>
                    <div class="error-message" id="emailError"></div>
                </div>
                <div class="inputbox">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                    <div class="error-message" id ="passwordError"></div>

                </div>
        
                <div class="remember-forgot">
                    <label><input type="checkbox"> I agree to these 
                    <a href="#"> Terms & Conditions</a></label>
                </div>
                <button type="submit" name="registerBtn" class="btn" onclick="validateForm()">Sign Up</button>
                

                <div class="register-link">
                    Already a member? 
                    <a href="./Login.php">Log in here</a>
                </div>
                <p class="liw">Sign up with</p>
                <div class="contanier"></div>
            
            <div class="icons">

                <a href="https://www.facebook.com/"><ion-icon name ="logo-facebook"></ion-icon></a>
                <a href="https://www.instagram.com/"><ion-icon name ="logo-instagram"></ion-icon></a>
                <a href="https://twitter.com/"><ion-icon name ="logo-twitter"></ion-icon></a>
                <a href="https://www.google.com/"><ion-icon name ="logo-google"></ion-icon></a>
                <a href="https://www.skype.com/en/"><ion-icon name ="logo-skype"></ion-icon></a>


            </div>
        </form>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    <script>
        let usernameRegex = /^[A-Z]+[a-z]{7,15}$/;
        let emailRegex = /[a-zA-Z0-9._-]+@+[a-z]+\.+[a-z]{3}/;
        let passwordRegex = /[a-zA-Z0-9]{8,15}/;

        function validateForm() {
            let usernameInput = document.getElementById('username');
            let emailInput = document.getElementById('email');
            let passwordInput = document.getElementById('password');


            usernameError.innerText = '';
            emailError.innerText = '';
            passwordError.innerText = '';

            if (!usernameRegex.test(usernameInput.value)) {
                usernameError.innerText = 'invalid username';
                return false;
            }
            if (!emailRegex.test(emailInput.value)) {
                emailError.innerText = 'invalid email';
                return false;
            }
            if (!passwordRegex.test(passwordInput.value)) {
                passwordError.innerText = 'invalid password';
                return false;
            }
            return true;

        }


    </script>
    <?php include_once 'controller/registerController.php';?>
</body>
</html>