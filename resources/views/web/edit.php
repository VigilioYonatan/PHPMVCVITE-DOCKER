<form action=<?= route('users.update',["id"=>$user->id]) ?> class="w-[450px] mx-auto" method="POST">
    <?= csrf_token()?>
    <div class="mb-2">
        <label for="" class="text-sm font-bold uppercase">Nombre</label>
        <input class="w-full py-1 px-3 rounded-md" type="text" name="name" value=<?= $user->name; ?>>
        <p class="text-red-600 text-xs">this field is required</p>
    </div>
    <div class="mb-2">
        <label for="" class="text-sm font-bold uppercase">Email</label>
        <input class="w-full py-1 px-3 rounded-md" type="email" name="email" value=<?= $user->email; ?>>
        <p class="text-red-600 text-xs">this field is required</p>
    </div>
    <div class="mb-2">
        <label for="" class="text-sm font-bold uppercase">Contraseña</label>
        <input class="w-full py-1 px-3 rounded-md" type="text" name="password" value=<?= $user->password; ?>>
        <p class="text-red-600 text-xs">this field is required</p>
    </div>
    <button type="submit" class="bg-orange-600 text-white px-4 py-2 rounded-md">Editar</button>
</form>
<a href=<?= route('web.home') ?> class="text-red-600">Regresar</a>