<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit;
}

$name    = htmlspecialchars(trim($_POST["name"]));
$email   = htmlspecialchars(trim($_POST["email"]));
$phone   = htmlspecialchars(trim($_POST["phone"]));
$service = htmlspecialchars(trim($_POST["service"]));
$message = htmlspecialchars(trim($_POST["message"]));

if (!$name || !$email || !$phone || !$service || !$message) {
    echo "error";
    exit;
}

$to = "info@valuationmasters.in";
$subject = "New Contact Message - Valuation Masters";

$body = "
New contact form submission:

Name: $name
Email: $email
Phone: $phone
Service: $service

Message:
$message
";

$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8";

if (mail($to, $subject, $body, $headers)) {
    echo "success";
} else {
    echo "error";
}
?>