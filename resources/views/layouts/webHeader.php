<div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-center px-4 py-1 lg:py-2">
    <div class="">
        <p class="text-secondary text-sm">Welcome to PETSHOP Online</p>
    </div>
    <a href=<?= route('users.show',["id"=>2,"name"=>"sss"])?>>user</a>
    <div class="flex items-center gap-4">
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-phone text-secondary"></i>
            <p class="text-secondary text-sm lg:text-lg">968-650-700</p>
        </div>
        <div class="flex items-center gap-1">
            <div class="w-[45px] rounded-full h-[45px] overflow-hidden">
                <img class="w-[inherit] h-[inherit]" width="100" height="100"
                    src="https://i.natgeofe.com/n/4f5aaece-3300-41a4-b2a8-ed2708a0a27c/domestic-dog_thumb_square.jpg"
                    alt="">
            </div>
            <span class="text-xs font-semibold text-secondary">Yonatan</span>
        </div>

    </div>
</div>
<hr>
<header class="shadow sticky z-[99] top-0 bg-white">
    <div class="max-w-6xl mx-auto flex justify-between px-4 py-4 items-center gap-3 flex-wrap" x-data="{isOpen:false}">
        <a href="">
            <?= component("logo") ?>
        </a>
        <button class="flex items-center lg:hidden" aria-label="button to open modal" @click="isOpen=!isOpen">
            <i x-show="!isOpen" class="fa-solid fa-bars text-secondary text-3xl"></i>
            <i x-show="isOpen" class="fa-solid fa-times text-secondary text-3xl"></i>
        </button>
        <nav class="flex lg:gap-6 items-center flex-col lg:flex-row w-full lg:w-auto overflow-hidden delay-custom-1"
            :class="isOpen ? 'max-h-[250px] lg:max-h-none' : 'max-h-0  lg:max-h-none'">
            <a href=""
                class="text-sm tracking-wide font-bold uppercase text-secondary hover:text-white delay-custom-1 py-2 w-full text-center hover:bg-primary lg:hover:bg-transparent lg:hover:text-primary">Home</a>
            <a href=""
                class="text-sm tracking-wide font-bold uppercase text-secondary hover:text-white delay-custom-1 py-2 w-full text-center hover:bg-primary  lg:hover:bg-transparent lg:hover:text-primary">Home</a>
            <a href=""
                class="text-sm tracking-wide font-bold uppercase text-secondary hover:text-white delay-custom-1 py-2 w-full text-center hover:bg-primary  lg:hover:bg-transparent lg:hover:text-primary">Home</a>
            <a href=""
                class="text-sm tracking-wide font-bold uppercase text-secondary hover:text-white delay-custom-1 py-2 w-full text-center hover:bg-primary  lg:hover:bg-transparent lg:hover:text-primary">Home</a>
        </nav>
        <div
            class="fixed lg:static bg-white bottom-0 z-[99]  right-0 left-0  justify-between flex items-center gap-4 py-4 border-b-2 lg:border-b-0">
            <button class="flex-1 flex flex-col items-center justify-center gap-1 lg:hidden" type="button">
                <i class="fa-solid fa-home text-secondary hover:text-primary delay-custom-1"></i>
                <span class="text-xs text-secondary lg:hidden">Home</span>
            </button>
            <button class="flex-1 flex flex-col items-center justify-center gap-1" type="button">
                <i class="fa-solid fa-heart text-secondary hover:text-primary delay-custom-1"></i>
                <span class="text-xs text-secondary lg:hidden">Favorites</span>
            </button>
            <button class="flex-1 flex flex-col items-center justify-center gap-1" type="button">
                <i class="fa-solid fa-cart-shopping text-secondary hover:text-primary delay-custom-1"></i>
                <span class="text-xs text-secondary lg:hidden">Cart</span>
            </button>
            <button class="flex-1 flex flex-col items-center justify-center gap-1" type="button">
                <i class="fa-solid fa-magnifying-glass text-secondary hover:text-primary delay-custom-1"></i>
                <span class="text-xs text-secondary lg:hidden">Search</span>
            </button>

        </div>
    </div>
</header>