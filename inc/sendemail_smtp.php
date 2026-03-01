<?php
/**
 * SMTP Email Handler for Contact Form
 * This is a more reliable alternative to PHP's mail() function
 * 
 * To use this, you need to:
 * 1. Get Gmail App Password: https://myaccount.google.com/apppasswords
 * 2. Update the SMTP credentials below
 * 3. Change the form action in contact.php to use this file
 */

// SMTP Configuration - UPDATE THESE WITH YOUR GMAIL CREDENTIALS
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'techscalify@gmail.com'); // Your Gmail address
define('SMTP_PASSWORD', 'YOUR_APP_PASSWORD_HERE'); // Gmail App Password (not regular password)
define('SMTP_FROM_EMAIL', 'techscalify@gmail.com');
define('SMTP_FROM_NAME', 'Tech Scalify Contact Form');

// Prevent direct access - check if POST data exists (works for both regular POST and AJAX)
if (empty($_POST) || !isset($_POST['name'])) {
    http_response_code(403);
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

// Get form data
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$problem = isset($_POST['problem']) ? trim($_POST['problem']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Validate required fields
if (empty($name) || empty($email) || empty($phone) || empty($message)) {
    echo '<div class="alert alert-danger">Please fill in all required fields.</div>';
    exit;
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<div class="alert alert-danger">Please enter a valid email address.</div>';
    exit;
}

// Sanitize input
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
$problem = htmlspecialchars($problem, ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

// Email configuration
$to = 'techscalify@gmail.com';
$subject = 'New Contact Form Enquiry - Tech Scalify';

// Email body
$email_body = "New Contact Form Enquiry\n\n";
$email_body .= "Name: " . $name . "\n";
$email_body .= "Email: " . $email . "\n";
$email_body .= "Phone: " . $phone . "\n";
$email_body .= "Problem: " . ($problem ? $problem : 'Not specified') . "\n";
$email_body .= "Message: " . $message . "\n\n";
$email_body .= "---\n";
$email_body .= "This email was sent from the Tech Scalify contact form.\n";
$email_body .= "Date: " . date('Y-m-d H:i:s') . "\n";

// Simple SMTP function
function sendSMTPEmail($to, $subject, $message, $from_email, $from_name, $reply_name, $reply_email) {
    $smtp_host = SMTP_HOST;
    $smtp_port = SMTP_PORT;
    $smtp_user = SMTP_USERNAME;
    $smtp_pass = SMTP_PASSWORD;
    
    // Check if SMTP password is configured
    if ($smtp_pass === 'YOUR_APP_PASSWORD_HERE') {
        return false;
    }
    
    // Create socket connection
    $socket = @fsockopen($smtp_host, $smtp_port, $errno, $errstr, 30);
    if (!$socket) {
        return false;
    }
    
    // Read server response
    $response = fgets($socket, 515);
    
    // Send EHLO
    fputs($socket, "EHLO " . $smtp_host . "\r\n");
    $response = fgets($socket, 515);
    
    // Start TLS
    fputs($socket, "STARTTLS\r\n");
    $response = fgets($socket, 515);
    
    // Enable crypto
    stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
    
    // Send EHLO again after TLS
    fputs($socket, "EHLO " . $smtp_host . "\r\n");
    $response = fgets($socket, 515);
    
    // Authenticate
    fputs($socket, "AUTH LOGIN\r\n");
    $response = fgets($socket, 515);
    
    fputs($socket, base64_encode($smtp_user) . "\r\n");
    $response = fgets($socket, 515);
    
    fputs($socket, base64_encode($smtp_pass) . "\r\n");
    $response = fgets($socket, 515);
    
    if (substr($response, 0, 3) != '235') {
        fclose($socket);
        return false;
    }
    
    // Send email
    fputs($socket, "MAIL FROM: <" . $from_email . ">\r\n");
    $response = fgets($socket, 515);
    
    fputs($socket, "RCPT TO: <" . $to . ">\r\n");
    $response = fgets($socket, 515);
    
    fputs($socket, "DATA\r\n");
    $response = fgets($socket, 515);
    
    $email_content = "From: " . $from_name . " <" . $from_email . ">\r\n";
    $email_content .= "To: " . $to . "\r\n";
    $email_content .= "Subject: " . $subject . "\r\n";
    $email_content .= "Reply-To: " . $reply_name . " <" . $reply_email . ">\r\n";
    $email_content .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $email_content .= "\r\n" . $message . "\r\n.\r\n";
    
    fputs($socket, $email_content);
    $response = fgets($socket, 515);
    
    fputs($socket, "QUIT\r\n");
    fclose($socket);
    
    return (substr($response, 0, 3) == '250');
}

// Try SMTP first, fallback to mail()
$mail_sent = false;

// Try SMTP if configured
if (SMTP_PASSWORD !== 'YOUR_APP_PASSWORD_HERE') {
    $mail_sent = sendSMTPEmail($to, $subject, $email_body, SMTP_FROM_EMAIL, SMTP_FROM_NAME, $name, $email);
}

// Fallback to regular mail() if SMTP not configured or failed
if (!$mail_sent) {
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "From: " . SMTP_FROM_NAME . " <" . SMTP_FROM_EMAIL . ">\r\n";
    $headers .= "Reply-To: " . $name . " <" . $email . ">\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    
    $mail_sent = @mail($to, $subject, $email_body, $headers);
}

if ($mail_sent) {
    echo '<div class="alert alert-success">Thank you! Your message has been sent successfully. We will get back to you soon.</div>';
} else {
    // Log the submission as fallback
    $log_file = __DIR__ . '/contact_log.txt';
    $log_entry = date('Y-m-d H:i:s') . " - Contact Form Submission\n";
    $log_entry .= "Name: $name\n";
    $log_entry .= "Email: $email\n";
    $log_entry .= "Phone: $phone\n";
    $log_entry .= "Problem: " . ($problem ? $problem : 'Not specified') . "\n";
    $log_entry .= "Message: $message\n";
    $log_entry .= "---\n\n";
    
    @file_put_contents($log_file, $log_entry, FILE_APPEND);
    
    echo '<div class="alert alert-warning">Your message has been received and logged. However, there was an issue sending the email notification. Please contact us directly at <a href="mailto:techscalify@gmail.com">techscalify@gmail.com</a> or call us at <a href="tel:+918717872372">(+91) 871-787-2372</a>.</div>';
}
?>

