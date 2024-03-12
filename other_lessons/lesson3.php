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
            <li><a href="lesson4.php" class="link">Lesson 4</a></li>
            <li><a href="lesson5.php" class="link">Lesson 5</a></li>
            <li><a href="lesson6.php" class="link">Lesson 6</a></li>
            <li><a href="lesson7.php" class="link">Lesson 7</a></li>
            <li><a href="lesson8.php" class="link">Lesson 8</a></li>
        </ul>
    </div>
</div>
<section class="subject ths__subject">
    <form class="lesson3_form" method="POST">
        <label for="directory">Введите имя каталога:</label>
        <input type="text" id="directory" name="directory">
        <button type="submit">Поиск</button>
    </form>
    <div class="result">
        <?php
        function countFiles($directory) {
            $filesCount = 0;
            $textFilesCount = 0;
            $imageFilesCount = 0;

            if (is_dir($directory)) {
                $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory), RecursiveIteratorIterator::SELF_FIRST);
                foreach ($iterator as $file) {
                    if ($file->isFile()) {
                        $filesCount++;

                        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        if (in_array($extension, ['txt', 'doc', 'docx', 'pdf'])) {
                            $textFilesCount++;
                        } elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                            $imageFilesCount++;
                        }
                    }
                }
            }

            return ['total' => $filesCount, 'text' => $textFilesCount, 'images' => $imageFilesCount];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $directory = isset($_POST['directory']) ? $_POST['directory'] : '';

            if (!empty($directory)) {
                $counts = countFiles($directory);

                echo '<h2>Результаты:</h2>';
                echo '<table border="1">';
                echo '<tr><th>Всего файлов</th><th>Текстовые документы</th><th>Изображения</th></tr>';
                echo '<tr><td>' . $counts['total'] . '</td><td>' . $counts['text'] . '</td><td>' . $counts['images'] . '</td></tr>';
                echo '</table>';
            } else {
                echo '<p>Пожалуйста, введите имя каталога.</p>';
            }
        }
        ?>
    </div>
</section>

<?php

require_once "../blocks/footer.php";

?>

<script src="../js/index.js"></script>
