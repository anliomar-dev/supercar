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
	<title>Dashboard Admin supercar</title>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col justify-between">

<!-- Contenu principal -->
<div class="flex-1 p-6">
	<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-6xl mx-auto mt-6">

		<a href="/supercar/admin/utilisateurs" class="card py-3 shadow-md bg-gradient-to-r from-orange-100 to-white
			hover:from-orange-200 hover:to-base-200 hover:scale-105 hover:shadow-md hover:-translate-y-3
			transition-all duration-400 ease-in-out"
		>
			<div class="card-body items-center justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users">
					<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
					<circle cx="9" cy="7" r="4"/>
					<path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
					<path d="M16 3.13a4 4 0 0 1 0 7.75"/>
				</svg>
				<h2 class="font-bold text-lg">Utilisateurs</h2>
			</div>
		</a>

		<a href="/supercar/admin/marques"  class="card py-3 shadow-md bg-gradient-to-r from-orange-100 to-white
			hover:from-orange-200 hover:to-base-200 hover:scale-105 hover:shadow-md
			hover:-translate-y-3 transition-all duration-400 ease-in-out">
			<div class="card-body items-center justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tags-icon lucide-tags">
					<path d="m15 5 6.3 6.3a2.4 2.4 0 0 1 0 3.4L17 19"/>
					<path d="M9.586 5.586A2 2 0 0 0 8.172 5H3a1 1 0 0 0-1 1v5.172a2 2 0 0 0 .586 1.414L8.29 18.29a2.426 2.426 0 0 0 3.42 0l3.58-3.58a2.426 2.426 0 0 0 0-3.42z"/>
					<circle cx="6.5" cy="9.5" r=".5" fill="currentColor"/>
				</svg>
				<h2 class="font-bold text-lg">Marques</h2>
			</div>
		</a>

		<a href="/supercar/admin/voitures" class="card py-3 shadow-md bg-gradient-to-r from-orange-100 to-white
			hover:from-orange-200 hover:to-base-200 hover:scale-105 hover:shadow-md
			hover:-translate-y-3 transition-all duration-400 ease-in-out">
			<div class="card-body items-center justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-car-icon lucide-car"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/>
					<circle cx="7" cy="17" r="2"/>
					<path d="M9 17h6"/>
					<circle cx="17" cy="17" r="2"/>
				</svg>
				<h2 class="font-bold text-lg">Voitures</h2>
			</div>
		</a>

		<a href="#" class="card py-3 shadow-md bg-gradient-to-r from-orange-100 to-white
			hover:from-orange-200 hover:to-base-200 hover:scale-105 hover:shadow-md
			hover:-translate-y-3 transition-all duration-400 ease-in-out">
			<div class="card-body items-center justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-images-icon lucide-images">
					<path d="M18 22H4a2 2 0 0 1-2-2V6"/>
					<path d="m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18"/>
					<circle cx="12" cy="8" r="2"/>
					<rect width="16" height="16" x="6" y="2" rx="2"/>
				</svg>
				<h2 class="font-bold text-lg">Voitures images</h2>
			</div>
		</a>

		<a href="/supercar/admin/demande_essais" class="card py-3 shadow-md bg-gradient-to-r from-orange-100 to-white
			hover:from-orange-200 hover:to-base-200 hover:scale-105 hover:shadow-md
			hover:-translate-y-3 transition-all duration-400 ease-in-out">
			<div class="card-body items-center justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-stack-icon lucide-file-stack">
					<path d="M21 7h-3a2 2 0 0 1-2-2V2"/>
					<path d="M21 6v6.5c0 .8-.7 1.5-1.5 1.5h-7c-.8 0-1.5-.7-1.5-1.5v-9c0-.8.7-1.5 1.5-1.5H17Z"/>
					<path d="M7 8v8.8c0 .3.2.6.4.8.2.2.5.4.8.4H15"/>
					<path d="M3 12v8.8c0 .3.2.6.4.8.2.2.5.4.8.4H11"/>
				</svg>
				<h2 class="font-bold text-lg">Demandes essai</h2>
			</div>
		</a>

		<a href="/supercar/admin/evennements/" class="card py-3 shadow-md bg-gradient-to-r from-orange-100 to-white
			hover:from-orange-200 hover:to-base-200 hover:scale-105 hover:shadow-md
			hover:-translate-y-3 transition-all duration-400 ease-in-out">
			<div class="card-body items-center justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-days-icon lucide-calendar-days">
					<path d="M8 2v4"/>
					<path d="M16 2v4"/>
					<rect width="18" height="18" x="3" y="4" rx="2"/>
					<path d="M3 10h18"/>
					<path d="M8 14h.01"/>
					<path d="M12 14h.01"/>
					<path d="M16 14h.01"/>
					<path d="M8 18h.01"/>
					<path d="M12 18h.01"/>
					<path d="M16 18h.01"/>
				</svg>
				<h2 class="font-bold text-lg">Evennements</h2>
			</div>
		</a>

		<a href="/supercar/admin/contacts" class="card py-3 shadow-md bg-gradient-to-r from-orange-100 to-white
			hover:from-orange-200 hover:to-base-200 hover:scale-105 hover:shadow-md
			hover:-translate-y-3 transition-all duration-400 ease-in-out">
			<div class="card-body items-center justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mails-icon lucide-mails">
					<rect width="16" height="13" x="6" y="4" rx="2"/>
					<path d="m22 7-7.1 3.78c-.57.3-1.23.3-1.8 0L6 7"/>
					<path d="M2 8v11c0 1.1.9 2 2 2h14"/>
				</svg>
				<h2 class="font-bold text-lg">Contacts</h2>
			</div>
		</a>

	</div>
</div>

<!-- Pied de page -->
<footer class="text-center text-md bg-base-300 text-base-content py-8">
	Copyright © <?php $date = new DateTime(); echo $date->format("Y"); ?> - All right reserved by Supercar
</footer>

</body>
</html>

