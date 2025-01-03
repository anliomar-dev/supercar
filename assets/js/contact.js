import { toogleNavbar } from "./index.js";
import { animate } from "https://cdn.jsdelivr.net/npm/motion@11.11.13/+esm"

document.addEventListener("DOMContentLoaded", () => {
    toogleNavbar();

    const alertSuccess = document.querySelector(".alert-success");

    if (alertSuccess) {
        animate(
            alertSuccess,
            { scale: [0.4, 1], opacity: [0, 1] },
            { ease: "circInOut", duration: 0.8 },

        );
    }

    const removeAlertIcon = document.querySelector(".remove-alert-icon");
    if (removeAlertIcon) {
        removeAlertIcon.onclick = function () {
            alertSuccess.classList.add('hidden')
        }
    }
});
