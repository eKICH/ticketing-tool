<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require 'vendor/autoload.php';
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if (isset($_POST['reset-request-submit'])) {

  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  $url = "localhost/TicketingMain/forgotpassword.php?selector=". $selector . "&validator=". bin2hex($token);

  $expires = date("U") + 1800;

  require "../db.php";

  $userEmail = $_POST["email"];

  $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
  $stmt = mysqli_stmt_init($mysqli);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error";
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
  }

  $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
  $stmt = mysqli_stmt_init($mysqli);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error";
    exit();
  } else {
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);

/*
  $to = $userEmail;

  $subject = "Reset your password for CC Ticketing";

  $message = '<p>We received a password reset request. The link to reset your password is below.
  If you did not make this request, you can ignore this email</p>';
  $message .= '<p>Here is your password reset link: </br>';
  $mesage .='<a href="' . $url .'">' . $url . '</a></p>';

  $headers = "From: CCTicketing <ccticketing@gmail.com\r\n>";
  $headers .= "Reply: CCTicketing <ccticketing@gmail.com\r\n>";
  $headers .= "Content-type: text/html\r\n";

  mail($to, $subject, $message, $headers);
*/

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
  //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                            // Enable verbose debug output
    $mail->isSMTP();                                                   // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                             // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                        // Enable SMTP authentication
    $mail->Username   = 'callcenterticketing@gmail.com';            // SMTP username
    $mail->Password   = 'ticketingmain';                           // SMTP password
    $mail->SMTPSecure = TLS;                                      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                     // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('callcenterticketing@gmail.com', 'Call Center Ticketing');
    $mail->addAddress ($userEmail);     // Add a recipient
    $mail->addReplyTo('no-reply@gmail.com', 'No reply');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your Password Reset Link';
    $mail->Body = '<p>We received a password reset request. The link to reset your password is below.<br>
    If you did not make this request, you can ignore this email</p>';
    $mail->Body .= '<p>Here is your password reset link: </br>';
    $mail->Body .='<a href="' . $url .'">' . $url . '</a></p>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("Location:../resetpwd.php?reset=success");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

} else {
  header("Location:../Index.php");
}
