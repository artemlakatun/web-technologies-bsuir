<?php

require_once "../blocks/header.php";


session_start();

$resultMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (strlen($login) >= 2 && strlen($password) >= 5 && ctype_alnum($login) && ctype_alnum($password)) {

            $hashedPassword = md5($password);

            $_SESSION['login'] = $login;

            $resultMessage = "Здравствуйте, $login";
        } else {
            $resultMessage = "Некорректный логин или пароль";
        }
    }
}

function logout() {
    session_unset();
    session_destroy();
}
?>

<?php if (!isset($_SESSION['login'])): ?>
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
    <form class="lesson6_form" method="POST">
        <label for="login">Логин:</label><br>
        <input type="text" id="login" name="login" minlength="2" required><br>
        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password" minlength="5" required><br>
        <button type="submit">Войти</button>
    </form>
    <?php else: ?>
    <form method="POST">
        <button type="submit" name="logout">Выйти</button>
    </form>
    <?php endif; ?>
    <div class="result">
        <?php echo $resultMessage; ?>
    </div>
    <?php
    if (isset($_POST['logout'])) {
        logout();
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }
    ?>
</section>

<?php

$jsPath = '../js/index.js';

require_once "../blocks/footer.php";

?>

<script src="<?php echo $jsPath; ?>