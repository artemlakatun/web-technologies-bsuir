<?php

require_once "../blocks/header.php";



?>

    <header class="header">
        <div class="social">
            <a href="#" class="link"><i class='bx bxl-telegram'></i></a>
            <a href="#" class="link"><i class='bx bxl-github'></i></a>
            <a href="#" class="link"><i class='bx bxl-vk'></i></a>
            <a href="#" class="link"><i class='bx bxl-gmail'></i></a>
        </div>
        <div class="menu-toggle" id="menu-toggle">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div class="logo">
            <p>Web-technologies-BSUIR</p>
        </div>
    </header>
    <div class="side-menu" id="side-menu">
        <div class="nav-bar">
            <ul>
                <li><a href="../index.php" class="link">Home</a></li>
                <li><a href="lesson2.php" class="link">Lesson 2</a></li>
                <li><a href="lesson3.php" class="link">Lesson 3</a></li>
                <li><a href="lesson4.php" class="link">Lesson 4</a></li>
                <li><a href="lesson5.php" class="link">Lesson 5</a></li>
                <li><a href="lesson6.php" class="link">Lesson 6</a></li>
                <li><a href="lesson8.php" class="link">Lesson 8</a></li>
            </ul>
        </div>
    </div>
<section class="subject ths__subject">
    <form class="lesson7_form" method="POST">
        <label for="recipients">Получатели:</label><br>
        <input type="text" id="recipients" name="recipients" required><br>
        <label for="subject">Тема:</label><br>
        <input type="text" id="subject" name="subject" required><br>
        <label for="message">Текст сообщения:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br>
        <button type="submit">Отправить</button>
    </form>
    <div class="result">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['recipients']) && isset($_POST['subject']) && isset($_POST['message'])) {
                $recipients = $_POST['recipients'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];


                $recipientList = explode(",", $recipients);
                $validRecipients = [];
                foreach ($recipientList as $recipient) {
                    $recipient = trim($recipient);
                    if (filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
                        $validRecipients[] = $recipient;
                    }
                }

                if (count($validRecipients) > 0) {
                    $file = fopen("recipients.txt", "w");
                    fwrite($file, implode("\n", $validRecipients));
                    fclose($file);

                    $to = $recipients;
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];
                    $headers = 'From: ваш_email@example.com' . "\r\n" .
                        'Reply-To: ваш_email@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                    foreach ($validRecipients as $recipient) {
                        mail($recipient, $subject, $message, $headers);
                    }

                    echo "Письмо успешно отправлено!";
                } else {
                    echo "Ошибка: Некорректные адреса электронной почты!";
                }
            }
        }
        ?>
    </div>
</section>

<?php

require_once "../blocks/footer.php";

?>

<script src="../js/index.js"></script>
