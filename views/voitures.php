<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/supercar/assets/css/styles.css">
	<title>voitures</title>
</head>
<body>
	<main class="">
		<?php if(isset($paginatedCars) && !empty($paginatedCars)): ?>
			<section class="cars px-8 md:px-16 lg:px-28 pt-10 pb-16
				flex flex-col gap-y-4 items-center w-full">
			<div class="cars-container w-full">
				<div class="combustion-container cars-by-engine">
					<div class="cars grid grid-cols-1 sm:items-center sm:grid-cols-2  md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-6 justify-center">
						<?php foreach($paginatedCars["data"] as $car): ?>
							<div class="border rounded-xl bg-base-200 shadow-lg max-w-xs px-4 py-4">
								<div class="header-card flex flex-col gap-y-2 w-full pb-6">
									<div class="flex items-center w-full gap-x-6">
										<div class="w-[60px]">
											<img src=<?php echo $car["marque_logo"] ? $car["marque_logo"] : "http://localhost/supercar/public/images/no-image.jpg";?>
											class="brand-logo w-full rounded-lg" alt="">
										</div>
										<div class="flex flex-col">
											<div class="text-lg font-comic brand-name"><?php echo $car["nom_marque"] ?></div>
											<h2 class="text-sm font-bold text-secondary model-name"><?php echo $car["nom_model"] ?></h2>
										</div>
									</div>
								</div>
								<div class="body-card flex flex-col">
									<div class="body-img">
										<img src=<?php echo $car["url_image"] ? $car["url_image"] : "https://www.testo.com/images/not-available.jpg";?> class="rounded-lg model-img hover:scale-110 hover:transition hover:duration-300" alt="">
									</div>
									<div class="details py-3">
										<h3 class="text-md font-bold py-2">Details</h3>
										<div class="overflow-x-auto rounded-box border 
											border-base-content/5 bg-base-100">
											<table class="table w-full pt-2 bg-base-100 rounded-lg">
												<tr>
													<th class="border font-medium px-3 py-1 text-sm">Prix</th>
													<td class="border px-3 py-1 price text-sm"><?php echo $car["prix"] ?></td>
												</tr>
												<tr>
													<th class="border font-medium px-3 py-1 text-sm">Moteur</th>
													<td class="border px-3 py-1 year text-sm"><?php echo $car["moteur"] ?></td>
												</tr>
												<tr>
													<th class="border font-medium px-3 py-1 text-sm">Transmission</th>
													<td class="border px-3 py-1 year text-sm"><?php echo $car["transmission"] ?></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div class="footer-card flex gap-y-2 box-border">
									<a href="#" class="btn btn-primary w-1/2 min-h-0 h-8">Essayer</a>
									<a href="#" class="btn w-1/2 min-h-0 h-8 text-secondary">voir plus</a>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<div>
		<?php else: ?>
			<p>Aucune voiture trouvée.</p>
		<?php endif; ?>
	</main>
	<script type="module" src="/supercar/assets/js/navbar.js" defer></script>
</body>
</html>