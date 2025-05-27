<div class="overlay fixed top-14 w-full h-full bg-black opacity-50 hidden lg:hidden"></div>
<!-- /.overlay -->
<nav class="flex justify-around items-center py-3 px-6 lg:px-12 shadow-md sticky top-0 bg-base-100" style="z-index: 2000;">
	<div class="nav__logo">
		<a href="/supercar" class="logo flex gap-2 items-center">
			<img src="/supercar/public/logos/logo-dark.png"
				 alt="logo" class="h-10 w-10"
			/>
			<span class="font-bold text-primary text-2xl">Supercar</span>
		</a>
	</div>
	<div class="nav-menu fixed lg:static top-14 w-full px-6 h-auto py-3 hidden lg:flex lg:justify-center">
		<ul class="flex flex-col lg:flex-row lg:justify-center gap-3 bg-base-100 lg:bg-transparent py-[55px] lg:py-0 h-full rounded-lg px-10" id="">
			<!-- dropdown -->
			<li class="w-full">
				<div class="dropdown dropdown-hover w-full">
					<a class="flex gap-2 w-full justify-center py-2 font-medium btn lg:btn-primary
						bg-transparent min-h-0 h-8 m-1 border-none">
						<div tabindex="0" role="button" class="flex items-center gap-x-2 text-base-content" style="font-weight: 750;">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
							</svg>
							Menu
						</div>
					</a>
					<ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-[200px] shadow">
						<li>
							<a href="/supercar/#hero" class="anchore">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
									<path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
								</svg>
								Acceuil
							</a>
						</li>
						<li>
							<a href="/supercar/voiture">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
									<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
								</svg>
								Toutes nos voitures
							</a>
						</li>
						<li>
							<a href="/supercar/dashboard/demande_essai">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
									<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
								</svg>
								Demande d'essai
							</a>
						</li>
						<li>
							<a href="/supercar/contact">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
									<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
								</svg>
								Contact
							</a>
						</li>
						<li>
							<a href="/supercar/evennement" class="">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
									<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
								</svg>
								Evennements
							</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="btn lg:btn-primary bg-transparent min-h-0 h-8 m-1 border-none flex items-center">
				<a href="/supercar/#experience" class="flex gap-2 w-auto justify-start py-2 font-medium anchore text-base-content">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
						<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
					</svg>
					<span class="pt-1">Expérience</span>
				</a>
			</li>
			<li class="btn lg:btn-primary bg-transparent min-h-0 h-8 m-1 border-none flex items-center">
				<a href="/supercar/#about" class="flex gap-1 w-auto justify-start py-2 font-medium anchore text-base-content">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
						<path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
					</svg>
					<span class="pt-1">Apropos</span>
				</a>
			</li>
			<li class="btn lg:btn-primary bg-transparent min-h-0 h-8 m-1 border-none flex items-center">
				<a href="/supercar/#test-steps" class="flex gap-2 w-auto justify-start py-2 font-medium anchore text-base-content">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
					</svg>
					<span class="pt-1">Réservtion</span>
				</a>
			</li>
			<li class="btn lg:btn-primary bg-transparent min-h-0 h-8 m-1 border-none flex items-center">
				<a href="/supercar/#cars" class="flex gap-2 w-auto justify-start py-2 font-medium anchore text-base-content">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
						<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
					</svg>
					<span class="pt-1">Voitures</span>
				</a>
			</li>
            <?php if(isset($_SESSION["user_id"])):?>
				<li class="lg:hidden min-h-0 h-8 m-1 border-none flex items-center justify-center">
					<div class="dropdown dropdown-bottom dropdown-end">
						<div tabindex="0" role="button" class="btn m-1 rounded-full min-h-0 min-w-0 w-10 h-10">
                            <?php echo strtoupper($_SESSION["username"][0]);?>
						</div>
						<ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
							<li><a href="/supercar/dashboard/change_password">Password</a></li>
							<li><a href="/supercar/dashboard/profile">Profile</a></li>
							<li><a href="/supercar/dashboard/mes_essais">Mes essais</a></li>
							<li><a href="/supercar/dashboard/demande_essai">Réserver un essai</a></li>
							<li><a href="/supercar/authentication/logout">Se deconnecter</a></li>
						</ul>
					</div>
				</li>
            <?php else :?>
				<li class="btn btn-primary lg:hidden min-h-0 h-8 m-1 border-none flex items-center">
					<a href="/supercar/login" class="">login</a>
				</li>
            <?php endif ;?>
			<li class="min-h-0 h-8 m-1 border-none flex items-center justify-center">
                <?php include_once("theme-controller.php") ?>
			</li>
		</ul>
	</div>
	<div class="hidden lg:flex">
        <?php if(isset($_SESSION["user_id"])):?>
			<div class="dropdown dropdown-bottom dropdown-end">
				<div tabindex="0" role="button" class="btn m-1 rounded-full min-h-0 min-w-0 w-10 h-10">
                    <?php echo strtoupper($_SESSION["username"][0]);?>
				</div>
				<ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
					<li><a href="/supercar/dashboard/change_password">Password</a></li>
					<li><a href="/supercar/dashboard/profile">Profile</a></li>
					<li><a href="/supercar/dashboard/mes_essais">Mes essais</a></li>
					<li><a href="/supercar/dashboard/demande_essai">Réserver un essai</a></li>
					<li><a href="/supercar/authentication/logout">Se deconnecter</a></li>
				</ul>
			</div>
        <?php else :?>
			<a href="/supercar/login" class="btn btn-primary h-10 min-h-0">login</a>
        <?php endif ;?>
	</div>
	<label class="btn btn-primary min-h-0 h-10 btn-circle swap swap-rotate lg:hidden">
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

