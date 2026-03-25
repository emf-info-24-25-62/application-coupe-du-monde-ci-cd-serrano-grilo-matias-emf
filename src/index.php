<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vainqueurs de la coupe du monde</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f0f2f5;
            font-family: 'Roboto', sans-serif;
        }

        header {
            background: #1a73e8;
            color: white;
            padding: 30px 0;
            text-align: center;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
        }

        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }

        form {
            margin-bottom: 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        select, button {
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #1a73e8;
            color: white;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #0c53b7;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .winner-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        .winner-card:hover {
            transform: scale(1.02);
        }

        .winner-card h2 {
            margin-top: 0;
            font-family: 'Orbitron', sans-serif;
            color: #1a73e8;
        }

        .team {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 18px;
        }

        .flag {
            width: 32px;
            height: 22px;
            margin-right: 12px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<header>
    <h1>🏆 Vainqueurs de la coupe du monde de Football</h1>
</header>

<div class="container">
    <?php
    $winners = [
        2022 => ["Argentine", "France"],
        2018 => ["France", "Croatie"],
        2014 => ["Allemagne", "Argentine"],
        2010 => ["Espagne", "Pays-Bas"],
        2006 => ["Italie", "France"],
        2002 => ["Brésil", "Allemagne"],
        1998 => ["France", "Brésil"],
        1994 => ["Brésil", "Italie"],
        1990 => ["Allemagne", "Argentine"],
        1986 => ["Argentine", "Allemagne"],
        1982 => ["Italie", "Allemagne"],
        1978 => ["Argentine", "Pays-Bas"],
        1974 => ["Allemagne", "Pays-Bas"],
        1970 => ["Brésil", "Italie"],
        1966 => ["Angleterre", "Allemagne"],
        1962 => ["Brésil", "Tchécoslovaquie"],
        1958 => ["Brésil", "Suède"],
        1954 => ["Allemagne", "Hongrie"],
        1950 => ["Uruguay", "Brésil"],
        1938 => ["Italie", "Hongrie"],
        1934 => ["Italie", "Tchécoslovaquie"],
        1930 => ["Uruguay", "Argentine"]
    ];

    $countryCodes = [
        "Argentine" => "ar",
        "France" => "fr",
        "Croatie" => "hr",
        "Allemagne" => "de",
        "Espagne" => "es",
        "Pays-Bas" => "nl",
        "Italie" => "it",
        "Brésil" => "br",
        "Angleterre" => "gb",
        "Tchécoslovaquie" => "cz",
        "Suède" => "se",
        "Hongrie" => "hu",
        "Uruguay" => "uy"
    ];

    function displayTeam($name, $codes) {
        if (isset($codes[$name])) {
            $code = $codes[$name];
            return "<div class='team'><img class='flag' src='https://flagcdn.com/w40/$code.png' alt='$name'> $name</div>";
        }
        return "<div class='team'>$name</div>";
    }

    echo '<form method="get">';
    echo '<select name="year">';
    echo '<option value="">-- Toutes les années --</option>';
    foreach (array_keys($winners) as $year) {
        $selected = (isset($_GET['year']) && $_GET['year'] == $year) ? 'selected' : '';
        echo "<option value=\"$year\" $selected>$year</option>";
    }
    echo '</select>';
    echo '<button type="submit">Filtrer</button>';
    echo '</form>';

    echo '<div class="grid">';
    if (isset($_GET['year']) && array_key_exists($_GET['year'], $winners)) {
        $year = $_GET['year'];
        $teams = $winners[$year];
        echo "<div class='winner-card'>";
        echo "<h2>$year</h2>";
        echo displayTeam($teams[0], $countryCodes);
        echo displayTeam($teams[1], $countryCodes);
        echo "</div>";
    } else {
        foreach ($winners as $year => $teams) {
            echo "<div class='winner-card'>";
            echo "<h2>$year</h2>";
            echo displayTeam($teams[0], $countryCodes);
            echo displayTeam($teams[1], $countryCodes);
            echo "</div>";
        }
    }
    echo '</div>';
    ?>
</div>

</body>
</html>
