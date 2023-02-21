<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
        <title>Sign up</title>
        <!-- <meta http-equiv="refresh" content="5"> -->
        <link rel= "stylesheet" href="https://fonts.googleapis.com/css?family=Alata&display=swap">
        <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Baloo+Da+2&display=swap">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
      <form action="register.php" method="POST">
                    <div class="sidetitle">
                        <span class="chms">CHMS</span>
                    </div>
                <div class="container">
                    <h1 class="title">Create new account<span id="full">.</span></h1>
                    <div class="container1">
                        <span class="member">
                            <h5 id="mem">Already a member?</h5>
                        </span>
                        <span  class="login">
                            <!-- <a href="login.php">Login</a> -->
                            <h5><a href="login.php" style="text-decoration:none">Login</a><h5>
                        </span>
                    </div>
                    <!-- your name -->        
                <div class="fname">
                    <span class="name">
                        <input type="text" id="nname" placeholder="Enter your name" name="name">        
                    </span>
                </div>
                <!-- Mobile Number -->
                <div class="number">
                    <span class="numb">
                    <input type="number" id="num" placeholder="Mobile Number" name="phno" required>        
                    </span>
                </div>
                <!-- Input for email -->        
                <div class="mailbox">
                    <span class="it">
                    <input type="email" id="mail" placeholder="Enter your mail id" required name="email">        
                    </span>
                </div>
                <!-- Password Input -->
                <div class="passinput">
                    <span class="pass">
                    <input type="password" id="password" name="password" placeholder="Enter password" required >        
                    </span>
                </div>
                <!-- Confirm Password  -->
                <div class="confirm">
                    <span class="con">
                    <input type="password" id="confirmpass" name="conpassword" placeholder="Re-enter password" required>        
                    </span>
                </div>
                <!-- Signup Button -->
                <div class="next">
                    <span class="nxt">
                    <button type="submit" id="button">Sign up</button>        
                    </span>
                </div>
            </div>
    </form>
    <!-- <div class="vector">
       <img src="logo.svg" alt="signup">
    </div> -->
    </body>
</html>