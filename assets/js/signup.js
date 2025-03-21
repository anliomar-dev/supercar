import {toggleNavbar, togglePassword, toggleTheme, animateAndRemoveAlert} from "./index.js";

document.addEventListener("DOMContentLoaded", () => {
    toggleNavbar();
    togglePassword();
    toggleTheme();
    animateAndRemoveAlert();
});