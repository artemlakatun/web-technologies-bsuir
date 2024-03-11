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
    <form class="lesson2_form" method="POST">
        <label for="input">Введите значения (разделитель - запятая):</label><br>
        <textarea id="input" name="input" rows="4" cols="50"></textarea><br>
        <button type="submit">Отправить</button>
    </form>
    <div class="result">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input = $_POST['input'];

            $values = explode(',', $input);

            echo '<h2>Результаты:</h2>';
            foreach ($values as $value) {
                $value = trim($value);

                if (is_numeric($value)) {
                    if (strpos($value, '.') !== false) {
                        echo "$value - дробное число<br>";
                    } else {
                        echo "$value - целое число<br>";
                    }
                } else {
                    echo "$value - строка<br>";
                }
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
