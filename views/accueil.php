<!doctype html>
<html lang="en" data-theme="bumblebee">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="/supercar/assets/css/styles.css">
		<script src="/supercar/assets/js/accueill.js" type="module" defer></script>
		<title>Accueil</title>
		<script>
            document.addEventListener('DOMContentLoaded', function() {
                document.title = "accueil";
            });
		</script>
	</head>
	<body>
		<!-- hero section -->
		<section class="hero-section flex flex-col-reverse items-center px-6 pt-8 pb-12 gap-y-6 bg-base-200">
			<div class="hero-section__header flex flex-col gap-y-3 justify-center items-start">
				<h1 class="hero-title font-comic text-2xl">Trouvez la voiture de vos rêves</h1>
				<p class="font-default text-primary-content">Explorez notre gamme de véhicules exceptionnels et réservez dès maintenant votre essai gratuit</p>
				<div>
					<button class="btn btn-primary min-h-0 h-10">Reservez un essai gratuit</button>
				</div>
			</div>
			<div>
				<div class="hero-mask"></div>
				<div class="hero-img">
					<img src="http://localhost/supercar/public/images/hero-image.png" alt="">
				</div>
			</div>
		</section>

		<!-- experience section-->
		<section class="experience px-6 py-10">
			<div class="experience__header flex flex-col gap-y-2 items-center pb-6">
				<h3 class="font-default">Experience</h3>
				<h2 class="font-comic text-xl text-primary">Pourquoi nous choisir ?</h2>
			</div>
			<div class="experience__body flex flex-col">
				<div class="flex flex-col gap-y-4">
					<div class="w-full">
						<img src="http://localhost/supercar/public/images/experience-img.png" class="w-full rounded-lg" alt="">
					</div>
					<div class="border-2 flex flex-col justify-center items-center py-3 rounded-lg">
						<h3 class="text-2xl font-default">Plus d'informations</h3>
						<p class="text-primary text-xl">+230 5429 7857</p>
					</div>
				<div>
				<div class="experience__description">
					<p class="font-default text-primary-content">
						Chez <span class="bg-accent text-accent-content font-bold px-2">Supercar</span>, nous nous engageons à offrir à nos clients une expérience de conduite inoubliable
						Avec une large sélection de véhicules de marques renommées.
					</p>
					<div class="description__main-goals py-3">
						<h3 class="text-secondary text-lg underline">Nos objectifs</h3>
						<ul class="">
							<li class="flex gap-x-2 items-start py-2">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12">
									<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
								</svg>
								<span class="pt-2">
									Vous aider à trouver la voiture qui correspond parfaitement à vos besoins
								</span>
							</li>
							<li class="flex gap-x-2 items-start py-2">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
									<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
								</svg>
								<span class="">
									Offrir un service personnalisé à chaque client
								</span>
							</li>
							<li class="flex gap-x-2 items-start pt-2">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
									<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
								</svg>
								<span class="">
									Proposer les meilleures options automobiles.
								</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<!-- About section -->
		<section class="about flex flex-col px-6 py-8 bg-base-200">
			<div class="experience__header flex flex-col gap-y-2 items-center pb-6">
				<h3 class="font-default">Apropos</h3>
				<h2 class="font-comic text-xl text-primary">QUI SOMMES NOUS ?</h2>
			</div>
			<div class="flex flex-col gap-y-6">
				<div class="rounded-lg">
					<img src="http://localhost/supercar/public/images/about-img.webp" class="rounded-lg" alt="about-image">
				</div>
				<div class="border p-3 rounded-lg">
					<p>
						Depuis notre création en <span class="bg-accent text-accent-content px-2">2009</span>, Supercar s'efforce d'offrir une nouvelle approche de la location et de l'essai de voitures haut de gamme.
						Fondée par des passionnés d'automobile, notre entreprise s'engage à proposer des services
						de qualité exceptionnelle, en mettant un point d'honneur à la satisfaction de nos clients.
					</p>
				</div>
			</div>
		</section>

		<!-- how it works section -->
		<section class="how-it-work px-8 py-10">
			<div class="flex flex-col items-center justify-center mb-8 gap-y-2">
				<h2 class="font-comic text-xl text-primary">Comment ça fonctionne ?</h2>
				<p class="font-bold font-default text-center">Essayer une voiture en 3 étapes</p>
			</div>
			<div class="test-drive-steps flex flex-col items-center justify-center gap-y-4">
				<div class="step-card border shadow-lg rounded-lg p-8 flex flex-col justify-center items-center gap-y-3">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-primary">
						<path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
					</svg>
					<h3 class="text-xl font-comic font-bold text-secondary">Créer un compte</h3>
					<p class="text-md font-default">Vous pouvez demander l'éffacement de vos données a tous moment</p>
				</div>
				<div class="step-card border shadow-lg rounded-lg p-8 flex flex-col justify-center items-center gap-y-3">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16 text-primary">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
					</svg>
					<h3 class="text-xl font-comic font-bold text-secondary">Choisir une date et une horaire</h3>
					<p class="text-md font-default">Choisissez la marque et la voiture qui vous convient</p>
				</div>
				<div class="step-card border shadow-lg rounded-lg p-8 flex flex-col justify-center items-center gap-y-3">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-16 fill-primary">
						<path d="M135.2 117.4L109.1 192l293.8 0-26.1-74.6C372.3 104.6 360.2 96 346.6 96L165.4 96c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32l181.2 0c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2l0 144 0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L96 400l0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L0 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/>
					</svg>
					<h3 class="text-xl font-comic font-bold text-secondary">Testez la voiture</h3>
					<p class="text-md font-default">Profitez d'une expérience de conduite mémorable avant de prendre votre décision.</p>
				</div>
			</div>
		</section>

		<!-- car collection section -->
		<section class="cars px-8 flex flex-col items-center py-8">
			<h2 class="font-comic text-xl text-primary mb-6">Decouvrez nos voitures</h2>
			<div class="category-list flex justify-center gap-4 flex-wrap">
				<button class="btn min-h-0 h-8 engine-type-btn combustion-btn btn-primary" data-engine="combustion">Combustions</button>
				<button class="btn min-h-0 h-8 engine-type-btn electric-btn" data-engine="electric">Éléctriques</button>
				<button class="btn min-h-0 h-8 engine-type-btn hybrid-btn" data-engine="hybrid">Hybrides</button>
			</div>
			<h3 class="text-lg my-4 engine-type-title text-secondary font-comic font-bold">Combustions</h3>
			<div class="cars-container">
				<template id="car-card-template">
					<div class="border rounded-xl bg-base-200 shadow-lg max-w-xs px-4 py-4">
						<div class="header-card flex flex-col gap-y-2 w-full pb-6">
							<div class="flex items-center w-full gap-x-6">
								<div class="w-[60px]">
									<img src="" class="brand-logo w-full rounded-lg" alt="">
								</div>
								<div class="flex flex-col">
									<div class="text-lg font-comic brand-name">Ferrari</div>
									<h2 class="text-lg font-bold text-secondary model-name">Sf90 stradale</h2>
								</div>
							</div>
						</div>
						<div class="body-card flex flex-col">
							<div class="body-img">
								<img src="" class="rounded-lg model-img" alt="">
							</div>
							<div class="details py-3">
								<h3 class="text-xl font-bold py-2">Details</h3>
								<table class="w-full pt-2 bg-base-100 rounded-lg">
									<tr>
										<td class="border font-medium px-3 py-1">Année</td>
										<td class="border px-3 py-1 year"></td>
									</tr>
									<tr>
										<td class="border font-medium px-3 py-1">Prix</td>
										<td class="border px-3 py-1 price"></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="footer-card flex gap-y-2 box-border">
							<a href="#" class="btn btn-primary w-1/2 min-h-0 h-8">Essayer</a>
							<a href="#" class="btn w-1/2 min-h-0 h-8 text-secondary">voir plus</a>
						</div>
					</div>
				</template>
				<div class="combustion-container cars-by-engine flex flex-col gap-y-6">
				</div>
				<div class="electric-container cars-by-engine hidden flex flex-col gap-y-6">
				</div>
				<div class="hybrid-container cars-by-engine hidden flex flex-col gap-y-6">
				</div>
			</div>
			<div class="pt-6 flex justify-end">
				<a href="" class="btn btn-primary min-h-0 h-8">plus de voitures</a>
			</div>
		</section>
		<section class="comming-soon-section"></section>
	</body>
</html>
