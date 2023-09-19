import{a as V,r as s,b as j,p as w,o as ke,n as Ce,e as je,f as pe,w as K,g as me,h as y,i as h,F as we,j as ge,k as Oe,l as Q,q as he,u as Z,s as Me,t as Ne,v as Ee,x as De}from"./vendor-3b3f7e48.js";/**
 * Vue 3 Carousel 0.3.1
 * (c) 2023
 * @license MIT
 */const d={itemsToShow:1,itemsToScroll:1,modelValue:0,transition:300,autoplay:0,snapAlign:"center",wrapAround:!1,throttle:16,pauseAutoplayOnHover:!1,mouseDrag:!0,touchDrag:!0,dir:"ltr",breakpoints:void 0,i18n:{ariaNextSlide:"Navigate to next slide",ariaPreviousSlide:"Navigate to previous slide",ariaNavigateToSlide:"Navigate to slide {slideNumber}",ariaGallery:"Gallery",itemXofY:"Item {currentSlide} of {slidesCount}",iconArrowUp:"Arrow pointing upwards",iconArrowDown:"Arrow pointing downwards",iconArrowRight:"Arrow pointing to the right",iconArrowLeft:"Arrow pointing to the left"}},Se={itemsToShow:{default:d.itemsToShow,type:Number},itemsToScroll:{default:d.itemsToScroll,type:Number},wrapAround:{default:d.wrapAround,type:Boolean},throttle:{default:d.throttle,type:Number},snapAlign:{default:d.snapAlign,validator(e){return["start","end","center","center-even","center-odd"].includes(e)}},transition:{default:d.transition,type:Number},breakpoints:{default:d.breakpoints,type:Object},autoplay:{default:d.autoplay,type:Number},pauseAutoplayOnHover:{default:d.pauseAutoplayOnHover,type:Boolean},modelValue:{default:void 0,type:Number},mouseDrag:{default:d.mouseDrag,type:Boolean},touchDrag:{default:d.touchDrag,type:Boolean},dir:{default:d.dir,validator(e){return["rtl","ltr"].includes(e)}},i18n:{default:d.i18n,type:Object},settings:{default(){return{}},type:Object}};function Ie({config:e,slidesCount:n}){const{snapAlign:a,wrapAround:l,itemsToShow:r=1}=e;if(l)return Math.max(n-1,0);let o;switch(a){case"start":o=n-r;break;case"end":o=n-1;break;case"center":case"center-odd":o=n-Math.ceil((r-.5)/2);break;case"center-even":o=n-Math.ceil(r/2);break;default:o=0;break}return Math.max(o,0)}function Le({config:e,slidesCount:n}){const{wrapAround:a,snapAlign:l,itemsToShow:r=1}=e;let o=0;if(a||r>n)return o;switch(l){case"start":o=0;break;case"end":o=r-1;break;case"center":case"center-odd":o=Math.floor((r-1)/2);break;case"center-even":o=Math.floor((r-2)/2);break;default:o=0;break}return o}function ee({val:e,max:n,min:a}){return n<a?e:Math.min(Math.max(e,a),n)}function Be({config:e,currentSlide:n,slidesCount:a}){const{snapAlign:l,wrapAround:r,itemsToShow:o=1}=e;let m=n;switch(l){case"center":case"center-odd":m-=(o-1)/2;break;case"center-even":m-=(o-2)/2;break;case"end":m-=o-1;break}return r?m:ee({val:m,max:a-o,min:0})}function ye(e){return e?e.reduce((n,a)=>{var l;return a.type===we?[...n,...ye(a.children)]:((l=a.type)===null||l===void 0?void 0:l.name)==="CarouselSlide"?[...n,a]:n},[]):[]}function P({val:e,max:n,min:a=0}){return e>n?P({val:e-(n+1),max:n,min:a}):e<a?P({val:e+(n+1),max:n,min:a}):e}function Pe(e,n){let a;return n?function(...l){const r=this;a||(e.apply(r,l),a=!0,setTimeout(()=>a=!1,n))}:e}function Ve(e,n){let a;return function(...l){a&&clearTimeout(a),a=setTimeout(()=>{e(...l),a=null},n)}}function xe(e="",n={}){return Object.entries(n).reduce((a,[l,r])=>a.replace(`{${l}}`,String(r)),e)}var Re=V({name:"ARIA",setup(){const e=h("config",j(Object.assign({},d))),n=h("currentSlide",s(0)),a=h("slidesCount",s(0));return()=>y("div",{class:["carousel__liveregion","carousel__sr-only"],"aria-live":"polite","aria-atomic":"true"},xe(e.i18n.itemXofY,{currentSlide:n.value+1,slidesCount:a.value}))}}),Xe=V({name:"Carousel",props:Se,setup(e,{slots:n,emit:a,expose:l}){var r;const o=s(null),m=s([]),v=s(0),p=s(0),i=j(Object.assign({},d));let S=Object.assign({},d),x;const c=s((r=e.modelValue)!==null&&r!==void 0?r:0),R=s(0),te=s(0),k=s(0),O=s(0);let C,X;w("config",i),w("slidesCount",p),w("currentSlide",c),w("maxSlide",k),w("minSlide",O),w("slideWidth",v);function $(){x=Object.assign({},e.breakpoints),S=Object.assign(Object.assign(Object.assign({},S),e),{i18n:Object.assign(Object.assign({},S.i18n),e.i18n),breakpoints:void 0}),ne(S)}function E(){if(!x||!Object.keys(x).length)return;const t=Object.keys(x).map(u=>Number(u)).sort((u,b)=>+b-+u);let f=Object.assign({},S);t.some(u=>{const b=window.matchMedia(`(min-width: ${u}px)`).matches;return b&&(f=Object.assign(Object.assign({},f),x[u])),b}),ne(f)}function ne(t){Object.entries(t).forEach(([f,u])=>i[f]=u)}const ae=Ve(()=>{E(),M()},16);function M(){if(!o.value)return;const t=o.value.getBoundingClientRect();v.value=t.width/i.itemsToShow}function H(){p.value<=0||(te.value=Math.ceil((p.value-1)/2),k.value=Ie({config:i,slidesCount:p.value}),O.value=Le({config:i,slidesCount:p.value}),i.wrapAround||(c.value=ee({val:c.value,max:k.value,min:O.value})))}ke(()=>{Ce(()=>M()),setTimeout(()=>M(),1e3),E(),le(),window.addEventListener("resize",ae,{passive:!0}),a("init")}),je(()=>{X&&clearTimeout(X),C&&clearInterval(C),window.removeEventListener("resize",ae,{passive:!0})});let g=!1;const D={x:0,y:0},I={x:0,y:0},_=j({x:0,y:0}),L=s(!1),Y=s(!1),_e=()=>{L.value=!0},Ae=()=>{L.value=!1};function ie(t){["INPUT","TEXTAREA","SELECT"].includes(t.target.tagName)||(g=t.type==="touchstart",g||t.preventDefault(),!(!g&&t.button!==0||A.value)&&(D.x=g?t.touches[0].clientX:t.clientX,D.y=g?t.touches[0].clientY:t.clientY,document.addEventListener(g?"touchmove":"mousemove",oe,!0),document.addEventListener(g?"touchend":"mouseup",re,!0)))}const oe=Pe(t=>{Y.value=!0,I.x=g?t.touches[0].clientX:t.clientX,I.y=g?t.touches[0].clientY:t.clientY;const f=I.x-D.x,u=I.y-D.y;_.y=u,_.x=f},i.throttle);function re(){const t=i.dir==="rtl"?-1:1,f=Math.sign(_.x)*.4,u=Math.round(_.x/v.value+f)*t;if(u&&!g){const b=F=>{F.stopPropagation(),window.removeEventListener("click",b,!0)};window.addEventListener("click",b,!0)}T(c.value-u),_.x=0,_.y=0,Y.value=!1,document.removeEventListener(g?"touchmove":"mousemove",oe,!0),document.removeEventListener(g?"touchend":"mouseup",re,!0)}function le(){!i.autoplay||i.autoplay<=0||(C=setInterval(()=>{i.pauseAutoplayOnHover&&L.value||B()},i.autoplay))}function se(){C&&(clearInterval(C),C=null),le()}const A=s(!1);function T(t){const f=i.wrapAround?t:ee({val:t,max:k.value,min:O.value});c.value===f||A.value||(a("slide-start",{slidingToIndex:t,currentSlideIndex:c.value,prevSlideIndex:R.value,slidesCount:p.value}),A.value=!0,R.value=c.value,c.value=f,X=setTimeout(()=>{if(i.wrapAround){const u=P({val:f,max:k.value,min:0});u!==c.value&&(c.value=u,a("loop",{currentSlideIndex:c.value,slidingToIndex:t}))}a("update:modelValue",c.value),a("slide-end",{currentSlideIndex:c.value,prevSlideIndex:R.value,slidesCount:p.value}),A.value=!1,se()},i.transition))}function B(){T(c.value+i.itemsToScroll)}function U(){T(c.value-i.itemsToScroll)}const ue={slideTo:T,next:B,prev:U};w("nav",ue),w("isSliding",A);const ce=pe(()=>Be({config:i,currentSlide:c.value,slidesCount:p.value}));w("slidesToScroll",ce);const Te=pe(()=>{const t=i.dir==="rtl"?-1:1,f=ce.value*v.value*t;return{transform:`translateX(${_.x-f}px)`,transition:`${A.value?i.transition:0}ms`,margin:i.wrapAround?`0 -${p.value*v.value}px`:"",width:"100%"}});function de(){$(),E(),H(),M(),se()}Object.keys(Se).forEach(t=>{["modelValue"].includes(t)||K(()=>e[t],de)}),K(()=>e.modelValue,t=>{t!==c.value&&T(Number(t))}),K(p,H),a("before-init"),$();const ve={config:i,slidesCount:p,slideWidth:v,next:B,prev:U,slideTo:T,currentSlide:c,maxSlide:k,minSlide:O,middleSlide:te};l({updateBreakpointsConfigs:E,updateSlidesData:H,updateSlideWidth:M,initDefaultConfigs:$,restartCarousel:de,slideTo:T,next:B,prev:U,nav:ue,data:ve});const W=n.default||n.slides,z=n.addons,fe=j(ve);return()=>{const t=ye(W==null?void 0:W(fe)),f=(z==null?void 0:z(fe))||[];t.forEach((G,q)=>G.props.index=q);let u=t;if(i.wrapAround){const G=t.map((J,N)=>me(J,{index:-t.length+N,isClone:!0,key:`clone-before-${N}`})),q=t.map((J,N)=>me(J,{index:t.length+N,isClone:!0,key:`clone-after-${N}`}));u=[...G,...t,...q]}m.value=t,p.value=Math.max(t.length,1);const b=y("ol",{class:"carousel__track",style:Te.value,onMousedownCapture:i.mouseDrag?ie:null,onTouchstartPassiveCapture:i.touchDrag?ie:null},u),F=y("div",{class:"carousel__viewport"},b);return y("section",{ref:o,class:{carousel:!0,"is-sliding":A.value,"is-dragging":Y.value,"is-hover":L.value,"carousel--rtl":i.dir==="rtl"},dir:i.dir,"aria-label":i.i18n.ariaGallery,tabindex:"0",onMouseenter:_e,onMouseleave:Ae},[F,f,y(Re)])}}}),be;(function(e){e.arrowUp="arrowUp",e.arrowDown="arrowDown",e.arrowRight="arrowRight",e.arrowLeft="arrowLeft"})(be||(be={}));const $e=()=>{const e=h("config",j(Object.assign({},d))),n=h("maxSlide",s(1)),a=h("minSlide",s(1)),l=h("currentSlide",s(1)),r=h("nav",{}),o=v=>P({val:l.value,max:n.value,min:0})===v,m=[];for(let v=a.value;v<n.value+1;v++){const p=y("button",{type:"button",class:{"carousel__pagination-button":!0,"carousel__pagination-button--active":o(v)},"aria-label":xe(e.i18n.ariaNavigateToSlide,{slideNumber:v+1}),onClick:()=>r.slideTo(v)}),i=y("li",{class:"carousel__pagination-item",key:v},p);m.push(i)}return y("ol",{class:"carousel__pagination"},m)};var He=V({name:"CarouselSlide",props:{index:{type:Number,default:1},isClone:{type:Boolean,default:!1}},setup(e,{slots:n}){const a=h("config",j(Object.assign({},d))),l=h("currentSlide",s(0)),r=h("slidesToScroll",s(0)),o=h("isSliding",s(!1)),m=()=>e.index===l.value,v=()=>e.index===l.value-1,p=()=>e.index===l.value+1,i=()=>{const S=Math.floor(r.value),x=Math.ceil(r.value+a.itemsToShow-1);return e.index>=S&&e.index<=x};return()=>{var S;return y("li",{style:{width:`${100/a.itemsToShow}%`},class:{carousel__slide:!0,"carousel__slide--clone":e.isClone,"carousel__slide--visible":i(),"carousel__slide--active":m(),"carousel__slide--prev":v(),"carousel__slide--next":p(),"carousel__slide--sliding":o.value},"aria-hidden":!i()},(S=n.default)===null||S===void 0?void 0:S.call(n))}}});const Ye=De("img",{class:"w-full h-full object-cover",width:"1000",height:"1000",src:"https://niche-21.woovinafree.com/wp-content/uploads/2018/11/slider-111-04.jpg",alt:""},null,-1),We=V({__name:"CarouselHome",setup(e){const n={settings:{itemsToShow:1,snapAlign:"center"}};return(a,l)=>(ge(),Oe(Z(Xe),Ee(n,{class:"h-full"}),{addons:Q(()=>[he(Z($e))]),default:Q(()=>[(ge(),Me(we,null,Ne(10,r=>he(Z(He),{key:r},{default:Q(()=>[Ye]),_:2},1024)),64))]),_:1},16))}});export{We as default};
