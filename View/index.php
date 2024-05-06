<html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <?php 
    require_once 'autoload.php';
if(isset($_POST['ok'])){
    $recaptcha = new \ReCaptcha\ReCaptcha("6LdJd9EpAAAAAPaaUkKhvikmCojZm7x0xC1Jvl8q");
    $gRecaptchaResponse=$_POST['g-recaptcha-response'];

    $resp = $recaptcha->setExpectedHostname('localhost')
                  ->verify($gRecaptchaResponse);
if ($resp->isSuccess()) {
    echo "success!";
} else {
    $errors = $resp->getErrorCodes();
    var_dump($errors);
}
}
    ?>
    <form  method="POST">
      <div class="g-recaptcha" data-sitekey="6LdJd9EpAAAAAIQ-arPod5TMnxS0O5t2eTMmaCY9"></div>
      <br/>
      <input type="submit" name="ok"value="Submit">
    </form>
  </body>
</html>