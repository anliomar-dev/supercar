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
				<?php foreach($paginatedCars["data"] as $car): ?>
					<div class="card bg-base-100 w-96 shadow-sm">
						<figure>
							<img
								src=<?php echo $car["url_image"] ? $car["url_image"] : "http://localhost/supercar/public/images/no-image.jpg";?>
								alt="Shoes" />
						</figure>
						<div class="card-body">
							<h2 class="card-title">Card Title</h2>
							<p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
							<div class="card-actions justify-end">
								<button class="btn btn-primary">Buy Now</button>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<div>
		<?php else: ?>
			<p>Aucune voiture trouvée.</p>
		<?php endif; ?>
	</main>
</body>
</html>