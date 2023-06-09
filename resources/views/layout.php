<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? null ?></title>
    <link rel="shortcut icon" href="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg"
        type="image/x-icon">
    <?= vite('main.ts') ?>
    <!-- <link rel="stylesheet" href="/dist/assets/main-2383071f.css">
    <script src="/dist/assets/vendor-e9733e91.js" type="module" defer></script>
    <script src="/dist/assets/main-27ddf821.js" type="module" defer></script> -->

</head>

<body class="bg-slate-900 flex flex-col items-center h-screen">
    <?= $contenido ?>
    <?php settings("dark")?>
</body>

</html>