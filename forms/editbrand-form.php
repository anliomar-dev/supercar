<?php if(!empty($current_brand)): ?>
    <div class="edit-form section w-full flex justify-center bg-base-100 py-10 rounded-lg">
        <form action="" method="POST" class="w-1/2 flex flex-col gap-y-2 bg-base-100 p-5 rounded-lg shadow-md">
            <div class="login-form-title flex justify-center">
                <h2 class="text-xl font-bold font-comic py-4">Modifier</h2>
            </div>
			<input type="hidden" name="action" value="edit">
            <div class="flex justify-center w-full">
                <img src="<?php echo $current_brand["logo"]; ?>" class="max-w-[200px]" alt="<?php echo 'logo '. $current_brand["logo"]; ?>">
            </div>
            <div class="fields flex flex-col gap-y-3">
                <!-- /.fields -->
                <div class="fullname-fields grid grid-cols-1 md:grid-cols-2 gap-3">
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                        </svg>
                        <input type="text" placeholder="nom de la marque" name="nom_marque" value="<?php echo $current_brand["nom"]; ?>" required title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$" class="grow" />
                    </label>
                    <label class="input validator">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71">
                                </path>
                                <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></g>
                        </svg>
                        <input type="url" name="logo" value="<?php echo $current_brand["logo"]; ?>" required placeholder="url du logo: https://..." pattern="^(https?://)?([a-zA-Z0-9]([a-zA-Z0-9\-].*[a-zA-Z0-9])?\.)+[a-zA-Z].*$" title="Must be valid URL" />
                    </label>
                    <p class="validator-hint">Must be valid URL</p>
                </div>
            </div>
            <button class="btn btn-primary min-h-0 h-10 font-bold my-2">Sauvegarder</button>
        </form>
    </div>
<?php endif; ?>

