<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-[#152614] text-[#fafafa]">


    <canvas id="dustCanvas"></canvas>

        <button id="btn-toggle-tabela" class="bg-white text-black px-4 py-2 rounded">
            Pokaż/Ukryj Tabelę
        </button>
        <button type="submit" name="pokaz_formularz" class="bg-white text-black px-4 py-2 rounded">
            Kliknij, aby otworzyć formularz
        </button>

    <div id="miejsce-na-formularz"></div>

    </div>


    <div id="miejsce-na-tabele" class="mt-5"></div>

    <script type="module" src="script.js"></script>
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