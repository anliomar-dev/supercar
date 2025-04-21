import {toggleNavbar, toggleTheme, animateAndRemoveAlert, togglePassword} from "../index.js";
//import { animate } from "https://cdn.jsdelivr.net/npm/motion@11.11.13/+esm"
console.log("ok");
document.addEventListener("DOMContentLoaded", () => {
    const path = window.location.href.split('/');
    const currentPage = path[path.length - 1].split('?')[0];
    document.querySelectorAll(`.${currentPage}`).forEach((element) => {
        element.classList.add("bg-primary");
        element.classList.add("text-black");
    })
    const sectionBtn = document.querySelectorAll(".section-btn");
    const sections = document.querySelectorAll(".section");
    sectionBtn.forEach((element) => {
        element.addEventListener("click", (e) => {
           const clickedBtn = e.currentTarget;
           const sectionDataset = clickedBtn.dataset.section;
           sections.forEach((el)=> {
               if(el.classList.contains(clickedBtn.dataset.section)) {
                   el.classList.remove("hidden");
               }else{
                   el.classList.add("hidden");
               }
           })
        })
    })
});
