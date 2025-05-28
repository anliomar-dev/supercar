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
    <script src="/supercar/assets/js/admin/base.js" type="module" defer></script>
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
        <div class="section w-full grid grid-cols-1 lg:grid-cols-2 gap-10 justify-center bg-base-100 py-10 rounded-lg p-6 mt-10">
            <!--PROFILE CARD-->
            <div class="card bg-base-200 shadow-sm p-4">
                <div class="w-full flex justify-center">
                    <figure class="w-[100px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </figure>
                </div>
                <?php include_once (ROOT.'forms/update-current-user-form.php'); ?>
            </div>

            <!--CHANGE PASSWORD CARD-->
            <div class="card bg-base-200 shadow-sm p-4">
                <div class="w-full flex justify-center">
                    <figure class="w-[100px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                        </svg>
                    </figure>
                </div>
                <?php include_once (ROOT.'forms/change-password-form.php'); ?>
            </div>

            <!-- Suppression -->
			<!--<div class="card bg-base-200 max-w-96">
                <div class="card-body items-center text-center">
                    <h2 class="card-title text-red-700">Supprimer mon compte</h2>
                    <p class="text-sm text-gray-700 mt-2">
                        Cette action est <span class="font-semibold text-red-600">irréversible</span>. Votre compte, ainsi que toutes vos données, seront définitivement supprimés.
                    </p>
                    <div class="card-actions justify-center pt-3">
                        <button class="btn btn-error" onclick="my_modal_1.showModal()">Supprimer</button>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay z-10"></label>
    <?php include_once ("sidebar.php");?>
</div>

<!--delete account confirmaion modal-->
<dialog id="my_modal_1" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold flex justify-center">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-error">
				<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
			</svg>
		</h3>
        <p class="py-4 text-center">Veuillez confirmer la suppression de votre compte?</p>
        <div class="modal-action flex justify-center">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn btn-primary">Annuler</button>
                <a href="/supercar/admin/utilisateurs/supprimer_mon_compte" class="btn btn-error btn-outline" type="button">Supprimer</a>
            </form>
        </div>
    </div>
</dialog>
</body>
</html>
