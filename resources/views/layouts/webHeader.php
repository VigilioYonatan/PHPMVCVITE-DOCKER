<a href="<?= route("web.home") ?>" class="text-5xl font-bold uppercase text-white my-5 text-center">PHP FRAMEWORK
    MVC</a>
<div class="flex gap-4 flex-wrap justify-center">
    <?= component("cards.cardOne",[
        "title"=>"models",
        "color"=>"bg-red-600",
        "children"=>component('icos.database')]) 
        ?>
    <?= component("cards.cardOne",[
        "title"=>"controllers",
        "color"=>"bg-yellow-600",
        "children"=>component("icos.controller")]) 
        ?>

    <?= component("cards.cardOne",[
        "title"=>"views",
        "color"=>"bg-orange-600",
        "children"=>component("icos.views")]) 
        ?>
    <?= component("cards.cardOne",[
        "title"=>"routers",
        "color"=>"bg-green-600",
        "children"=>component("icos.router")]) 
        ?>
    <?= component("cards.cardOne",[
        "title"=>"migrations",
        "color"=>"bg-gray-600",
        "children"=>component("icos.migrations")]) 
        ?>
    <?= component("cards.cardOne",[
        "title"=>"vite",
        "color"=>"bg-purple-600",
        "children"=>"<img width='60' height='60' src='https://vitejs.dev/logo-with-shadow.png' alt='vite'>"]) 
        ?>

    <?= component("cards.cardOne",[
        "title"=>"validations",
        "color"=>"bg-red-800",
        "children"=>"<p class='text-lg font-bold text-gray-300'>SOON</p>"]) 
        ?>
    <?= component("cards.cardOne",[
        "title"=>"middlewares",
        "color"=>"bg-purple-600",
        "children"=>"<p class='text-lg font-bold text-gray-300'>SOON</p>"]) 
        ?>
</div>