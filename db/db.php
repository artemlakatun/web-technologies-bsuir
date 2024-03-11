<?php

$host = "localhost";
$port = "5432";
$dbname = "test2";
$user = "artemlakatun";
$password = "1234";

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    $db_connection = new PDO($dsn);
    $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $evaluation = $_POST["evaluation"];

    $sql = "INSERT INTO eval (name, evaluation) VALUES (:name, :evaluation)";

    try {
        $stmt = $db_connection->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':evaluation', $evaluation);
        $stmt->execute();
        echo "Данные успешно добавлены в базу данных";
    } catch (PDOException $e) {
        echo "Ошибка при добавлении данных в базу данных: " . $e->getMessage();
    }
}