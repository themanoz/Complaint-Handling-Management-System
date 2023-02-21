<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>
        <meta name="viewport" content="width-device-width,initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Da+2&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="contact.css">
    </head>
    <body>
        <div class="container">
            <form onsubmit="sendEmail(); reset(); return false;">
                <h3>GET IN TOUCH</h3>
                <input type="text" id="name" placeholder="Your Name" required>
                <input type="email" id="email" placeholder="Email Id" required>
                <input type="number" id="Phone" placeholder="Phone Number" required>
                <textarea id="message" rows="4" placeholder="How can we help you?"></textarea>
                <button type="submit" onclick="sendEmail()">Send</button>
            </form>
        </div>
        <script src="https://smtpjs.com/v3/smtp.js"></script>
        <script>
            function sendEmail(){
                Email.send({
                    Host : "smtp.gmail.com",
                    Username : "jhansiappalasetti@gmail.com",
                    Password : "Jhansi@2406",
                    To : "jhansiappalasetti@gmail.com",
                    From : document.getElementById("email").value,
                    Subject : "New Contact Form Enquiry",
                    Body : "Name: "+ document.getElementById("name").value
                             + "<br> Email: "+ document.getElementById("email").value
                             + "<br> Phone no: " + document.getElementById("Phone").value
                             + "<br> Message: " + document.getElementById("message").value
                    }).then(
                        message => alert("Message sent Successfully")
                    );
            }
        </script>
    </body>
</html>