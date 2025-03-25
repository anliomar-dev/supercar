<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/supercar/assets/css/styles.css">
	<script src="/supercar/assets/js/dashboard.js" type="module" defer></script>
	<title>Demande d'éssai</title>
</head>
<body>
<div class="w-full h-full flex flex-col items-start
    md:flex-row md:justify-center bg-base-200 py-10 px-6 md:px-0">
	<!-- sidlinks small screen -->
	<div class="border md:hidden w-full my-1">
		<ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-lg z-[1] gap-2 flex flex-row justify-center">
			<li class="">
				<a href="/supercar/dashboard/compte" class="compte">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
						stroke-width="1.5" stroke="currentColor" class="size-5">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
					</svg>
				</a>
			</li>
			<li>
				<a href="/supercar/dashboard/mes_donnees" class="mes_donnees">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
						stroke-width="1.5" stroke="currentColor" class="size-5">
						<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
					</svg>
				</a>
			</li>
			<li>
				<a href="/supercar/dashboard/mes_essais" class="mes_essais">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
					</svg>
				</a>
			</li>
			<li>
				<a href="/supercar/dashboard/demande_essai" class="demande_essai">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
						stroke-width="1.5" stroke="currentColor" class="size-5">
						<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
					</svg>
				</a>
			</li>
			<li>
				<a href="/supercar/authentication/logout">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
							stroke-width="1.5" stroke="currentColor" class="size-5">
						<path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
					</svg>
				</a>
			</li>
		</ul>
	</div>
	<div class="personal-data-page bg-base-100 h-full w-full md:w-[900px] rounded-lg flex border">
		<!-- sidebar -->
		<div class="sidbar-container w-3/12 h-full shadow-lg hidden md:block">
      <?php require_once ROOT . 'components/sidebar.php'; ?>
		</div>
		<div class="personal-data-wrapper p-6 w-full md:w-9/12">
			<div class="persona-data__header w-full flex justify-center">
				<h3 class="text-2xl font-bold">Réserver un essai</h3>
			</div>

			<!-- sform -->
			<div class="form p-4">
				<form action="" method="POST" class="w-auto flex flex-col gap-y-2">
					<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
						<!-- date fieled -->
						<label class="input input-bordered flex items-center gap-2">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
							</svg>
							<input type="date" class="" name="date" required />
						</label>

						<!-- time fieled -->
						<label class="input input-bordered flex items-center gap-2">
							<input type="time" class="" name="time" required  />
						</label>

						<!-- brands -->
						<select class="select input-bordered" name="marque" required>
							<option disabled selected>choisir une marque</option>							
							<?php foreach($all_brands as $brand):?>
								<option value=<?php echo $brand["id_marque"]?>><?php echo $brand["nom"]?></option>
							<?php endforeach; ?>	
						</select>

						<!-- cars -->
						<select class="select input-bordered" name="marque" required>
							<option disabled selected>choisir une voiture</option>							
							<?php foreach($all_brands as $brand):?>
								<option value=<?php echo $brand["id_marque"]?>><?php echo $brand["nom"]?></option>
							<?php endforeach; ?>	
						</select>
					</div>
					<div class="buttons flex gap-x-2">
						<button class="btn btn-primary min-h-0 h-10 w-1/2 md:w-1/3">Sauvegarder</button>
						<button type="reset" class="btn min-h-0 h-10 w-1/2 md:w-1/3">Anuller</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>

