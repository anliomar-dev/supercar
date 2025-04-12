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
		<?php if(!empty($paginated_cars)): ?>
			<section class="cars px-8 md:px-16 lg:px-28 pt-10 pb-16
				flex flex-col gap-y-4 w-full justify-center"
			>
				<div class="flex justify-center sm:justify-end items-center pb-3 w-full">
					<!-- display all brands so that user can filter cars by brand or diplay theme all-->
					<?php if(!empty($all_brands)):?>
						<div class="dropdown dropdown-bottom dropdown-end">
							<div tabindex="0" role="button" class="btn btn-secondary m-1">
								<?php 
									$title = isset($_GET["marque"])? $_GET["marque"]: "Toutes les voitures"; 
									echo "Filtre ($title)"; 
								?>
							</div>
							<ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
								<li><a href="/supercar/voiture">Toutes</a></li>						
								<?php foreach($all_brands as $brand):?>
									<li>
										<a href=<?php echo '/supercar/voiture?marque='.$brand['nom'];?>> 
											<?php echo $brand["nom"]?>
										</a>
									</li>
								<?php endforeach; ?>	
							</ul>
						</div>
					<?php endif; ?>
					<!--display pagination buttons only if there is data-->
					<?php if($paginated_cars["total_page"] > 0):?>
						<div class="join">
							<!--prev button-->
							<?php if(empty($prev_url) || $prev_url == null):?>
								<a class="join-item btn btn-primary disabled" disabled>«</a>
							<?php else: ?>
								<a href=<?php echo $prev_url; ?> class="join-item btn btn-primary">«</a>
							<?php endif; ?>
						
							<a class="join-item btn btn-primary text-white">
								<?php echo $paginated_cars["current_page"]; ?>/<?php echo $paginated_cars["total_page"]; ?>
							</a>

							<!--next button-->
							<?php if(empty($next_url) || $next_url == null):?>
								<a class="join-item btn btn-primary disabled" disabled>»</a>
							<?php else: ?>
								<a href=<?php echo $next_url; ?> class="join-item btn btn-primary">»</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="cars-container w-full">
					<div class="cars-by-engine">
						<div class="cars grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-6">
							<?php foreach($paginated_cars["data"] as $car): ?>
								<div class="border rounded-xl bg-base-200 shadow-lg max-w-xs px-4 py-4 mx-auto sm:mx-0">
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
			</section>
		<?php endif; ?>
		<?php if(empty($paginated_cars["data"])): ?>
			<div class="w-full flex justify-center items-center pb-52">
				<h1 class="text-primary text-2xl">Aucune voiture trouvée</h1>
			</div>
		<?php endif; ?>
	</main>
	<script type="module" src="/supercar/assets/js/navbar.js" defer></script>
</body>
</html>