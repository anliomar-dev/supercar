/**
 * this function handle navbar in small screen
 */
export function toogleNavbar(){
    const checkBoxToggleMenu = document.getElementById("toggleMenuCheckbox");
    const homeAnchores = document.querySelectorAll(".anchore");
    const overlay = document.querySelector(".overlay");
    const navMenu = document.querySelector(".nav-menu");
    const toggleMenu = () =>{
        if(checkBoxToggleMenu.checked){
            [overlay, navMenu].forEach((el)=>{
                el.classList.remove("hidden");
            })
        }else{
            [overlay, navMenu].forEach((el)=>{
                el.classList.add("hidden");
            })
        }
    }
    checkBoxToggleMenu.addEventListener("change", (e)=> {
        toggleMenu();
    })
    overlay.onclick = () => {
        checkBoxToggleMenu.checked = false;
        toggleMenu();
    }
    homeAnchores.forEach(anchor =>{
        anchor.addEventListener("click",()=>{
            if(checkBoxToggleMenu.checked){
                checkBoxToggleMenu.checked = false;
                toggleMenu();
            }
        })
    })
}


/**
 * the function show and hide password
 */
export function togglePassword(){
    // all icons(svg) or buttons that show or hide password(eye & eye slash)
    const togglePasswordSvg = document.querySelectorAll(".toggle-password-svg");
    togglePasswordSvg.forEach(el => {
        el.addEventListener("click", (e) => {
            // select the input field tha is siblings with the clicked element(icon or button)
            const passwordField = el.parentElement.querySelector(".password-field");
            // set the type of password field to the value of the dataset(password-field) of the clicked element
            passwordField.setAttribute("type", el.dataset.passwordInputType);
            // hide the clicked element
            el.classList.add("hidden");

            // icons for hiding and show pasword comes after the input field when we click to the first icon(eye/eye-slash) we select the next element sibling(eye/eye-slash)
            // and when the clicked element is the last icon we select the previous one
            el.nextElementSibling ? el.nextElementSibling.classList.remove("hidden") : el.previousElementSibling.classList.remove("hidden");
        })
    })
}

export function toggleTheme(){
    const htmlElement = document.documentElement;
    const checkboxThemeController = document.querySelector(".theme-controller");
    if(!localStorage.getItem("currentTheme")){
        localStorage.setItem("currentTheme", "bumbelbee");
    }
    const currentTheme = localStorage.getItem("currentTheme");
    checkboxThemeController.checked = currentTheme === "night";
    htmlElement.setAttribute("data-theme", currentTheme);
    checkboxThemeController.addEventListener("change", (e) => {
        e.target.checked ? localStorage.setItem("currentTheme", "night") : localStorage.setItem("currentTheme", "bumblebee");
        htmlElement.dataset.theme = e.target.checked ? "night" : "bumbelbee";
    })
}