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

$jsPath = '../js/index.js';

require_once "../blocks/footer.php";

?>

<script src="<?php echo $jsPath; ?>"
