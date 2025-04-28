import {toggleNavbar, togglePassword, toggleTheme, animateAndRemoveAlert} from "./index.js";
const url = window.location.href;
const baseUrl = url.split("/supercar/")[0];

async function getCarsBybrand(brandId=1){
    try{
        const res = await fetch(`${baseUrl}/supercar/apicars?brand=${brandId}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        });
        if(!res.ok){
            throw new Error(res.statusText);
        }
        return res.json()
    }catch(err){
        console.log(err)
    }
}

async function displayCars(brandId, carsOptions) {
    try{
        const cars = await getCarsBybrand(brandId);
        carsOptions.innerText = "";
        if(cars.length > 0){
            cars.forEach((car) => {
                const option = document.createElement("option");
                option.value = car.id_voiture;
                option.textContent = car.nom;
                carsOptions.appendChild(option);
            })
        }else {
            const option = document.createElement("option");
            option.value = "";
            option.textContent = "Aucune voiture disponible pour cette marque";
            carsOptions.appendChild(option);
        }
    }catch(err){
        console.log(err);
        carsOptions.innerHTML = "<option>Erreur lors du chargement des voitures</option>";
    }
}

document.addEventListener('DOMContentLoaded', async()=>{
    const brandOption = document.getElementById('brand');
    const carOptions = document.getElementById('car');
    await displayCars(parseInt(brandOption.value), carOptions)
    brandOption.addEventListener('change', async function(){
        await displayCars(parseInt(this.value), carOptions)
    })
})