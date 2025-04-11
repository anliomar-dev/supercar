<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/supercar/assets/css/styles.css">
    <title>Evennements</title>
</head>
	<body>
		<main class="flex justify-center flex-wrap gap-5 py-14 px-8">
			<!--<?php if(isset($events)){var_dump($events);};?>-->
			<?php if(isset($events)): ?>
				<?php foreach($events as $event):?>
					<div class="card bg-base-200 w-96 shadow-sm">
						<figure>
							<img
								src=<?php echo $event["image"];?>
								alt=<?php echo $event["titre"]." image";?> />
						</figure>
						<div class="card-body">
							<h2 class="card-title"><?php echo $event["titre"];?></h2>
							<p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
							<div class="card-actions justify-end">
								<button class="btn btn-primary">Buy Now</button>
							</div>
						</div>
					</div>
					<div class="card bg-base-200 w-96 shadow-sm">
						<figure>
							<img
								src=<?php echo $event["image"];?>
								alt=<?php echo $event["titre"]." image";?> />
						</figure>
						<div class="card-body">
							<h2 class="card-title"><?php echo $event["titre"];?></h2>
							<p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
							<div class="card-actions justify-end">
								<button class="btn btn-primary">Buy Now</button>
							</div>
						</div>
					</div>
					<div class="card bg-base-200 w-96 shadow-sm">
						<figure>
							<img
								src=<?php echo $event["image"];?>
								alt=<?php echo $event["titre"]." image";?> />
						</figure>
						<div class="card-body">
							<h2 class="card-title"><?php echo $event["titre"];?></h2>
							<p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
							<div class="card-actions justify-end">
								<button class="btn btn-primary">Buy Now</button>
							</div>
						</div>
					</div>
					<div class="card bg-base-200 w-96 shadow-sm">
						<figure>
							<img
								src=<?php echo $event["image"];?>
								alt=<?php echo $event["titre"]." image";?> />
						</figure>
						<div class="card-body">
							<h2 class="card-title"><?php echo $event["titre"];?></h2>
							<p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
							<div class="card-actions justify-end">
								<button class="btn btn-primary">Buy Now</button>
							</div>
						</div>
					</div>
					<div class="card bg-base-200 w-96 shadow-sm">
						<figure>
							<img
								src=<?php echo $event["image"];?>
								alt=<?php echo $event["titre"]." image";?> />
						</figure>
						<div class="card-body">
							<h2 class="card-title"><?php echo $event["titre"];?></h2>
							<p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
							<div class="card-actions justify-end">
								<button class="btn btn-primary">Buy Now</button>
							</div>
						</div>
					</div>
                <?php endforeach; ?>
			<?php endif; ;?>
		</main>
		<script type="module" src="/supercar/assets/js/navbar.js" defer></script>
	</body>
</html>
