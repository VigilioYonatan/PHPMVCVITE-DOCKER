<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? null ?></title>

    <!-- <script type="module" crossorigin="" src="/dist/assets/main-8326e077.js"></script>
    <link rel="modulepreload" href="/dist/assets/vendor-3b3f7e48.js">
    <link rel="stylesheet" href="/dist/assets/main-ca0d722d.css">
    <link rel="modulepreload" as="script" crossorigin="" href="/dist/assets/CarouselHome-c6f2b0b5.js">
    <link rel="stylesheet" href="/dist/assets/CarouselHome-f48f1ad4.css"> -->
    <?=  vite('main.ts') ?>
</head>

<body class="bg-gray-500">
    <?= $contenido ?>

    <?php // require_once __DIR__."/../../app/config/setting.php"?>
</body>

</html>