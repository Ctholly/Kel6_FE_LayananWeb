<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="login-container">
        <div class="login-left">
            <img src="img/kuroihana-logo.png" alt="Logo" class="logo">
            <h1 class ="h1-text">Kuroi-Hana</h1>
            <p class="p-text">Welcome Back!</p>
            <p class="p-text">You can log-in to access with your existing account</p>
        </div>
        <div class="login-right">
            <h2>Sign-In</h2>
            <form id="loginForm">
                <div class="input-container">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit">Login</button>
            </form>
            <p>Don't have account? <a href="#">Sign Up</a></p>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function loginUser(email, password) {
                var data = {
                    email: email,
                    password: password
                };

                var config = {
                    method: 'POST',
                    url: 'http://kel6-be-layananweb.test/api/login',
                    data: data
                };

                $.ajax(config)
                    .done(function(response) {
                        console.log(response);
                        alert('Login berhasil!');
                        window.location.href = "/welcome";
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        console.error('Error during login:', errorThrown); 
                        alert('Login gagal. Silakan coba lagi.');
                    });
            }

            $('#loginForm').submit(function(event) {
                event.preventDefault(); 

                var email = $('#email').val();
                var password = $('#password').val();

                loginUser(email, password);
            });
        });
    </script>
</body>

</html>
