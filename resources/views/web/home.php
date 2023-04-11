<?php require_once __DIR__ . "/../layouts/webLayout.php"; ?>

<h1 class="text-red-600 font-bold">Hola mundo</h1>
<div class="">
    <?php foreach($users as $user): ?>
    <div class="">
        <p><?= $user->nombre;?></p>
    </div>
    <?php endforeach; ?>
</div>
<div data-component="users">

</div>
<?php require_once __DIR__ . "/../layouts/webFooter.php"; ?>