<script setup lang="ts">
import { Carousel, Slide, Pagination } from "vue3-carousel";
import "vue3-carousel/dist/carousel.css";
const settings = {
    settings: {
        itemsToShow: 1,
        snapAlign: "center",
    },
    // breakpoints are mobile first
    // any settings not specified will fallback to the carousel settings
};
</script>
<template>
    <Carousel v-bind="settings" class="h-full">
        <Slide v-for="slide in 10" :key="slide">
            <img
                class="w-full h-full object-cover"
                width="1000"
                height="1000"
                src="https://niche-21.woovinafree.com/wp-content/uploads/2018/11/slider-111-04.jpg"
                alt=""
            />
        </Slide>

        <template #addons>
            <Pagination />
        </template>
    </Carousel>
</template>
<style>
.carousel {
    position: relative;
}
.carousel__pagination {
    margin: 0;
    position: absolute;
    bottom: 10px;
    left: 40%;
}
.carousel__viewport,
.carousel__track {
    height: 100%;
}
.carousel__pagination-button::after {
    width: 10px;
    height: 10px;
    border-radius: 100%;
    background-color: rgba(255, 255, 255, 0.286);
}
.carousel__pagination-button:hover::after,
.carousel__pagination-button--active::after {
    background-color: white;
}
</style>
