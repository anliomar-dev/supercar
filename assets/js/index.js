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