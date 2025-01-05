import {combustionCars, electricCars, hybridCars} from "./homepage-cars.js";
import {toogleNavbar, toggleTheme} from "./index.js";

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

function displayCars(cars, template, container) {
    const carousel = container.querySelector(".carousel");  // On récupère le carousel existant
    const carsGrid = container.querySelector(".cars");      // On récupère la grille existante

    cars.forEach(car => {
        // Clonage du template pour la vue grille
        const cardCloneGrid = template.content.cloneNode(true);

        // Remplissage des informations pour la grille
        const carBrandImgGrid = cardCloneGrid.querySelector(".brand-logo");
        carBrandImgGrid.src = "/supercar/public/logos/" + car.brandName + ".webp";

        const brandNameGrid = cardCloneGrid.querySelector(".brand-name");
        brandNameGrid.textContent = car.brandName;

        const modeleNameGrid = cardCloneGrid.querySelector(".model-name");
        modeleNameGrid.textContent = car.model;

        const modelImgGrid = cardCloneGrid.querySelector(".model-img");
        modelImgGrid.src = car.image;

        const yearGrid = cardCloneGrid.querySelector(".year");
        yearGrid.textContent = car.year;

        const priceGrid = cardCloneGrid.querySelector(".price");
        priceGrid.textContent = car.price + "€";

        // Ajout de la carte à la grille
        carsGrid.append(cardCloneGrid);

        // Clonage du template pour le carrousel
        const cardCloneCarousel = template.content.cloneNode(true);

        // Remplissage des informations pour le carrousel
        const carBrandImgCarousel = cardCloneCarousel.querySelector(".brand-logo");
        carBrandImgCarousel.src = "/supercar/public/logos/" + car.brandName + ".webp";

        const brandNameCarousel = cardCloneCarousel.querySelector(".brand-name");
        brandNameCarousel.textContent = car.brandName;

        const modeleNameCarousel = cardCloneCarousel.querySelector(".model-name");
        modeleNameCarousel.textContent = car.model;

        const modelImgCarousel = cardCloneCarousel.querySelector(".model-img");
        modelImgCarousel.src = car.image;

        const yearCarousel = cardCloneCarousel.querySelector(".year");
        yearCarousel.textContent = car.year;

        const priceCarousel = cardCloneCarousel.querySelector(".price");
        priceCarousel.textContent = car.price + "€";

        // Ajout de la carte au carrousel
        const carouselItem = document.createElement("div");
        carouselItem.className = "carousel-item";
        carouselItem.append(cardCloneCarousel);
        carousel.appendChild(carouselItem);
    });
}

document.addEventListener("DOMContentLoaded", function() {
    toogleNavbar();
    toggleTheme();
    const carCardTemplate = document.getElementById("car-card-template");
    // tabs btn for engine type( electrics, hybrid or combustion)
    const engineTypeBtns = document.querySelectorAll(".engine-type-btn");

    const scrollToTopBtn = document.querySelector(".scroll-to-top-btn");
    window.addEventListener("scroll", ()=>{
        if(window.innerHeight + window.scrollY >= document.documentElement.scrollHeight){
            scrollToTopBtn.classList.remove("hidden");
        }else{
            scrollToTopBtn.classList.add("hidden");
        }
    })

    // cars containers by engine type
    const carsByEngineContainers = document.querySelectorAll(".cars-by-engine");
    engineTypeBtns.forEach(el => {
        el.addEventListener("click", (e) => {
            toggleActiveClass(el, engineTypeBtns, "btn-primary");
            carsByEngineContainers.forEach(container => {
                container.classList.add("hidden")
            })
            // show cars container related to the clicked button
            // (e.g: if the attribute data-engire fo the clicked button is hubride, we're gonna select the div with class hybrid-container)
            document.querySelector(`.${e.target.dataset.engine}-container`).classList.remove("hidden");
            document.querySelector(".engine-type-title").textContent = e.target.textContent; // set the title to current engire(hybrid)
        })
    })

    displayCars(combustionCars, carCardTemplate, document.querySelector(".combustion-container"));
    displayCars(electricCars, carCardTemplate, document.querySelector(".electric-container"));
    displayCars(hybridCars, carCardTemplate, document.querySelector(".hybrid-container"));

    // animate step-card on mousehover
    const setpCards = document.querySelectorAll(".step-card");
    setpCards.forEach(el => {
        el.addEventListener("mouseover", (e) => {
            toggleTheme();
           if(document.documentElement.dataset.theme === "bumblebee"){
               el.classList.remove("step-card-dark");
               el.classList.add("step-card-light");
           }else{
               el.classList.remove("step-card-light");
               el.classList.add("step-card-dark");
           }
            toggleTheme();
        })
    })
})