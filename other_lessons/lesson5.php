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
            <li><a href="lesson6.php" class="link">Lesson 6</a></li>
            <li><a href="lesson7.php" class="link">Lesson 7</a></li>
            <li><a href="lesson8.php" class="link">Lesson 8</a></li>
        </ul>
    </div>
</div>
<section class="subject ths__subject">
    <form class="lesson5_form" method="POST">
        <label for="city">Введите название города:</label>
        <input type="text" id="city" name="city">
        <button type="submit">Отправить</button>
    </form>
    <div class="result">
        <?php
        $dsn = "pgsql:host=localhost;dbname=cities_database";
        $username = "artemlakatun";
        $password = "1234";

        try {
            $pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }

        function mb_lcfirst($string) {
            return mb_strtolower(mb_substr($string, 0, 1)) . mb_substr($string, 1);
        }

        function getComputerResponse($lastLetter, $pdo) {
            $lastLetter = mb_lcfirst($lastLetter);

            $sql = "SELECT name FROM cities WHERE LOWER(name) LIKE :letter";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['letter' => $lastLetter . '%']);
            $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($cities) {
                return $cities[array_rand($cities)]['name'];
            } else {
                return "Не могу найти город. Вы победили!";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $playerCity = $_POST['city'];

            $playerCity = mb_lcfirst($playerCity);
            $lastLetter = substr($playerCity, -1);
            $computerCity = getComputerResponse($lastLetter, $pdo);

            $resultHtml = "<p>Ваш город: $playerCity</p>";
            $resultHtml .= "<p>Город компьютера: $computerCity</p>";

            echo $resultHtml;
        }
        ?>
    </div>
</section>

<?php

require_once "../blocks/footer.php";

?>

<script src="../js/index.js"></script>
