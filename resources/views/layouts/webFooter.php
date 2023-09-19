<!-- whatsapp -->
<a href=""
    class="fixed lg:bottom-5 bottom-24 right-5 lg:right-10 z-[99] bg-green-600 p-3 rounded-full w-[50px] h-[50px] flex justify-center items-center shadow">
    <i class="fa-brands fa-whatsapp text-white  text-4xl"></i>
</a>
<footer class="bg-secondary p-4">
    <div class="max-w-6xl mx-auto flex flex-wrap gap-6">
        <div class="flex flex-col gap-4 flex-1 max-w-[300px] min-w-[300px]">
            <?= component('logo2') ?>
            <div class="flex gap-4">
                <div class="p-2 px-4 border border-terciary">
                    <i class="fas fa-map-marker-alt text-secondary"></i>
                </div>
                <div class="">
                    <span class="text-secondary font-bold">Address:</span>
                    <p class="text-secondary text-sm ">1357 Monica - Elysées - Paris</p>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="p-2 px-4 border border-terciary">
                    <i class="fas fa-map-marker-alt text-secondary"></i>
                </div>
                <div class="">
                    <span class="text-secondary font-bold">Address:</span>
                    <p class="text-secondary text-sm ">1357 Monica - Elysées - Paris</p>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="p-2 px-4 border border-terciary">
                    <i class="fas fa-map-marker-alt text-secondary"></i>
                </div>
                <div class="">
                    <span class="text-secondary font-bold">Address:</span>
                    <p class="text-secondary text-sm ">1357 Monica - Elysées - Paris</p>
                </div>
            </div>
        </div>
        <div class="flex  flex-col gap-4 flex-1 max-w-[300px] min-w-[300px]">
            <span class="text-white text-lg font-bold">MY ACCOUNT</span>
            <div class="flex flex-col gap-3">
                <?php for ($i=0; $i < 6; $i++):?>
                <div class="text-secondary flex gap-2 items-center text-sm">
                    <i class="fa-solid fa-paw "></i>
                    My account
                </div>
                <?php endfor; ?>
            </div>
        </div>
        <div class="flex  flex-col gap-4 flex-1 max-w-[300px] min-w-[300px]">
            <span class="text-white text-lg font-bold">MY ACCOUNT</span>
            <div class="flex flex-col gap-3">
                <?php for ($i=0; $i < 6; $i++):?>
                <div class="text-secondary flex gap-2 items-center text-sm">
                    <i class="fa-solid fa-paw "></i>
                    My account
                </div>
                <?php endfor; ?>
            </div>
        </div>


    </div>
</footer>
<div class="mt-20 lg:hidden">
</div>