import { Carousel } from "react-responsive-carousel";
import { CreateRoot } from "~/utils/CreateRoot.util";
import "react-responsive-carousel/lib/styles/carousel.min.css";

function HomeBackgroundCarousel() {
    return (
        <>
            <div className="control-dots-custom ">
                <Carousel
                    autoPlay
                    infiniteLoop
                    showThumbs={false}
                    showArrows={false}
                    showStatus={false}
                >
                    <div class="h-[600px] flex items-center bg-center bg-[url('https://html.modernwebtemplates.com/chiropractor/images/intro_slide_02.jpg')]">
                        <div className="container mx-auto flex">
                            <div className="flex ml-6 items-baseline w-[400px] flex-col gap-6">
                                <p class="text-primary text-xl tracking-wider uppercase  font-bold">
                                    ASHLEE STANTON
                                </p>
                                <h2 class="text-4xl font-bold tracking-wide text-white text-start">
                                    BETTER HEALTH THROUGH
                                </h2>
                                <p class="text-white font-thin text-xl text-start">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Ducimus, id.
                                </p>
                                <button
                                    class="mt-6 text-white font-bold uppercase tracking-widest text-xs cursor-pointer hover:text-primary py-5 px-6 border-2 border-white"
                                    type="button"
                                >
                                    Make Appointement
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="h-[600px] flex items-center bg-center bg-[url('https://html.modernwebtemplates.com/chiropractor/images/intro_slide_02.jpg')]">
                        <div className="container mx-auto flex">
                            <div className="flex ml-6 items-baseline w-[400px] flex-col gap-6">
                                <p class="text-primary text-xl tracking-wider uppercase  font-bold">
                                    ASHLEE STANTON
                                </p>
                                <h2 class="text-4xl font-bold tracking-wide text-white text-start">
                                    BETTER HEALTH THROUGH
                                </h2>
                                <p class="text-white font-thin text-xl text-start">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Ducimus, id.
                                </p>
                                <button
                                    class="mt-6 text-white font-bold uppercase tracking-widest text-xs cursor-pointer hover:text-primary py-5 px-6 border-2 border-white"
                                    type="button"
                                >
                                    Make Appointement
                                </button>
                            </div>
                        </div>
                    </div>
                </Carousel>
            </div>
        </>
    );
}

CreateRoot(
    "[data-component='home-background-carousel']",
    <HomeBackgroundCarousel />
);
