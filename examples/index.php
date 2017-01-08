<?php require_once __DIR__ . "/../chartkick.php"; ?>

<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chartkick/2.2.1/chartkick.min.js"></script>
        <script src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
        <?php echo JonahGeorge\Chartkick\Chartkick::lineChart([
            "2013-02-10 00:00:00 -0800" => 11,
            "2013-02-11 00:00:00 -0800" => 6,
        ]); ?>
    </body>
</html>
