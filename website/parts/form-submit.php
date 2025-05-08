<?php

const email_regex = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
const phone_regex = '/^((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))$/';


if (strlen($_POST['first-name']) < 1) {
    $form_errors[] = 'First name is required';
}
if (strlen($_POST['last-name']) < 1) {
    $form_errors[] = 'Last name is required';
}

if (strlen($_POST['email']) < 1) {
    $form_errors[] = 'Email address is required.';
} elseif (!preg_match(email_regex, $_POST['email'])) {
    $form_errors[] = 'Invalid email address';
}
// optional phone number in case I add this to the form
if (isset($_POST['phone']) && strlen($_POST['phone']) > 0 && !preg_match(phone_regex, $_POST['phone'])) {
    $form_errors[] = 'Invalid phone number';
}


if (strlen($_POST['subject']) < 1) {
    $form_errors[] = 'Subject is required';
}
if (strlen($_POST['message']) < 1) {
    $form_errors[] = 'Message is required';
}

if (!empty($form_errors)) {
    return;
}

require_once realpath(__DIR__ . "/../vendor/autoload.php");

require 'parts/database.php';

$db = new Database();
$db->query('insert into contact(first_name, last_name, email, phone, subject, message) values(:first_name, :last_name, :email, :phone, :subject, :message)', [
    'first_name' => $_POST['first-name'],
    'last_name' => $_POST['last-name'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'] ?? '',
    'subject' => $_POST['subject'],
    'message' => $_POST['message']
]);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = $_ENV['MAIL_HOST'];
$mail->SMTPAuth = true;
$mail->Username = $_ENV['MAIL_USERNAME'];
$mail->Password = $_ENV['MAIL_PASSWORD'];
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = $_ENV['MAIL_PORT'];

$mail->addAddress($_ENV['MAIL_TARGET']);
$mail->Body = 'New form submission';

if (!$mail->send()) {
    // mail failed to send (do I put this as an error? Since the form submitted to database ok)
}


header("location: ?submit=true#formError");