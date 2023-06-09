    <a href="<?= route("web.{$title}"); ?>"
        class="shadow flex  justify-center flex-col items-center gap-1 <?= $color; ?> w-[200px] text-white p-4 rounded-md uppercase text-2xl font-bold ">
        <?= $title; ?>
        <?=  $children ?? null;?>
    </a>