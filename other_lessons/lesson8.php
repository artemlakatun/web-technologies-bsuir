<?php

require_once "../blocks/header.php";

$visitors = array(
    array("browser" => "Chrome", "visits" => 150),
    array("browser" => "Firefox", "visits" => 100),
    array("browser" => "Safari", "visits" => 80),
    array("browser" => "Edge", "visits" => 70),
    array("browser" => "Opera", "visits" => 50)
);

usort($visitors, function($a, $b) {
    return $b['visits'] - $a['visits'];
});
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
    <div class="result result8">
        <h2>Статистика браузеров</h2>
        <table>
            <tr>
                <th>Браузер</th>
                <th>Посещения</th>
            </tr>
            <?php foreach ($visitors as $visitor): ?>
                <tr>
                    <td><?php echo $visitor['browser']; ?></td>
                    <td><?php echo $visitor['visits']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>

<?php

$jsPath = '../js/index.js';

require_once "../blocks/footer.php";

?>

<script src="<?php echo $jsPath; ?>"
