<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AirdropKu is an application to manage airdrop, airdrop reminders">
    <meta name="keywords" content="AirdropKu is an application to manage airdrop, airdrop reminders">
    <meta name="robots" content="index, follow">
    <meta name="author" content="NaufalJCT48">

    <!-- Title -->
    <title>AirdropKu - Login</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&amp;display=swap" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <link type="text/css" href="<?php echo base_url(); ?>plugins/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="<?php echo base_url(); ?>assets/css/main.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12 col-lg-4">
                <div class="card login-box-container">
                    <div class="card-body">
                        <div class="authent-logo">
                            <img src="<?php echo base_url(); ?>assets/images/logo%402x.png" alt="">
                        </div>
                        <div class="authent-text">
                            <p>Welcome to AirdropKu</p>
                            <p>Please Sign-in to your account.</p>
                        </div>

                        <form id="loginForm">
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                                    <label for="email">Email address</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-info m-b-xs">Sign In</button>
                            </div>
                        </form>

                        <div class="authent-reg">
                            <p>Not registered? <a href="<?php echo base_url(); ?>register">Create an account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Javascripts -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.min.js"></script>
    <!-- Sweet Alerts 2 -->
    <script src="<?php echo base_url(); ?>plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault();

                var formData = {
                    email: $('#email').val(),
                    password: $('#password').val()
                };

                $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url("Login/authenticate"); ?>',
                        data: formData,
                        dataType: 'json',
                        encode: true
                    })
                    .done(function(response) {
                        if (response.success) {
                            sessionStorage.setItem('user_id', response.user_id);
                            sessionStorage.setItem('user_role', response.user_role);
                            sessionStorage.setItem('logged_in', true);
                            Swal.fire({
                                icon: 'success',
                                title: 'Login Success',
                                text: 'Redirecting to Dashboard',
                                confirmButtonText: 'OK'
                            });
                            window.location.href = '<?php echo base_url(); ?>dashboard';
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Failed',
                                text: 'Invalid email or password',
                                confirmButtonText: 'OK'
                            });
                        }
                    })
                    .fail(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong! Please try again later.',
                            confirmButtonText: 'OK'
                        });
                    });
            });
        });
    </script>

</body>

</html>