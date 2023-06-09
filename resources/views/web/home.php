<?php $title = "HomePage" ?>
<?php  require_once __DIR__ . "/../layouts/webHeader.php"; ?>

<?= component("extras.titlePage",[
    "color"=>"text-white",
    "title"=>$title]) 
?>
<div class=" self-start">
    <div class="vue-app">
        <hello-world />
    </div>
</div>

<?php  require_once __DIR__ . "/../layouts/webFooter.php"; ?>