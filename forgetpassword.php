    <?php
    session_start();
    ?>
    <head>
        <title>Forgot Password</title>
        <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Da+2&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="forgetcss.css">
    </head>
    <body>
    <div>
        <div class="sidetitle">
            <span class="chms">Complaint Handling Management System</span>
        </div>
        
            <div class="container">
                <div class="title">
                    <span class="chms">Forgot password</span>
                </div>
                <form>
                    <div class="email">
                        <input type="text" placeholder="Enter your email" />
                    </div>
                    <!-- <div class="password">
                        <input type="text" placeholder="New Password" />
                    </div>
                    <div class="confirmpass">
                        <input type="text" placeholder="Confirm Password" />
                    </div> -->
                    <div class="submit">
                        <input type="submit" value="Send Reset Link" name="password_reser_link"/>
                    </div>
                    <div class="back">
                        <a href="login.php">Back to Login</a>
                    </div>
                </form>
            </div>
    </div>
    </body>