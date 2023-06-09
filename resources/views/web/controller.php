<?php $title = "Controllers" ?>
<?php  require_once __DIR__ . "/../layouts/webHeader.php"; ?>
<?= component("extras.titlePage",[
    "color"=>"text-yellow-600",
    "title"=>$title
]) ?>
<?= route('web.home'); ?>

<?php  require_once __DIR__ . "/../layouts/webFooter.php"; ?>