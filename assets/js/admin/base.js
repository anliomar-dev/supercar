import {toggleNavbar, toggleTheme, animateAndRemoveAlert, togglePassword} from "../index.js";
//import { animate } from "https://cdn.jsdelivr.net/npm/motion@11.11.13/+esm"
document.addEventListener("DOMContentLoaded", () => {
    animateAndRemoveAlert();
    // if the path ends with "/create" it means we are in the same path:
    // exp: /voitures/create and /voitures, the button voiture of the sidebar will be primary because it's the same path
});
