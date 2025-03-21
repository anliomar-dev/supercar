import {toggleNavbar, toggleTheme, animateAndRemoveAlert, togglePassword} from "./index.js";
import { animate } from "https://cdn.jsdelivr.net/npm/motion@11.11.13/+esm"

document.addEventListener("DOMContentLoaded", () => {
    toggleNavbar();
    togglePassword();
    toggleTheme();
    const path = window.location.href.split('/');
    const currentPage = path[path.length - 1];
    document.querySelectorAll(`.${currentPage}`).forEach((element) => {
        element.classList.add("bg-primary");
        element.classList.add("text-black");
    })
});
