<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
					content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>
	</head>
	<body>
		<div class="overlay fixed top-14 w-full h-full bg-black opacity-50 hidden"></div>
		<!-- /.overlay -->
		<nav class="flex justify-around items-center py-3 px-6 shadow-md sticky top-0 bg-base-100">
			<div class="nav__logo">
				<a href="" class="logo flex gap-2 items-center">
					<img src="http://localhost/supercar/public/logos/logo-dark.png"
						 alt="logo" class="h-8 w-8"
					/>
					<span class="font-bold text-primary">Supercar</span>
				</a>
			</div>
			<div class="nav-menu fixed top-14 w-full px-6 h-auto py-3 hidden">
				<ul class="flex flex-col gap-4 bg-primary py-[55px] h-full rounded-lg px-10" id="">
					<li class="">
						<div class="dropdown dropdown-hover">
							<a class="flex items-center font-medium">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
								</svg>
								<div tabindex="0" role="button" class="btn btn-primary min-h-0 h-8 m-1 border-none" style="font-weight: 750;">
									Menu
								</div>
							</a>
							<ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-auto shadow">
								<li><a href="">Accueil</a></li>
								<li><a href="">Apropos</a></li>
								<li><a href="">Expérience</a></li>
								<li><a href="">Collection</a></li>
								<li><a href="">Evennements</a></li>
							</ul>
						</div>
					</li>
					<li class="">
						<a href="" class="flex gap-2 items-center w-auto justify-start py-2 font-medium">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
							</svg>
							<span class="pt-1">Voitures</span>
						</a>
					</li>
					<li class="">
						<a href="" class="flex gap-2 items-center w-auto justify-start py-2 font-medium">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
							</svg>
							<span class="pt-1">Demande d'essai</span>
						</a>
					</li>
					<li class="">
						<a href="" class="flex gap-2 items-center w-auto justify-start py-2 font-medium">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
							</svg>
							<span class="pt-1">Contact</span>
						</a>
					</li>
					<li class="">
						<a href="" class="flex gap-2 items-center w-auto justify-start py-2 font-medium">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
							</svg>
							<span class="pt-1">Evennements</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="hidden">
				<button class="btn btn-primary h-10 min-h-0">Register</button>
			</div>
			<label class="btn btn-primary min-h-0 h-10 btn-circle swap swap-rotate">
				<!-- this hidden checkbox controls the state -->
				<input type="checkbox" id="toggleMenuCheckbox" />

				<!-- hamburger icon -->
				<svg
					class="swap-off fill-current"
					xmlns="http://www.w3.org/2000/svg"
					width="25"
					height="25"
					viewBox="0 0 512 512">
					<path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
				</svg>

				<!-- close icon -->
				<svg
					class="swap-on fill-current"
					xmlns="http://www.w3.org/2000/svg"
					width="25"
					height="25"
					viewBox="0 0 512 512">
					<polygon
						points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49" />
				</svg>
			</label>
		</nav>
		<script>
            const checkBoxToggleMenu = document.getElementById("toggleMenuCheckbox");
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
		</script>
	</body>
</html>