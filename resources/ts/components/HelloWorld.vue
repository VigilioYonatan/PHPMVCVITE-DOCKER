<script lang="ts" setup>
import { ref } from "vue";

const num = ref(0);
</script>
<template>
    <div class="flex justify-center items-center flex-col gap-3 mx-4">
        <p class="text-2xl font-bold uppercase text-white">
            Hello World IN VUE
        </p>
        <div class="flex items-center gap-4">
            <img
                width="50"
                height="50"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/1200px-Vue.js_Logo_2.svg.png"
                alt="vue"
            />
            <img
                width="50"
                height="50"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Typescript_logo_2020.svg/1200px-Typescript_logo_2020.svg.png"
                alt="typescript"
            />
        </div>
    </div>
    <div class="flex items-center gap-4 justify-center mt-5 text-white">
        <button
            class="bg-red-600 text-white px-5 rounded-md"
            type="button"
            @click="num++"
        >
            -
        </button>
        {{ num }}
        <button
            class="bg-green-600 text-white px-5 rounded-md"
            type="button"
            @click="num++"
        >
            +
        </button>
    </div>
</template>
