import { toggleNavbar, toggleTheme, animateAndRemoveAlert } from "./index.js";
import { animate } from "https://cdn.jsdelivr.net/npm/motion@11.11.13/+esm"

document.addEventListener("DOMContentLoaded", () => {
    toggleNavbar();
    toggleTheme();
    animateAndRemoveAlert();
});
