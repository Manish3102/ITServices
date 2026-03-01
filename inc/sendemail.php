<?php
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

// Sanitize input to prevent email injection and XSS
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

// Email headers - improved for better deliverability
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "From: Tech Scalify Contact Form <noreply@" . $_SERVER['HTTP_HOST'] . ">\r\n";
$headers .= "Reply-To: " . $name . " <" . $email . ">\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= "X-Priority: 1\r\n";

// Additional parameters for mail function
$additional_parameters = "-f noreply@" . $_SERVER['HTTP_HOST'];

// Enable error reporting for debugging (comment out in production)
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Try to send email
$mail_sent = @mail($to, $subject, $email_body, $headers, $additional_parameters);

// Check if mail was sent successfully
if ($mail_sent) {
    echo '<div class="alert alert-success">Thank you! Your message has been sent successfully. We will get back to you soon.</div>';
} else {
    // Log the error for debugging
    $error_msg = error_get_last();
    error_log("Mail sending failed: " . print_r($error_msg, true));
    
    // Try alternative method using file-based notification (fallback)
    $log_file = __DIR__ . '/contact_log.txt';
    $log_entry = date('Y-m-d H:i:s') . " - Contact Form Submission\n";
    $log_entry .= "Name: $name\n";
    $log_entry .= "Email: $email\n";
    $log_entry .= "Phone: $phone\n";
    $log_entry .= "Problem: " . ($problem ? $problem : 'Not specified') . "\n";
    $log_entry .= "Message: $message\n";
    $log_entry .= "---\n\n";
    
    @file_put_contents($log_file, $log_entry, FILE_APPEND);
    
    echo '<div class="alert alert-warning">Your message has been received. However, there was an issue sending the email notification. Please contact us directly at <a href="mailto:techscalify@gmail.com">techscalify@gmail.com</a> or call us at <a href="tel:+918717872372">(+91) 871-787-2372</a>.</div>';
}
?>

