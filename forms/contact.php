<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $to = "mateuszstankiewicz999@gmail.com";
  $subject = htmlspecialchars($_POST["subject"]);
  $name = htmlspecialchars($_POST["name"]);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
  $message = htmlspecialchars($_POST["message"]);

  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

  $full_message = "Imię: $name\nEmail: $email\n\nWiadomość:\n$message";

  if (mail($to, $subject, $full_message, $headers)) {
    echo "OK";
  } else {
    echo "Błąd przy wysyłaniu wiadomości.";
  }
} else {
  echo "Nieprawidłowe żądanie.";
}
