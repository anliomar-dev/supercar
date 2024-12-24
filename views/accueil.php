<!doctype html>
<html lang="en" data-theme="bumblebee">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="http://localhost/supercar/public/css/styles.css">
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
					<img src="http://localhost/supercar/public/medias/images/hero-image.png" alt="">
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
						<img src="http://localhost/supercar/public/medias/images/experience-img.png" class="w-full rounded-lg" alt="">
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
						<h3 class="text-secondary text-lg underline">Notre objectif</h3>
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
					<img src="http://localhost/supercar/public/medias/images/about-img.webp" class="rounded-lg" alt="about-image">
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

		<section class="how-it-work-section"></section>
		<section class="collection-section"></section>
		<section class="comming-soon-section"></section>
		<footer></footer>
	</body>
</html>
