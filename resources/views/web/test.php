<div class="max-w-6xl mx-auto">
    <form enctype="multipart/form-data" action=<?= route("users.store")?> method="POST" class="w-[550px] mx-auto">
        <?= csrf_token(); ?>
        <div class="mb-2">
            <label for="" class="text-xs font-bold uppercase">Nombre</label>
            <input class="w-full py-1.5 px-4 rounded-md" type="text" value="<?= old('name'); ?>" name="name"
                placeholder="tu nombre">
            <?php if(error("name")): ?>
            <p class="text-xs text-red-400"><?= error("name"); ?></p>
            <?php endif; ?>
        </div>
        <div class="mb-2">
            <label for="" class="text-xs font-bold uppercase">email</label>
            <input class="w-full py-1.5 px-4 rounded-md" type="email" value="<?= old('email'); ?>" name="email"
                placeholder="tu nombre">
            <?php if(error("email")): ?>
            <p class="text-xs text-red-400"><?= error("email"); ?></p>
            <?php endif; ?>
        </div>
        <div class="mb-2">
            <label for="" class="text-xs font-bold uppercase">Contraseña</label>
            <input class="w-full py-1.5 px-4 rounded-md" type="password" name="password" placeholder="tu nombre">
            <?php if(error("password")): ?>
            <p class="text-xs text-red-400"><?= error("password"); ?></p>
            <?php endif; ?>
        </div>
        <div class="mb-2">
            <label for="" class="text-xs font-bold uppercase">Contraseña</label>
            <input class="w-full py-1.5 px-4 rounded-md" multiple type="file" name="images[]">
            <?php if(error("images")): ?>
            <p class="text-xs text-red-400"><?= error("images"); ?></p>
            <?php endif; ?>
        </div>

        <button type="submit" class="bg-green-600 px-5 py-2 text-white rounded-md font-bold">Enviar</button>
    </form>
</div>
<div class="flex items-center flex-wrap gap-2 justify-center">

    <?php foreach ($users as $key => $user):
    ?>
    <a href=<?= route('users.show',["id"=>$user->id]) ?> class="bg-black bg-opacity-70 p-2 rounded-md text-white">
        <div class="">
            <span>ID: <b><?= $user->id; ?></b></span>
            <span>Nombre: <b><?= $user->name; ?></b></span>
        </div>
    </a>
    <?php endforeach; ?>
</div>