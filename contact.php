<?php

include 'config2.php';
if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $txt = mysqli_real_escape_string($conn, ($_POST['feedback']));

   $insert = mysqli_query($conn, "INSERT INTO `feedback`(name, email, feedback) VALUES('$name', '$email', '$txt')") or die('query failed');
}
?>

<!DOCTYPE html>
<html>
<head>
    <link
    rel="stylesheet"
    href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <link
    rel="stylesheet"
    href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="style12.css" />
</head>
<body>
    <section id="last">
    <!-- heading -->
    <div class="full">
        <h3>Drop a Message</h3>

        <div class="lt">

        <!-- form starting -->
        <form class="form-horizontal"
                method="post" action="contact.php">
            <div class="form-group">
            <div class="col-sm-12">
                <!-- name -->
                <input
                type="text"
                class="form-control"
                id="name"
                placeholder="Name"
                name="name"
                value=""
                />
            </div>
            </div>

            <div class="form-group">
            <div class="col-sm-12">
                <!-- email -->
                <input
                type="email"
                class="form-control"
                id="email"
                placeholder="Email"
                name="email"
                value=""
                />
            </div>
            </div>

            <!-- message -->
            <textarea
            class="form-control"
            rows="10"
            id="Feedback"
            placeholder="Feedback"
            name="feedback">
            </textarea>

            <button
            class="btn btn-primary send-button"
            id="submit"
            type="submit"
            value="SEND"
            name="send">
            <i class="fa fa-paper-plane"></i>
            <span class="send-text">SEND</span>
            </button>
        </form>
        <!-- end of form -->
        </div>

        <!-- Contact information -->
        <div class="rt">
        <ul class="contact-list">
            <li class="list-item">
            <i class="fa fa-envelope fa-1x">
                <span class="contact-text gmail">
                <a href="mailto:yourmail@gmail.com" title="Send me an email">
                    localuddy006@gmail.com</a>
                </span>
            </i>
            </li>

            <li class="list-item">
            <i class="fa fa-phone fa-1x">
                <span class="contact-text phone">
                +91 9082228112
                </span>
            </i>
            </li>
        </ul>
        </div>
    </div>
    </section>
</body>
</html>
