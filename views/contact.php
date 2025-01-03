<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/supercar/assets/css/styles.css">
	<script src="/supercar/assets/js/contact.js" type="module" defer></script>
    <title>Contact</title>
</head>
<body class="">
	<div class="bg-base-200 fixed top-0 start-0 h-2/3 w-full z-[-1]"></div>
	<?php if(isset($message)): ?>
		<div class="fixed top-24 flex justify-center w-full px-6">
			<div role="alert" class="alert alert-success w-full md:w-1/2 lg:w-2/5 flex flex-col md:flex-row justify-between">
				<div class="flex flex-col items-center md:flex-row gap-4">
					<svg
						xmlns="http://www.w3.org/2000/svg"
						class="h-6 w-6 shrink-0 stroke-current text-white"
						fill="none"
						viewBox="0 0 24 24">
						<path
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
					</svg>
					<span class="text-white">Votre message a été envoyé ! Nous vous contacterons bientôt</span>
				</div>
				<div>
					<svg xmlns="http://www.w3.org/2000/svg"
						 fill="none" viewBox="0 0 24 24"
						 stroke-width="1.5"
						 stroke="currentColor"
						 class="size-6 font-bold hover:cursor-pointer remove-alert-icon">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
					</svg>
				</div>
			</div>
		</div>
	<?php endif; ?>
    <h1 class="text-2xl md:text-4xl lg:text-5xl text-primary text-center font-comic py-8">Contactez nous</h1>
	<div class="w-full flex flex-col gap-y-6 items-center py-6 px-6 md:px-0">
		<div class="w-full md:w-auto flex flex-col md:flex-row gap-4 bg-base-100 border rounded-lg shadow-lg p-2 md:p-6">
			<!-- cordinates and contact infos -->
			<div class="contact-infos flex flex-col gap-y-4 bg-base-200 rounded-lg p-6">
				<div class="flex flex-col gap-y-2">
					<h3 class="text-lg text-secondary font-bold">Nos coordonnés</h3>
					<div class="flex gap-x-2 items-center mt-2">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9 text-secondary bg-base-100 rounded-lg p-2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
						</svg>
						<span class="font-bold">+230 5429 7857</span>
					</div>
					<div class="flex gap-x-2 items-center mt-2">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9 text-secondary bg-base-100 rounded-lg p-2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
						</svg>
						<span class="font-bold">contact-supercar@gmail.com</span>
					</div>
					<div class="flex gap-x-2 items-center mt-2">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9 text-secondary bg-base-100 rounded-lg p-2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
							<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
						</svg>
						<span class="font-bold">Plot E63, Rue cinq Epices, Ebene</span>
					</div>
				</div>
				<div class="opening-hours flex flex-col gap-y-2">
					<h3 class="text-lg text-secondary font-bold">Horaires d'ouvertures</h3>
					<div>
						<p><span class="font-bold">Lundi -- Vendredi</span> : 8:30 à 16:30</p>
						<p><span class="font-bold">Samedi et Dimanche </span>: Fermé</p>
					</div>
				</div>
			</div>

			<!-- contact form -->
			<div class="contact-form">
				<form action="/supercar/contact" method="POST" class="w-auto flex flex-col gap-y-2">
					<div class="fullname grid grid-cols-1 md:grid-cols-2 gap-3">
						<label class="input input-bordered flex items-center gap-2">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
								<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
							</svg>
							<input type="text" placeholder="Prenom" name="firstname" required title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$" class="grow" />
						</label>
						<label class="input input-bordered flex items-center gap-2">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
								<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
							</svg>
							<input type="text" placeholder="Nom" name="lastname" required title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$" class="grow" />
						</label>
					</div>
					<div class="phone-email grid grid-cols-1 md:grid-cols-2 gap-3">
						<label class="input input-bordered flex items-center gap-2">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
								<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
							</svg>
							<input type="text" placeholder="Téléphone" name="phone" required pattern="^\+\d{1,4}(\s?\d{7,12})+$"
								   title="Le numéro doit être au format international. exp: +230 5429 7857" class="grow" />
						</label>
						<label class="input input-bordered flex items-center gap-2">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
								<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
							</svg>
							<input type="email" class="grow" placeholder="Email" required name="email" />
						</label>
					</div>
					<div class="object">
						<label class="input input-bordered flex items-center gap-2">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
								<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
							</svg>
							<input type="text" placeholder="Objet" name="subject" required title="minimum 5 caractères" pattern="^(?!\s*$).{5,}$" class="grow" />
						</label>
					</div>
					<label class="form-control">
						<textarea class="textarea textarea-bordered h-24" name="message" placeholder="Message" required></textarea>
					</label>
					<button class="btn btn-primary min-h-0 h-10">Envoyer</button>
				</form>
			</div>
		</div>
		<div class="map-container w-full md:w-[902.84px] rounded-lg p-4 bg-primary shadow-lg">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d71422.56182577724!2d57.46703620419086!3d-20.247373655275567!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217c5b0018cc4555%3A0x87faa690ab43bd46!2sRue%20cinq%20Epices!5e0!3m2!1sfr!2smu!4v1730830922149!5m2!1sfr!2smu" class="w-full h-[350px] rounded-lg" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
			</iframe>
		</div>
	</div>
</body>
</html>