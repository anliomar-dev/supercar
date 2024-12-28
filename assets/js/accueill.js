import {combustionCars, electricCars, hybridCars} from "./homepage-cars.js";

/**
 * Adds an active class to an element and removes this class from all its siblings.
 *
 * @param {Element} activeEl - The element to which the active class is added (e.g., a button with `btn-primary` or a color class like `text-primary`).
 * @param {NodeListOf<Element>} allSiblings - The list of siblings of the active element (can be selected with `parentElement.children`).
 * @param {string} activeClass - The class to add and remove (e.g., `btn-primary`, `text-primary`, `bg-primary`).
 */
function toggleActiveClass(activeEl, allSiblings, activeClass) {
    allSiblings.forEach(el => {
        el.classList.remove(activeClass);
    });
    activeEl.classList.add(activeClass);
}

function displayCars(cars, template, container){
    cars.forEach(car => {
        const cardClone  = template.content.cloneNode(true);
        const carBrandImg = cardClone.querySelector(".brand-logo");
        carBrandImg.src = "/supercar/public/logos/" + car.brandName + ".webp";
        const brandName = cardClone.querySelector(".brand-name");
        brandName.textContent = car.brandName;
        const modeleName = cardClone.querySelector(".model-name");
        modeleName.textContent = car.model;
        const modelImg = cardClone.querySelector(".model-img");
        modelImg.src = car.image;
        const year = cardClone.querySelector(".year");
        year.textContent = car.year;
        const price = cardClone.querySelector(".price");
        price.textContent = car.price + " €";
        container.append(cardClone);
    })

}

document.addEventListener("DOMContentLoaded", function() {
    const carCardTemplate = document.getElementById("car-card-template");
    // tabs btn for engine type( electrics, hybrid or combustion)
    const engineTypeBtns = document.querySelectorAll(".engine-type-btn");
    // cars containers by engine type
    const carsByEngineContainers = document.querySelectorAll(".cars-by-engine");
    engineTypeBtns.forEach(el => {
        el.addEventListener("click", (e) => {
            toggleActiveClass(el, engineTypeBtns, "btn-primary");
            carsByEngineContainers.forEach(container => {
                container.classList.add("hidden")
            })
            document.querySelector(`.${e.target.dataset.engine}-container`).classList.remove("hidden");
            document.querySelector(".engine-type-title").textContent = e.target.textContent;
        })
    })

    displayCars(combustionCars, carCardTemplate, document.querySelector(".combustion-container"));
    displayCars(electricCars, carCardTemplate, document.querySelector(".electric-container"));
    displayCars(hybridCars, carCardTemplate, document.querySelector(".hybrid-container"));

})