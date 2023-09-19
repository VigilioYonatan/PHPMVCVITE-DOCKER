<?php  require_once __DIR__ . "/../layouts/webHeader.php"; ?>
<section class="flex flex-col lg:flex-row max-w-6xl mx-auto bg-[#F1F1F1] mb-6">
    <div class="w-full lg:w-[350px]" x-data="{isOpen:false}">
        <button class="w-full flex justify-center gap-4 items-center py-3 bg-primary  px-4"
            aria-label="button to open categories" @click="isOpen=!isOpen">
            <i class="fa-solid fa-bars text-white"></i>
            <span class="text-white font-bold text-sm lg:text-lg">CATEGORIES</span>
        </button>
        <div class="overflow-auto lg:max-h-[355px] delay-custom-1"
            :class="isOpen ? 'max-h-[130px] lg:max-h-none' : 'max-h-0  lg:max-h-none'">
            <?php for ($i=0; $i < 12; $i++):?>
            <a href="" class="py-2 px-4 flex gap-2 items-center text-secondary hover:text-primary delay-custom-1">
                <i class="fa-solid fa-paw"></i>
                <p class="text-sm ">Accessories</p>
            </a>
            <hr>
            <?php endfor; ?>
        </div>
    </div>
    <div class="vue-app w-full h-full">
        <carousel-home />
    </div>
</section>
<section class="py-6 px-2 max-w-6xl mx-auto flex justify-center">
    <div class="flex flex-col justify-center items-center gap-6">
        <div class="flex justify-center items-center flex-col gap-2 relative">
            <span class="text-secondary font-bold text-xl"> HOT DEALS</span>
            <div class="h-[1px] w-[140%] bg-gray-200 absolute bottom-4 z-[-9]"></div>
            <div
                class="relative border-2 border-primary rounded-full  w-[30px] h-[30px] flex justify-center items-center bg-white">

                <i class="fa-solid fa-paw text-primary"></i>
            </div>
        </div>
        <div class="flex flex-wrap gap-4 justify-center">
            <?php for ($i=0; $i < 8; $i++): ?>
            <div
                class="border max-w-[180px] min-w-[160px] sm:max-w-[200px] sm:min-w-[180px] lg:max-w-[250px] lg:min-w-[280px] flex-1 group">
                <picture class="w-full relative">
                    <img class="w-full" width="300" height="300"
                        src="https://niche-21.woovinafree.com/wp-content/uploads/2018/01/cute-cat-300x300.jpg" alt="">
                    <div
                        class="absolute group-hover:opacity-100 opacity-0 bg-black bg-opacity-20 delay-custom-1 top-0 left-0 right-0 bottom-0">
                        <div class="absolute bottom-0 left-0  flex flex-col gap-1">
                            <button type="button" class="px-2 py-1 bg-black text-white">
                                <i class="fa-solid fa-cart-shopping text-xs"></i>
                            </button>
                            <button type="button" class="py-1 px-2 bg-black text-white">
                                <i class="fa-solid fa-heart text-xs"></i>
                            </button>
                            <button type="button" class="py-1 px-2 bg-black text-white">
                                <i class="fa-solid fa-magnifying-glass-plus text-xs"></i>
                            </button>
                        </div>
                    </div>
                </picture>
                <div class="p-4 flex flex-col items-center border-t gap-1">
                    <span class="text-xs text-secondary">Cat</span>
                    <p class="text-sm font-semibold lg:text-md text-center ">Hairless Sphynx Cat Is Native To Canada</p>
                    <span class="text-primary text-xl">$155.00</span>
                </div>
            </div>
            <?php endfor; ?>
        </div>
</section>
<section class="max-w-6xl mx-auto flex flex-col md:flex-row gap-4 flex-wrap px-4">
    <div data-aos="fade-right"
        class=" flex flex-col flex-1 group overflow-hidden  gap-3  justify-center md:h-[200px] items-center">
        <div class="relative h-full w-full flex flex-col justify-center gap-2 p-6 group-hover:scale-105 delay-custom-1">
            <img class="absolute top-0 left-0 right-0 bottom-0 h-full w-full  -z-10 group-hover:scale-110 delay-custom-1 object-cover"
                src="https://niche-21.woovinafree.com/wp-content/uploads/2018/11/petshop_home4.jpg" alt="">
            <span class="text-white font-bold text-2xl">DOG
                TRANING 2</span>
            <p class="text-white">UP TO SALE 40% OFF</p>
            <a href="" class="text-white">View details</a>
        </div>
    </div>
    <div data-aos="fade-left"
        class=" flex flex-col flex-1 group overflow-hidden  gap-3  justify-center md:h-[200px] items-center">
        <div class="relative h-full w-full flex flex-col justify-center gap-2 p-6 group-hover:scale-105 delay-custom-1">
            <img class="absolute top-0 left-0 right-0 bottom-0 h-full w-full  -z-10 group-hover:scale-110 delay-custom-1 object-cover"
                src="https://niche-21.woovinafree.com/wp-content/uploads/2018/11/petshop_home4.jpg" alt="">
            <span class="text-white font-bold text-2xl">DOG
                TRANING</span>
            <p class="text-white">UP TO SALE 40% OFF</p>
            <a href="" class="text-white">View details</a>
        </div>
    </div>
</section>
<!--  -->
<section class="py-6 px-2 max-w-6xl mx-auto flex justify-center">
    <div class="flex flex-col justify-center items-center gap-6">
        <div class="flex justify-center items-center flex-col gap-2 relative">
            <span class="text-secondary font-bold text-xl">NEW ARRIVALS</span>
            <div class="h-[1px] w-[140%] bg-gray-200 absolute bottom-4 z-[-9]"></div>
            <div
                class="relative border-2 border-primary rounded-full  w-[30px] h-[30px] flex justify-center items-center bg-white">
                <i class="fa-solid fa-paw text-primary"></i>

            </div>
        </div>
        <div class="flex flex-wrap gap-4 justify-center">
            <?php for ($i=0; $i < 8; $i++): ?>
            <div
                class="border max-w-[180px] min-w-[160px] sm:max-w-[200px] sm:min-w-[180px] lg:max-w-[250px] lg:min-w-[280px] flex-1 group">
                <picture class="w-full relative">
                    <img class="w-full" width="300" height="300"
                        src="https://niche-21.woovinafree.com/wp-content/uploads/2018/01/cute-cat-300x300.jpg" alt="">
                    <div
                        class="absolute group-hover:opacity-100 opacity-0 bg-black bg-opacity-20 delay-custom-1 top-0 left-0 right-0 bottom-0">
                        <div class="absolute bottom-0 left-0  flex flex-col gap-1">
                            <button type="button" class="px-2 py-1 bg-black text-white">
                                <i class="fa-solid fa-cart-shopping text-xs"></i>
                            </button>
                            <button type="button" class="py-1 px-2 bg-black text-white">
                                <i class="fa-solid fa-heart text-xs"></i>
                            </button>
                            <button type="button" class="py-1 px-2 bg-black text-white">
                                <i class="fa-solid fa-magnifying-glass-plus text-xs"></i>
                            </button>
                        </div>
                    </div>
                </picture>
                <div class="p-4 flex flex-col items-center border-t gap-1">
                    <span class="text-xs text-secondary">Cat</span>
                    <p class="text-sm font-semibold lg:text-md text-center ">Hairless Sphynx Cat Is Native To Canada</p>
                    <span class="text-primary text-xl">$155.00</span>
                </div>
            </div>
            <?php endfor; ?>
        </div>
</section>

<?php  require_once __DIR__ . "/../layouts/webFooter.php"; ?>