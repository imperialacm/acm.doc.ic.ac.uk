#!/usr/bin/php
<?php
require './include/PHPMailerAutoload.php';

$text = '';

// The secret key for ``I am not robot''
$secret_key = "6LfwzEMUAAAAADXnDvg5Se8tB2xrllSFK5cKKkTP";

$resp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);

$answer = json_decode($resp);

if ($answer->success === FLASE) {
  $text .= "Sorry, we think you might be robot :(";
} elseif (empty($_POST['firstname']) ||
    empty($_POST['lastname']) ||
    empty($_POST['email'])) {
  $text .= "All fields are required. ";
} elseif (!preg_match(
                "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
                $_POST['email'])) {
  $text .= "Invalid email address. ";
} else {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  #$email = $_POST['email'] . '@imperial.ac.uk';
  $email = $_POST['email'];
  $mail_new_member = new PHPMailer;
  $mail_new_member->isSMTP();
  $mail_new_member->Host = 'automail.cc.ic.ac.uk';
  $mail_new_member->From = 'noreply@imperial.ac.uk';
  $mail_new_member->addAddress($email, $firstname . ' ' . $lastname);
  $mail_new_member->Subject = "Subscribe and Become a Member of IC-ACM Student Chapter.";
  $mail_new_member->isHTML(true);
  $mail_new_member->Body = 
    "<p>Hi, $firstname $lastname</p>".
    "<p>Thanks for subscribing us and you are a member of Imperial College London ACM Student Chapter now. You can always find more information in our website <a href=\"http://acm.doc.ic.ac.uk/\">http://acm.doc.ic.ac.uk</a></p>".
    "<p>Imperial College London ACM Student Chapter Team</p>";
  if (!$mail_new_member->send()) {
    $text .= "We cannot send confirmation email to you.";
    $text .= "Please double check. :)";
    $text .= $mail_acm->ErrorInfo;
    exit;
  } else {
    $mail_acm = new PHPMailer;

    $mail_acm->isSMTP();
    $mail_acm->Host = 'automail.cc.ic.ac.uk';
    $mail_acm->From = 'noreply@imperial.ac.uk';
    $mail_acm->addAddress('acm@imperial.ac.uk');
    $mail_acm->addReplyTo($email, $firstname . ' ' . $lastname);
    $mail_acm->Subject = "Membership Request ($firstname $lastname)";
    $mail_acm->Body    = 
      "First Name: $firstname\n".
      "Last Name: $lastname\n".
      "Email: $email\n";

    if (!$mail_acm->send()) {
      $text .= "Message could not be sent. ";
      $text .= "Mailer Error: ";
      $text .= $mail_acm->ErrorInfo;
      exit;
    }
    $text .= "Message has been sent.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Imperial College London ACM Student Chapter">
    <meta name="author" content="Imperial College London ACM Student Chapter">
    <title>Imperial College London ACM Student Chapter</title>
    <link rel="alternate" href="http://acm.doc.ic.ac.uk/feed.xml" type="application/rss+xml" title="Imperial College London ACM Student Chapter">
    <link rel="stylesheet" href="/css/bootstrap.min.1104e95d.cache.css">
    <link rel="stylesheet" href="/css/ss-social.496602c7.cache.css">
    <link rel="stylesheet" href="/css/app.7ef7537d.cache.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">
    <!--if lt IE 9script(src='/js/html5shiv.631952c7.cache.js')-->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="/ico/favicon.png">
    <link rel="publisher" href="http://plus.google.com/109158233053938515993">
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          
          ga('create', 'UA-45260420-1', 'ic.ac.uk');
          ga('require', 'displayfeatures');
          ga('send', 'pageview');
        </script>
  </head>
  <body>
    <div role="navigation" class="navbar navbar-default site-navbar">
      <div data-spy="affix" data-offset-top="50" class="site-navbar-affixed">
        <div class="container">
          <div class="navbar-inner">
            <div class="navbar-header">
              <button type="button" data-toggle="collapse" data-target=".nav-collapse" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="/" title="Imperial College London ACM Student Chapter" class="navbar-brand"><img alt="Imperial College London ACM Student Chapter" src="/img/logo-inverse.png" width="162px" class="img-responsive"></a>
            </div>
            <nav class="navbar-collapse collapse nav-collapse">
              <ul class="nav navbar-nav">
                <li><a href="/joinus/">Join us</a></li>
                <li><a href="/sens/">Seminars/Events/News</a></li>
                <li><a href="/workshops/">Workshops</a></li>
                <li><a href="/bylaws/">Bylaws</a></li>
                <li><a href="/team/">Team</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <header class="site-header">
      <div class="container">
      </div>
    </header>
    <div class="site-content">
      <div class="container">
        <section id="page">
          <h2>
              <?php
              echo nl2br($text);
              ?>
          </h2>
        </section>
      </div>
    </div>
    <footer role="contentinfo" class="site-footer">
      <div class="container content">
        <div class="row">
          <div class="about col-lg-7">
            <h3>About Imperial College London ACM Student Chapter</h3>
            <p>
              The aim of Imperial College London ACM Student Chapter is to
              create a strong Computing research student community within
              our university. We encourage all students to actively
              participate in organising and attending chapter activities.
            </p>
          </div>
          <div class="social col-lg-5">
            <ul class="services pull-right unstyled">
              <li><a href="mailto:acm@imperial.ac.uk" class="ss-icon ss-social-circle ss-mail"></a></li>
              <li><a href="https://twitter.com/imperialacm" class="ss-icon ss-social-circle ss-twitter"></a></li>
              <li><a href="https://plus.google.com/u/0/communities/114497947449485471277" class="ss-icon ss-social-circle ss-googleplus"></a></li>
              <li><a href="https://www.facebook.com/imperialacm" class="ss-icon ss-social-circle ss-facebook"></a></li>
              <li><a href="http://www.linkedin.com/groups/Imperial-College-London-ACM-Student-6522268" class="ss-icon ss-social-circle ss-linkedin"></a></li>
              <li><a href="https://github.com/imperialacm" class="ss-icon ss-social-circle ss-octocat"></a></li>
            </ul>
          </div>
        </div>
        <div class="signoff">
          <p class="credit">&copy; 2014 <a href="http://acm.doc.ic.ac.uk">Imperial College London ACM Student Chapter</a></p>
        </div>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/js/bootstrap.min.5a6aa68d.cache.js"></script>
    <script src="/js/app.f62eb713.cache.js"></script>
  </body>
</html>
