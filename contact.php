<?php 

//CONNECT TO DATABASE
include 'includes/db.php';

// INCLUDE HEADER
include 'includes/header.php';


//INCLUDE NAVIGATION
include 'includes/navigation.php';


// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("sayyaltamash786@gmail.com","My subject",$msg);

if (isset($_POST['submit'])) {
    $to = "sayyaltamash786@gmail.com";
    $subject = $_POST['subject'];
    $body = $_POST['body'];
}




?>
<div class="site-wrapper" >
    
    <div class="site-content">
        <div class="atbs-block atbs-block--fullwidth atbs-section-module-contact">
            <div class="block-heading block-heading_style-1 block-heading-no-line">
                <h4 class="block-heading__title">
                    Contact
                </h4>
            </div>
            <div class="atbs-block__inner">
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d193595.66904233702!2d-73.979681!3d40.69748800000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY!5e0!3m2!1sen!2sus!4v1627980608498!5m2!1sen!2sus" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="contact-form inverse-text">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <label for="fname">Name:</label>
                        <input type="text" id="fname" name="name"><br><br>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email"><br><br>

                        <label for="contactform-message">Message</label>
                        <textarea class="required form-control" id="contactform-message" name="contactform-message" rows="6" cols="30" aria-required="true"></textarea>
                        <button class="btn btn-primary contactform-submit" type="submit" id="contactform-submit" name="submit" value="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .site-content -->



    <?php include 'includes/footer.php'; ?>