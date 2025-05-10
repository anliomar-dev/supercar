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
	<title>Utilisateurs</title>
	<style>
        .drawer-side {
            overflow: auto;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* IE et Edge */
        }

        .drawer-side::-webkit-scrollbar {
            display: none; /* Chrome, Safari et Edge */
        }
	</style>
</head>
<body class="relative bg-base-200">
<?php require_once ROOT."components/flash-message.php"?>
<div class="drawer lg:drawer-open">
	<input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
	<div class="drawer-content flex flex-col items-center px-3 lg:px-8 py-4">
		<!-- Page content here -->
		<?php include_once ("navbar.php");?>
		<div class="flex justify-between items-center w-full mt-5 py-3">
            <?php if(isset($_GET["user"])): ?>
				<div class="join">
					<a href="/supercar/admin/utilisateurs" class="btn btn-accent btn-outline rounded-lg">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
						</svg>
						liste des utilisateurs
					</a>
				</div>
            <?php else: ?>
				<div class="join">
					<?php if(str_ends_with($_SERVER["REQUEST_URI"], "create")): ?>
						<a href="/supercar/admin/utilisateurs" class="btn join-item">Utilisateurs</a>
						<a href="/supercar/admin/utilisateurs/create" class="btn btn-primary join-item">Ajouter</a>
					<?php else:?>
						<a href="/supercar/admin/utilisateurs" class="btn btn-primary join-item">Utilisateurs</a>
						<a href="/supercar/admin/utilisateurs/create" class="btn join-item">Ajouter</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
        <?php if(isset($paginated_users["data"])): ?>
			<form class="overflow-x-auto w-full bg-base-100 rounded-lg shadow-sm section list-form px-3">
				<table class="table">
					<!-- head -->
					<thead>
					<tr>
						<th>Nom et Prenom</th>
						<th>Email</th>
						<th>Telephone</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach($paginated_users["data"] as $user): ?>
							<tr>
								<td>
									<div class="flex items-center gap-3">
										<div class="avatar avatar-placeholder">
											<div class="mask mask-squircle bg-neutral text-neutral-content w-10 ">
												<span>
													<?php echo strtoupper($user["nom"][0]) . strtoupper($user["prenom"][0]); ?>
												</span>
											</div>
										</div>
										<div>
											<div class="font-bold"><?php echo ucfirst($user["nom"]); ?></div>
											<div class="text-sm opacity-50"><?php echo ucfirst($user["prenom"]); ?></div>
										</div>
									</div>
								</td>
								<td>
									<span><?php echo $user["email"]; ?></span>
								</td>
								<td><?php echo $user["telephone"]; ?></td>
								<th>
									<a class="btn btn-ghost btn-xs" href="/supercar/admin/utilisateurs?user=<?php echo $user["id_utilisateur"]; ?>">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary">
											<path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
										</svg>
									</a>
									<a class="btn btn-ghost btn-xs" href="/supercar/admin/utilisateurs?user=<?php echo $user["id_utilisateur"]; ?>">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-error">
											<path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
										</svg>
									</a>
								</th>
							</tr>
							<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
					<!-- foot -->
					<tfoot>
						<tr>
							<td colspan="4">
								<div class="flex justify-end p-4">
									<!-- Pagination -->
									<?php if($paginated_users["total_page"] > 0):?>
										<div class="join">
											<!--prev button-->
											<?php if(empty($prev_url)):?>
												<a class="join-item btn btn-primary disabled" disabled>«</a>
											<?php else: ?>
												<a href="<?php echo $prev_url; ?>" class="join-item btn btn-primary">«</a>
											<?php endif; ?>

											<a class="join-item btn btn-primary text-white">
												<?php echo $paginated_users["current_page"]; ?>/<?php echo $paginated_users["total_page"]; ?>
											</a>

											<!--next button-->
											<?php if(empty($next_url)):?>
												<a class="join-item btn btn-primary disabled" disabled>»</a>
											<?php else: ?>
												<a href="<?php echo $next_url; ?>" class="join-item btn btn-primary">»</a>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</div>
							</td>
						</tr>
					</tfoot>
				</table>
			</form>
        <?php elseif(isset($current_user)): ?>
			<?php if(!empty($current_user)):?>
				<!--edit form -->
                <?php include_once (ROOT.'forms/edituser-form.php'); ?>
            <?php else: ?>
				<?php echo "404 Not Found"; ?>
			<?php endif;?>
		<?php else: ?>
			<!-- add form -->
            <?php include_once (ROOT.'forms/adduser-form.php'); ?>
        <?php endif; ?>
	</div>
	<label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay z-10"></label>
    <?php include_once ("sidebar.php");?>
</div>
</body>
</html>
