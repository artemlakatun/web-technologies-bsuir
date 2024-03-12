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
            <li><a href="../index.php" class="link">Home</a></li>
            <li><a href="lesson2.php" class="link">Lesson 2</a></li>
            <li><a href="lesson3.php" class="link">Lesson 3</a></li>
            <li><a href="lesson4.php" class="link">Lesson 4</a></li>
            <li><a href="lesson5.php" class="link">Lesson 5</a></li>
            <li><a href="lesson6.php" class="link">Lesson 6</a></li>
            <li><a href="lesson7.php" class="link">Lesson 7</a></li>
        </ul>
    </div>
</div>
<section class="subject ths__subject">
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

require_once "../blocks/footer.php";

?>

<script src="../js/index.js"></script>
