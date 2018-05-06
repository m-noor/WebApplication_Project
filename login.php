<?php

//read the variable state from the server-side login_process.php
session_start();
set_error_handler('error_handler');
$login_state = $_SESSION['login_state'];


function error_handler($errno,$errstr)
  {
  /* handle the issue */
  $login_state = "";
  return true; // if you want to bypass php's default handler
  }

restore_error_handler();


?>

<!DOCTYPE html>

<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <title>Welcome to Outdoor Adventures Store</title>
</head>
<body>

    <div class="container">

        <!-- navbar from Bootstrap -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <a class="navbar-brand" href="index.html">
                <img class="img-fluid" src="images/LogoMakr_6NtMtS.png" width="200" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">


                    <li class="nav-item">
                        <a class="nav-link" href="index.html">About Outdoor Adventures</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Browse Our Collection</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Login</a>
                    </li>

                </ul>

                <a class="navbar-brand" href="index.html">
                    <!--link to login page-->

                    <img class="img-fluid" src="images/user-2160923_1280.png" width="100" /></a>

            </div>
        </nav>

        <div>&nbsp;</div>

        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1 class="display-4">Welcome to Outdoor Adventures Store</h1>
            <p class="lead">A premier store catering for sports-related equipment and clothing</p>

        </div>

        <!-- Text -->
        <div class="row">
            <div class="col-lg-8 text-justify">
                <p>
                    <h2 id="userwelcomemessage">Welcome Guest!</h2>
                    <h5 id="login_state"><?php echo $login_state; ?></h5>
                    <!--<br />-->
                    https://www.w3schools.com/bootstrap/bootstrap_glyphicons.asp


                    <!-- https://getbootstrap.com/docs/4.1/components/forms/ -->
                    <form action="login_process.php" method="post">
                        <div class="form-group">
                            <label for="LoginEmail1">Email address</label>
                            <input type="email" class="form-control" id="LoginEmail1" placeholder="Enter email" required="required" name="entered_email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="LoginPassword1">Password</label>
                            <input type="password" class="form-control" id="LoginPassword1" placeholder="Password" required="required" name="entered_password">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block" onclick="user_login();">Submit</button>
                        
                    </form>

                </p>
            </div>

            <!--side box-->
            <div class="col-lg-4">

                <div class="card bg-success text-white">
                    <img class="card-img-top" src="images/credit-card-851506_1920.jpg" alt="Trust in our shopping" class="img-fluid">
                    <div class="card-body">
                        <h5 class="card-title">Trust our shopping</h5>
                        <p class="card-text">At Outdoor Adventures, your security is our top priority. We use enterprise-grade encryption to ensure your login details are secure. However, our security measures are only as strong as our customers'. We will never contact you asking for credit card or login details. Please don't share or write down your password.</p>
                    </div>
                </div>
            </div>
        </div>


    </div>


    
</body>

<script>

    // pseudo-code - if not logged in, display 'Welcome Guest'; otherwise, 'Welcome <username>'
    // for logging in:
    // 1. take user name and password and match it to DB with PHP or MySQL
    //          a. based on the username, read the hashed(?) password and see if it matches the entered password
    // 2. if user exists and password is correct, then display hello message (to satisfy the project requirement, change styling as well with DOM)
    //          a. if password is not correct, then alert('wrong password')
    // 3. if user doesn't exist, then reload the current webpage and let them know some details are wrong etc.

    // also need a Register webpage (register.html - created) where user can register themselves
    // 1. write to DB

    //    username 	password 	
    //admin@outdoor-adventures.com 	123

    // https://developer.mozilla.org/en-US/docs/Web/Events/beforeunload - function to ask user to confirm before refreshing/moving to a different page
    //window.addEventListener("beforeunload", function (event) {
    //    event.returnValue = "\o/";
    //});

    //// is equivalent to
    //window.addEventListener("beforeunload", function (event) {
    //    event.preventDefault();
    //});

    // read cookie value
    //var username = document.cookie

    //if (username != null) {
    //    document.getElementById('userwelcomemessage').innerHTML = 'Welcome ' + document.cookie
    //}



    //function user_login() {

    //    var entered_email = document.getElementById('LoginEmail1').value;
    //    var entered_password = document.getElementById('LoginPassword1').value;

    //    // SQL code: SELECT email, real_name, password FROM login_details WHERE email='entered_email'
    //    // if password == entered_password, then write cookie



    //    if ((document.getElementById('LoginEmail1').value == 'admin@outdoor-adventures.com') && (document.getElementById('LoginPassword1').value == 123)) {
    //        alert('Logged in');
    //        // write cookie
    //        document.cookie = "username=" + document.getElementById('LoginEmail1').value
    //        window.open('index.html', '_self'); // upon successful login, redirect to homepage - is this needed?

    //    } else {
    //        alert('Incorrect details - please re-enter your login information');
    //    }
    //}


</script>
</html>
