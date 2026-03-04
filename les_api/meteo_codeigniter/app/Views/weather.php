<!-- 
 <h1>Météo</h1>
<p>Température : <?= $weather['main']['temp']; ?>°C</p>
-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Météo à <?= esc($weather['name']) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            transition: background 0.5s ease;
        }

        .card {
            background: rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width: 300px;
        }

        .temp {
            font-size: 3em;
            margin: 10px 0;
        }

        .desc {
            font-size: 1.2em;
            margin-bottom: 10px;
            text-transform: capitalize;
        }

        .info {
            font-size: 0.9em;
            opacity: 0.9;
        }

        img {
            width: 100px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: white;
            text-decoration: none;
            font-size: 0.9em;
            opacity: 0.8;
        }

        a:hover {
            opacity: 1;
        }
    </style>
</head>
<body>

<?php if (isset($weather['cod']) && $weather['cod'] == 200): ?>

    <?php
        $temp = round($weather['main']['temp']);
        $desc = $weather['weather'][0]['description'];
        $humidity = $weather['main']['humidity'];
        $icon = $weather['weather'][0]['icon'];
        $city = $weather['name'];

        // Fond dynamique
        $bg = "#4a90e2"; // défaut bleu
        if (str_contains($icon, "n")) $bg = "#2c3e50"; // nuit
        elseif (str_starts_with($icon, "01")) $bg = "#f39c12"; // soleil
        elseif (str_starts_with($icon, "02") || str_starts_with($icon, "03") || str_starts_with($icon, "04")) $bg = "#95a5a6"; // nuages
        elseif (str_starts_with($icon, "09") || str_starts_with($icon, "10")) $bg = "#3498db"; // pluie
        elseif (str_starts_with($icon, "11")) $bg = "#34495e"; // orage
        elseif (str_starts_with($icon, "13")) $bg = "#ecf0f1"; // neige
    ?>

    <script>
        document.body.style.background = "<?= $bg ?>";
    </script>

    <div class="card">
        <h2><?= esc($city) ?></h2>

        <img src="https://openweathermap.org/img/wn/<?= esc($icon) ?>@2x.png"
             alt="<?= esc($desc) ?>">

        <div class="temp"><?= $temp ?>°C</div>
        <div class="desc"><?= esc($desc) ?></div>

        <div class="info">
            Humidité : <?= esc($humidity) ?>%
        </div>

        <a href="<?= site_url('weather') ?>">Actualiser</a>
    </div>

<?php else: ?>

    <script>
        document.body.style.background = "#7f8c8d";
    </script>

    <div class="card">
        <h2>Erreur</h2>
        <p>Impossible de récupérer la météo.</p>
        <a href="<?= site_url('weather') ?>">Réessayer</a>
    </div>

<?php endif; ?>

</body>
</html>