import{o as n,_ as u,B as a,u as l,a as d}from"./vendor-13c4a80a.js";(function(){const r=document.createElement("link").relList;if(r&&r.supports&&r.supports("modulepreload"))return;for(const e of document.querySelectorAll('link[rel="modulepreload"]'))c(e);new MutationObserver(e=>{for(const t of e)if(t.type==="childList")for(const i of t.addedNodes)i.tagName==="LINK"&&i.rel==="modulepreload"&&c(i)}).observe(document,{childList:!0,subtree:!0});function s(e){const t={};return e.integrity&&(t.integrity=e.integrity),e.referrerPolicy&&(t.referrerPolicy=e.referrerPolicy),e.crossOrigin==="use-credentials"?t.credentials="include":e.crossOrigin==="anonymous"?t.credentials="omit":t.credentials="same-origin",t}function c(e){if(e.ep)return;e.ep=!0;const t=s(e);fetch(e.href,t)}})();function f({children:o}){return n(u,{children:o})}const p=(o,r)=>{console.log(document.querySelector(o)),document.querySelector(o)&&a(n(f,{children:r}),document.querySelector(o))};async function m(o){const{data:r}=await d.get(o);return r}function y(){const{data:o,isLoading:r}=l("https://pokeapi.co/api/v2/pokemon/ditto",m);return console.log(r),n("div",{children:JSON.stringify(o)})}p("[data-component='users']",n(y,{}));