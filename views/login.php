<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/supercar/assets/css/styles.css">
    <script src="/supercar/assets/js/login.js" type="module" defer></script>
    <title>Connexion</title>
</head>
<body class="">
	<div class="bg-base-200 fixed top-0 start-0 h-3/5 w-full z-[-1]"></div>
	<div class="w-full flex flex-col gap-y-6 items-center py-6 md:py-16 px-6 md:px-0">
		<div class="w-full md:w-auto bg-primary border rounded-lg shadow-lg p-2 md:p-3 md:pb-0">
			<!-- contact form -->
			<form action="/supercar/login" method="POST" class="w-auto md:w-[320px] flex flex-col gap-y-2 bg-base-100 p-5 rounded-lg">
				<div class="login-form-title flex justify-center">
					<h2 class="text-xl font-bold font-comic py-4">CONNEXION</h2>
				</div>

				<!-- input fields -->
				<div class="fields flex flex-col gap-y-3">
					<label class="input input-bordered flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 opacity-70 text-secondary">
							<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
						</svg>
						<input type="email" class="grow" placeholder="Email" required name="email" />
					</label>
					<label class="input input-bordered flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 opacity-70 text-secondary">
							<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
						</svg>
						<input type="password" placeholder="Mot de passe" name="password" required class="grow password-field" />

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
					<div class="flex justify-end"><a href="" class="text-secondary">Mot de passe oublié</a></div>
				</div>
				<input type="hidden" name="next" value=<?php echo $_GET['next'] ?? "dashboard/mes_donnees";?>>

				<button class="btn btn-primary min-h-0 h-10 font-bold my-2">Se connecter</button>
				<hr class="my-2" style="height: 2px;">
				<div class="w-full flex flex-col items-center gap-y-3">
					<h3 class="font-bold">Ou se connecter avec</h3>
					<a href="" class="btn btn-block bg-red-500 hover:bg-red-600 text-white min-h-0 h-10">Google</a>
				</div>
				<p class="text-sm">Pas encore inscrit ? <a href="/supercar/signup" class="text-secondary">s'inscrire</a></p>
			</form>
		</div>
	</div>
	</body>
</html>
