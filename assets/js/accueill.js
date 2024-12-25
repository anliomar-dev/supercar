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

document.addEventListener("DOMContentLoaded", function() {
    // tabs btn for engine type( electric, hybrid or combustion)
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
})