<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/supercar/assets/css/styles.css">
	<script src="/supercar/assets/js/dashboard.js" type="module" defer></script>
	<title>Mon compte</title>
</head>
<body>
	<?php require_once ROOT."components/flash-message.php"?>
	<div class="w-full h-full flex flex-col items-start
		md:flex-row md:justify-center bg-base-200 py-10 px-6 md:px-0">
		<!-- sidlinks small screen -->
		<div class="border md:hidden w-full my-1">
			<ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-lg z-[1] gap-2 flex flex-row justify-center">
				<li class="">
					<a href="/supercar/dashboard/change_password" class="change_password">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
						</svg>
					</a>
				</li>
				<li>
					<a href="/supercar/dashboard/profile" class="profile">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
							 stroke-width="1.5" stroke="currentColor" class="size-5">
							<path stroke-linecap="round" stroke-linejoin="round"
								  d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
						</svg>
					</a>
				</li>
				<li>
					<a href="/supercar/dashboard/mes_essais" class="mes_essais">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
						</svg>
					</a>
				</li>
				<li>
					<a href="/supercar/dashboard/demande_essai" class="demande_essai">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
							 stroke-width="1.5" stroke="currentColor" class="size-5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
						</svg>
					</a>
				</li>
				<li>
					<a href="/supercar/authentication/logout">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
							 stroke-width="1.5" stroke="currentColor" class="size-5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
						</svg>
					</a>
				</li>
			</ul>
		</div>

		<div class="personal-data-page bg-base-100 h-full w-full md:w-[900px] rounded-lg flex border">
			<!-- sidebar -->
			<div class="sidbar-container w-3/12 h-full shadow-lg hidden md:block">
		  <?php require_once ROOT . 'components/sidebar.php'; ?>
			</div>
			<div class="personal-data-wrapper p-6 w-full md:w-9/12">
				<div class="persona-data__header w-full flex justify-center">
					<h3 class="text-2xl font-bold">Mot de passe</h3>
				</div>
				<div class="form p-4">
					<form action="/supercar/dashboard/change_password" method="POST" class="w-auto flex flex-col gap-y-2">
						<!-- change password section -->
						<div class="flex justify-center pt-4"><h3 class="text-lg">Changer le mot de passe</h3></div>
						<!-- old password -->
						<div class="password-fields grid grid-cols-1 gap-3">
							<label class="input input-bordered flex items-center gap-2">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 opacity-70 text-secondary">
									<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
								</svg>
								<!-- input password filed -->
								<input type="password" placeholder="Ancien mot de passe" name="current_password"
									required class="grow password-field"
								/>

								<!-- show password-->
								<svg xmlns="http://www.w3.org/2000/svg" fill="none"
									viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
									class="size-6 hover:text-secondary hover:cursor-pointer toggle-password-svg"
									data-password-input-type="text">
									<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
									<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
								</svg>

								<!-- hide password-->
								<svg xmlns="http://www.w3.org/2000/svg" fill="none"
									 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
									 class="size-6 hover:text-secondary hover:cursor-pointer hidden toggle-password-svg"
									 data-password-input-type="password">
									<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
								</svg>
							</label>
						</div>

						<!-- new password -->
						<div class="password-fields grid grid-cols-1 md:grid-cols-2 gap-3">
							<label class="input input-bordered flex items-center gap-2">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 opacity-70 text-secondary">
									<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
								</svg>

								<!-- input password filed -->
								<input type="password" placeholder="Mot de passe" name="new_password"
									   required class="grow password-field" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
									   title="Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule, un chiffre, et un caractère spécial."
								/>

								<!-- show password-->
								<svg xmlns="http://www.w3.org/2000/svg" fill="none"
									 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
									 class="size-6 hover:text-secondary hover:cursor-pointer toggle-password-svg"
									 data-password-input-type="text">
									<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
									<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
								</svg>

								<!-- hide password-->
								<svg xmlns="http://www.w3.org/2000/svg" fill="none"
									 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
									 class="size-6 hover:text-secondary hover:cursor-pointer hidden toggle-password-svg"
									 data-password-input-type="password">
									<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
								</svg>
							</label>
							<label class="input input-bordered flex items-center gap-2">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 opacity-70 text-secondary">
									<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
								</svg>
								<!-- input password filed -->
								<input type="password" placeholder="Confirmer le mot de passe" name="confirm_password"
									   required class="grow password-field" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
									   title="Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule, un chiffre, et un caractère spécial."
								/>

								<!-- show password-->
								<svg xmlns="http://www.w3.org/2000/svg" fill="none"
									 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
									 class="size-6 hover:text-secondary hover:cursor-pointer toggle-password-svg"
									 data-password-input-type="text">
									<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
									<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
								</svg>

								<!-- hide password-->
								<svg xmlns="http://www.w3.org/2000/svg" fill="none"
									 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
									 class="size-6 hover:text-secondary hover:cursor-pointer hidden toggle-password-svg"
									 data-password-input-type="password">
									<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
								</svg>
							</label>
						</div>
						<div class="buttons flex gap-x-2">
							<button class="btn btn-primary min-h-0 h-10 w-1/2 md:w-1/3">Sauvegarder</button>
							<button type="button" class="btn min-h-0 h-10 w-1/2 md:w-1/3">Anuller</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

