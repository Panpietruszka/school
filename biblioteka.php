<?php
$conn = mysqli_connect("localhost", "root", "", "biblioteka") or die("Błąd połączenia z bazą");
mysqli_set_charset($conn, "utf8");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteka - lista książek</title>
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <h2>Lista książek</h2>

  <?php
    $q = "SELECT id, tytul, autor, rok_wydania FROM ksiazki ORDER BY id ASC;";
    $result = mysqli_query($conn, $q);

    if(!$result){
      echo "Błąd zapytania.";
    } else {
      echo "<table>";
      echo "<tr><th>ID</th><th>Tytuł</th><th>Autor</th><th>Rok wydania</th><th>Akcja</th></tr>";

      while($row = mysqli_fetch_assoc($result)){
        $id = $row["id"];
        $tytul = $row["tytul"];
        $autor = $row["autor"];
        $rok = $row["rok_wydania"];

        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$tytul}</td>";
        echo "<td>{$autor}</td>";
        echo "<td>{$rok}</td>";
        echo "<td><button type='button' onclick='showId($id, `$tytul`, `$autor`, $rok)'>Pokaż ID</button></td>";
        echo "</tr>";
      }

      echo "</table>";
    }

    mysqli_close($conn);
  ?>
  <script src="script.js"></script>
</body>
</html>
