<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
	<title>Delete</title>
</head>
    <body class="flex justify-center bg-base-300 h-screen">
        <div class="card bg-base-100 w-96 mt-20 max-h-44 shadow-lg">
            <div class="card-body items-center text-center">
                <h2 class="card-title">Confirmer</h2>
                <?php if(!empty($confirmation_msg)): ?>
                    <p><?php echo $confirmation_msg; ?></p>
                <?php else: ?>
                    <p>voulez-vous vraiment supprimer</p>
                <?php endif; ?>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary" onclick={history.back()}>
                        Annuler
                    </button>
                    <form action="" method="POST">
                        <?php if(!empty($id)): ?>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                        <?php endif; ?>
                        <button class="btn btn-outline btn-error">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>