<header class="py-6 bg-paper-dark">
    <div class="container mx-auto flex items-center justify-between px-2">
        <div class="">
            <a class="text-2xl font-bold uppercase dark:text-white" href="">Logo</a>
        </div>
        <nav class="flex items-center gap-2">
            <a class="uppercase text-xs tracking-widest  <?= pagina_actual("/") ? "text-primary" :"dark:text-white" ?>"
                href=""><span class="text-primary mr-2 dark:text-white">●</span>Home</a>
            <a class="uppercase text-xs tracking-widest dark:text-white hover:text-primary" href=""><span
                    class="text-primary mr-2">●</span>Pages</a>
            <a class="uppercase text-xs tracking-widest dark:text-white hover:text-primary" href=""><span
                    class="text-primary mr-2">●</span>Gallery</a>
        </nav>
        <div class="">
            <div class="flex gap-4 items-center">
                <p class="text-xl flex items-center gap-1 font-thin dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>

                    <span class="text-primary">+51 </span>968 650 700
                </p>
                <div class="flex gap-2 items-center">
                    <img width="30"
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/facebook/facebook-original.svg" />
                    <img width="30"
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/facebook/facebook-original.svg" />
                    <img width="30"
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/facebook/facebook-original.svg" />

                </div>
            </div>
            <p class="text-[10px] text-white mt-2 uppercase ">Atendemos 24/7 or <b
                    class="font-semibold">chiropractor@support.com</b>
            </p>
        </div>
    </div>
</header>