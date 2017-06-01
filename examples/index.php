<?php require_once __DIR__ . "/../src/Chartkick.php"; ?>

<html>
    <head>
        <title>Chartkick</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chartkick/2.2.1/chartkick.min.js"></script>
        <script src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
        <?= JonahGeorge\Chartkick::lineChart([
            "2013-02-10 00:00:00 -0800" => 11,
            "2013-02-11 00:00:00 -0800" => 6,
        ]); ?>

        <?= JonahGeorge\Chartkick::lineChart("http://echo.jsontest.com/Thu%20Jun%2001%202017%2000:00:00%20GMT+0000%20(UTC)/2/Fri%20Jun%2002%202017%2000:00:00%20GMT+0000%20(UTC)/3"); ?>

        <?= JonahGeorge\Chartkick::pieChart([
          "Football" => 10, 
          "Basketball" => 5]
        ) ?>
    </body>
</html>
