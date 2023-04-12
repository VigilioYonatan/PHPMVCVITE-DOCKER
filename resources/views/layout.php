<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= vite('main.ts') ?>
    <title><?= $title ?? 'Home'; ?></title>
</head>

<body class=" bg-background-light">
    <?= $contenido ?>
</body>

</html>