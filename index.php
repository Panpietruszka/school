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
    echo "<table class=''><tr><th>ID</th><th>Tytuł</th><th>Artysta</th><th>Usuń</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['id']}</td><td>{$row['tytul']}</td><td>{$row['artysta']}</td><td><button type=" . "[submit]" . " name=" . "[btn_Usun]" . ">Usuń</button></td><td><button type=" . "[submit]" . " name=" . "[btn_Dodaj]" . ">Dodaj</button></td></tr>";
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

<body class="bg-[#152614] text-[#fafafa]">

    <form method="POST">
        <button type="submit" name="pokaz_tabele" class="bg-white text-black px-4 py-2 rounded">
            Kliknij, aby załadować PHP
        </button>
        <button type="submit" name="pokaz_formularz" class="bg-white text-black px-4 py-2 rounded">
            Kliknij, aby otworzyć formularz
        </button>
    </form>

    <div id="miejsce-na-formularz"></div>

    </div>


    <div class="mt-5">
        <?php
        if (isset($_POST['pokaz_tabele'])) {
            mojaFunkcja($conn);
        }
        ?>
    </div>


    <script>
        const btnPokaz = document.querySelector('button[name="pokaz_formularz"]');
        const kontener = document.getElementById('miejsce-na-formularz');

        btnPokaz.addEventListener('click', async (e) => {
            e.preventDefault();

            if (kontener.innerHTML.trim() !== "") {
                kontener.innerHTML = "";
            } else {
                const MOCK_URL = "https://4894fe2c-2d30-4536-9211-49a333eaccc7.mock.pstmn.io";

                try {
                    const response = await fetch(MOCK_URL);
                    if (!response.ok) throw new Error("Problem z odpowiedzią serwera");

                    const html = await response.text();
                    kontener.innerHTML = html;
                } catch (err) {
                    console.error("Błąd pobierania:", err);
                    kontener.innerHTML = "<p class='text-red-500'>Błąd ładowania formularza.</p>";
                }
            }
        });

    </script>
</body>

</html>