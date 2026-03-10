<?php
$hostname = 'localhost';
$user = 'root';
$password = '';
$db = 'spotify';

$conn = mysqli_connect($hostname, $user, $password, $db);

$q = "SELECT * FROM utwory";
$result = mysqli_query($conn, $q);

echo "<table class='border-collapse border border-slate-500 w-full text-left'>";
echo "<tr><th>ID</th><th>Tytuł</th><th>Artysta</th><th>Akcja</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['tytul']}</td>
            <td>{$row['artysta']}</td>
            <td>
                <button class='bg-red-600 px-2 py-1 rounded text-sm btn-usun' data-id='{$row['id']}'>Usuń</button>
            </td>
          </tr>";
}
echo "</table>";
?>