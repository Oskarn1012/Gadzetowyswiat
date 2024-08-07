<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Odbieranie danych z formularza
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Walidacja danych
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Adres e-mail, na który wiadomość ma być wysłana
        $to = '1012oskarn2010@gmail.com'; // Zmień na swój adres e-mail
        $subject = 'Nowa wiadomość od ' . $name;
        $body = "Imię: $name\nEmail: $email\n\nWiadomość:\n$message";
        $headers = "From: $email";

        // Wysyłanie e-maila
        if (mail($to, $subject, $body, $headers)) {
            echo "Wiadomość została wysłana pomyślnie!";
        } else {
            echo "Błąd podczas wysyłania wiadomości.";
        }
    } else {
        echo "Proszę wypełnić wszystkie pola i podać prawidłowy adres e-mail.";
    }
} else {
    echo "Nieprawidłowe żądanie.";
}
?>
