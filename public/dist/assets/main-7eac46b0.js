import{B as h,o as e,_ as m,a as f,F as c,b as x,s as l,c as g,u as b,d as w,t as y,j as L}from"./vendor-6ae10299.js";(function(){const n=document.createElement("link").relList;if(n&&n.supports&&n.supports("modulepreload"))return;for(const t of document.querySelectorAll('link[rel="modulepreload"]'))a(t);new MutationObserver(t=>{for(const o of t)if(o.type==="childList")for(const s of o.addedNodes)s.tagName==="LINK"&&s.rel==="modulepreload"&&a(s)}).observe(document,{childList:!0,subtree:!0});function i(t){const o={};return t.integrity&&(o.integrity=t.integrity),t.referrerPolicy&&(o.referrerPolicy=t.referrerPolicy),t.crossOrigin==="use-credentials"?o.credentials="include":t.crossOrigin==="anonymous"?o.credentials="omit":o.credentials="same-origin",o}function a(t){if(t.ep)return;t.ep=!0;const o=i(t);fetch(t.href,o)}})();const p=(r,n)=>{console.log(document.querySelector(r)),document.querySelector(r)&&h(n,document.querySelector(r))};function A({isLoading:r,onSubmit:n,children:i}){return e("form",{onSubmit:n,noValidate:!0,children:[i,e("button",{className:"bg-primary hover:bg-opacity-70 py-2  px-4 flex items-center mx-auto rounded-lg font-bold uppercase text-white",children:r?"Cargando...":e(m,{children:[e(f,{className:"mr-2 w-5 h-5"}),"Agregar"]})})]})}function d(r){return e(c,{...r,className:"relative w-full mb-3",children:[e(c.label,{className:"block uppercase text-grayHard dark:text-white text-xs font-bold mb-2"}),e(c.control,{className:"border-0 px-3 py-3 dark:text-white bg-background-light dark:bg-background-dark  rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"}),e(c.error,{className:"text-red-600 text-xs mt-1"})]})}const N=x({email:l(),password:l()}),u={email:{type:"email",name:"email",title:"correo electrónico",placeholder:"tu email"},password:{type:"password",name:"password",title:"contraseña",placeholder:"tu contraseña"}},T=g.create({baseURL:"http://localhost:4000/api"});async function k(r,n){const{data:i}=await T.post(r,n);return i}function v(){return{loginAuth:()=>b("/auth/login",k)}}function S(){const{control:r,handleSubmit:n}=w({resolver:y(N)}),{data:i,mutate:a,isLoading:t}=v().loginAuth();function o(s){a(s)}return e(A,{isLoading:t||!1,onSubmit:n(o),children:[e(d,{control:r,...u.email}),e(d,{control:r,...u.password})]})}p("[data-component='auth-login']",e(S,{}));function E(){return e(m,{children:e("div",{className:"control-dots-custom ",children:e(L.Carousel,{autoPlay:!0,infiniteLoop:!0,showThumbs:!1,showArrows:!1,showStatus:!1,children:[e("div",{class:"h-[600px] flex items-center bg-center bg-[url('https://html.modernwebtemplates.com/chiropractor/images/intro_slide_02.jpg')]",children:e("div",{className:"container mx-auto flex",children:e("div",{className:"flex ml-6 items-baseline w-[400px] flex-col gap-6",children:[e("p",{class:"text-primary text-xl tracking-wider uppercase  font-bold",children:"ASHLEE STANTON"}),e("h2",{class:"text-4xl font-bold tracking-wide text-white text-start",children:"BETTER HEALTH THROUGH"}),e("p",{class:"text-white font-thin text-xl text-start",children:"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, id."}),e("button",{class:"mt-6 text-white font-bold uppercase tracking-widest text-xs cursor-pointer hover:text-primary py-5 px-6 border-2 border-white",type:"button",children:"Make Appointement"})]})})}),e("div",{class:"h-[600px] flex items-center bg-center bg-[url('https://html.modernwebtemplates.com/chiropractor/images/intro_slide_02.jpg')]",children:e("div",{className:"container mx-auto flex",children:e("div",{className:"flex ml-6 items-baseline w-[400px] flex-col gap-6",children:[e("p",{class:"text-primary text-xl tracking-wider uppercase  font-bold",children:"ASHLEE STANTON"}),e("h2",{class:"text-4xl font-bold tracking-wide text-white text-start",children:"BETTER HEALTH THROUGH"}),e("p",{class:"text-white font-thin text-xl text-start",children:"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, id."}),e("button",{class:"mt-6 text-white font-bold uppercase tracking-widest text-xs cursor-pointer hover:text-primary py-5 px-6 border-2 border-white",type:"button",children:"Make Appointement"})]})})})]})})})}p("[data-component='home-background-carousel']",e(E,{}));
