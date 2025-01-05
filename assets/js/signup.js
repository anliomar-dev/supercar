import {toogleNavbar, togglePassword, toggleTheme, animateAndRemoveAlert} from "./index.js";

document.addEventListener("DOMContentLoaded", () => {
    toogleNavbar();
    togglePassword();
    toggleTheme();
    animateAndRemoveAlert();
});