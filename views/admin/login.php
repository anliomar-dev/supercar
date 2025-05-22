<!doctype html>
<html lang="en" data-theme="bumblebee" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <title>Login</title>
</head>
<body class="bg-base-200 min-h-screen flex flex-col justify-between">
	<?php require_once ROOT."components/flash-message.php"?>
	<main class="flex-grow flex items-center justify-center px-4">
		<div class="bg-white p-8 rounded-xl shadow-md w-full max-w-sm text-center">
			<h1 class="text-xl font-bold mb-4">ADMIN</h1>
			<div class="flex justify-center mb-4">
				<div class="w-20 h-20 rounded-full overflow-hidden shadow">
					<img
						src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png"
						alt="admin avatar"
						class="w-full h-full object-cover"
					/>
				</div>
			</div>
			<form action="/supercar/admin/login" method="POST">
				<!-- email field-->
				<div class="form-control mb-3 text-left">
					<label class="label">
						<span class="label-text">Email</span>
					</label>
					<label class="input validator">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-primary">
							<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
						</svg>
						<input type="email" placeholder="eg: name@gmail.com" name="email" required />
					</label>
					<div class="validator-hint hidden">Enter valid email address</div>
				</div>

				<!-- password field -->
				<div class="form-control mb-4 text-left">
					<label class="label">
						<span class="label-text">Mot de passe</span>
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
				</div>
				<input type="hidden" name="next" value=<?php echo $_GET['next'] ?? "admin/dashboard";?>>

				<!-- Submit button -->
				<button class="btn btn-primary w-full mb-2">Login</button>
				<a href="#" class="text-primary text-sm hover:underline">Mot de passe oublié ?</a>
			</form>
			<p class="mt-6 text-sm text-gray-700">
				Retour vers le <a href="/supercar/" class="text-secondary hover:underline">site</a>
			</p>
		</div>
	</main>
	<footer class="text-center text-md bg-base-300 text-base-content py-8">
		Copyright © <?php $date = new DateTime(); echo $date->format("Y"); ?> - All right reserved by Supercar
	</footer>
	<script src="/supercar/assets/js/admin/login.js" defer type="module"></script>
</body>
</html>
