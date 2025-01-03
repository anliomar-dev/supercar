import { toogleNavbar } from "./index.js";

document.addEventListener("DOMContentLoaded", () => {
    toogleNavbar();

    const togglePasswordSvg = document.querySelectorAll(".toggle-password-svg");
    togglePasswordSvg.forEach(el => {
        el.addEventListener("click", (e) => {
            const passwordField = document.querySelector(".password-field")
            passwordField.setAttribute("type", el.dataset.passwordInputType);
            togglePasswordSvg.forEach(el => {
                if(el.classList.contains("hidden")){
                    el.classList.remove("hidden");
                }else{
                    el.classList.add("hidden");
                }
            })
        })
    })
});
