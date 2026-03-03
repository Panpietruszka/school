<?php
$hostname = 'localhost';
$user = 'root';
$password = '';
$db = 'spotify';

$conn = mysqli_connect($hostname, $user, $password, $db);

function mojaFunkcja($conn)
{
    $q = "SELECT * FROM utwory";
    $result = mysqli_query($conn, $q);
    echo "<table class='text-white'><tr><th>ID</th><th>Tytuł</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['id']}</td><td>{$row['tytul']}</td><td>{$row['artysta']}</td></tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black p-10">

    <form method="POST">
        <button type="submit" name="pokaz_tabele" class="bg-white text-black px-4 py-2 rounded">
            Kliknij, aby załadować PHP
        </button>
    </form>

    <div class="mt-5">
        <?php
        if (isset($_POST['pokaz_tabele'])) {
            mojaFunkcja($conn);
        }
        ?>
    </div>

</body>

</html>