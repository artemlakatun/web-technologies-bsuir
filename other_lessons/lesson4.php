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
            <li><a href="#" class="link">Пункт меню 1</a></li>
            <li><a href="#" class="link">Пункт меню 2</a></li>
            <li><a href="#" class="link">Пункт меню 3</a></li>
            <li><a href="#" class="link">Пункт меню 4</a></li>
        </ul>
    </div>
</div>
<section class="subject">
    <form class="lesson4_form" method="POST">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name"><br>
        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email"><br>
        <button type="submit">Отправить</button>
    </form>
    <div class="result">
        <?php
        function validateEmail($email) {
            $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

            if (preg_match($pattern, $email)) {
                return true;
            } else {
                return false;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];

            if (validateEmail($email)) {
                $data = "Имя: $name, E-mail: $email\n";
                file_put_contents('emails.txt', $data, FILE_APPEND);

                echo "Данные успешно записаны в файл.";
            } else {
                echo "Некорректный адрес электронной почты.";
            }
        }
        ?>
    </div>
</section>




<?php

$jsPath = '../js/index.js';

require_once "../blocks/footer.php";

?>

<script src="<?php echo $jsPath; ?>"

