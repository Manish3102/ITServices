<?php
/**
 * Contact Form Email Handler
 * Sends form data to techscalify@gmail.com using PHPMailer with PHP mail()
 * Compatible with InfinityFree (uses mail() instead of SMTP)
 *
 * PHPMailer Setup: Download from https://github.com/PHPMailer/PHPMailer
 * Extract the 'src' folder and place it as: phpmailer/src/
 * Required files: Exception.php, PHPMailer.php, SMTP.php
 */

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo '<div class="alert alert-danger">Invalid request method.</div>';
    exit;
}

// Load PHPMailer (adjust path if your phpmailer folder is elsewhere)
$phpmailerPath = __DIR__ . '/phpmailer/src/';
if (!file_exists($phpmailerPath . 'Exception.php') || !file_exists($phpmailerPath . 'PHPMailer.php')) {
    echo '<div class="alert alert-danger">Email system not configured. Please contact the administrator.</div>';
    exit;
}

require $phpmailerPath . 'Exception.php';
require $phpmailerPath . 'PHPMailer.php';
require $phpmailerPath . 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Configuration
define('RECIPIENT_EMAIL', 'techscalify@gmail.com');
define('MAX_MESSAGE_LENGTH', 5000);
define('MAX_NAME_LENGTH', 100);
define('MAX_SUBJECT_LENGTH', 200);

/**
 * Sanitize and validate input
 */
function sanitize($value, $maxLength = 1000) {
    $value = trim($value ?? '');
    $value = strip_tags($value);
    $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    return substr($value, 0, $maxLength);
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Collect and sanitize POST data
$name    = sanitize($_POST['name'] ?? '', MAX_NAME_LENGTH);
$email   = trim($_POST['email'] ?? '');
$subject = sanitize($_POST['subject'] ?? '', MAX_SUBJECT_LENGTH);
$message = sanitize($_POST['message'] ?? '', MAX_MESSAGE_LENGTH);

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = 'Name is required.';
}

if (empty($email)) {
    $errors[] = 'Email is required.';
} elseif (!isValidEmail($email)) {
    $errors[] = 'Please enter a valid email address.';
}

if (empty($message)) {
    $errors[] = 'Message is required.';
}

if (empty($subject)) {
    $errors[] = 'Please select a subject.';
}

// Basic spam prevention: block script/iframe injection
if (preg_match('/<script|<iframe|javascript:/i', $name . $subject . $message)) {
    $errors[] = 'Your message contains invalid content.';
}

if (!empty($errors)) {
    echo '<div class="alert alert-danger"><strong>Please fix the following:</strong><ul>';
    foreach ($errors as $err) {
        echo '<li>' . htmlspecialchars($err) . '</li>';
    }
    echo '</ul></div>';
    exit;
}

try {
    $mail = new PHPMailer(true);

    // Use PHP mail() - required for InfinityFree (SMTP ports are blocked)
    $mail->isMail();

    // Sender (use form submitter's email as Reply-To)
    $mail->setFrom(RECIPIENT_EMAIL, 'Techscalify Website');
    $mail->addReplyTo($email, $name);

    // Recipient
    $mail->addAddress(RECIPIENT_EMAIL, 'Techscalify');

    // Subject
    $mail->Subject = 'New Enquiry: ' . $subject;

    // Plain text body (works reliably with PHP mail())
    $mail->isHTML(false);
    $mail->Body = "New Enquiry from Techscalify Website\n\n";
    $mail->Body .= "Name: {$name}\n";
    $mail->Body .= "Email: {$email}\n";
    $mail->Body .= "Subject: {$subject}\n\n";
    $mail->Body .= "Message:\n{$message}\n";

    // Alternative HTML body (optional, for email clients that support it)
    $mail->AltBody = $mail->Body;

    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    $mail->send();

    echo '<div class="alert alert-success"><strong>Thank you!</strong> Your message has been sent successfully. We will get back to you soon.</div>';

} catch (Exception $e) {
    $errorMsg = isset($mail) ? $mail->ErrorInfo : $e->getMessage();
    error_log('PHPMailer Error: ' . $errorMsg);
    echo '<div class="alert alert-danger"><strong>Sorry,</strong> we could not send your message. Please try again later or email us directly at techscalify@gmail.com.</div>';
}
