<?php if(!empty($current_user)) :?>
	<div class="add-form section w-full flex justify-center bg-base-100 py-10 rounded-lg">
		<form action="/supercar/admin/utilisateurs/update/" method="POST" class="w-1/2 flex flex-col gap-y-2 bg-base-100 p-5 rounded-lg shadow-md">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id_utilisateur" value="<?php echo $current_user["id_utilisateur"]; ?>">
			<div class="login-form-title flex justify-center">
				<h2 class="text-xl font-bold font-comic py-4">
                    <?php echo $current_user["nom"] . " "; ?>
					<?php echo $current_user["prenom"]; ?>
				</h2>
			</div>

			<div class="fields flex flex-col gap-y-3">
				<!-- /.fullname-fields -->
				<div class="grid grid-cols-1 md:grid-cols-2 gap-3">
					<fieldset class="fieldset bg-base-100 border-base-300 rounded-box w-64 border p-4">
						<legend class="fieldset-legend">Est admin</legend>
						<label class="label">
                            <?php if($current_user["est_admin"] === 1): ?>
								<input type="checkbox" class="checkbox" checked="checked" value="1" name="est-admin" />
                            <?php else: ?>
								<input type="checkbox" class="checkbox" value="1" name="est-admin" />
                            <?php endif; ?>
							Peut accèder l'interface admin ?
						</label>
					</fieldset>
					<fieldset class="fieldset bg-base-100 border-base-300 rounded-box w-64 border p-4">
						<legend class="fieldset-legend">Est super-admin</legend>
						<label class="label">
							<?php if($current_user["est_superadmin"] === 1): ?>
								<input type="checkbox" class="checkbox" checked value="1" name="est-superadmin" />
							<?php else: ?>
								<input type="checkbox" class="checkbox" value="1" name="est-superadmin" />
							<?php endif; ?>
							Est super-utilisateur ?
						</label>
					</fieldset>
				</div>
				<div class="fullname-fields grid grid-cols-1 md:grid-cols-2 gap-3">
					<label class="input input-bordered flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
						</svg>
						<input type="text" placeholder="Prenom" name="firstname" value="<?php echo $current_user["prenom"]; ?>" required title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$" class="grow" />
					</label>
					<label class="input input-bordered flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
						</svg>
						<input type="text" placeholder="Nom" name="lastname" value="<?php echo $current_user["nom"]; ?>" required title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$" class="grow" />
					</label>
				</div>

				<!-- /.adresse -->
				<div class="adresse w-full">
					<label class="input input-bordered flex items-center gap-2 w-full">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none"
							 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
							<path stroke-linecap="round" stroke-linejoin="round"
								  d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
						</svg>
						<input type="text" placeholder="Adresse" name="address" value="<?php echo $current_user["adresse"]; ?>" required title="minimum 5 caractères" pattern="^(?!\s*$).{2,}$" class="grow" />
					</label>
				</div>

				<!-- phone and email form group -->
				<div class="phone-email-fields grid grid-cols-1 md:grid-cols-2 gap-3">
					<label class="input input-bordered flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
							<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
						</svg>
						<input type="text" placeholder="Téléphone" name="phone" value="<?php echo $current_user["telephone"]; ?>" required pattern="^\+\d{1,4}(\s?\d{7,12})+$"
							   title="Le numéro doit être au format international. exp: +230 5429 7857" class="grow" />
					</label>
					<label class="input input-bordered flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 opacity-70 text-secondary">
							<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
						</svg>
						<input type="email" class="grow" placeholder="Email" required name="email" value="<?php echo $current_user["email"]; ?>" />
					</label>
				</div>

				<!-- passwords and confirm password form group -->
				<div class="password-fields grid grid-cols-1 md:grid-cols-2 gap-3">
					<label class="input input-bordered flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 opacity-70 text-secondary">
							<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
						</svg>

						<!-- input password filed -->
						<input type="password" placeholder="Mot de passe" name="password"
							   class="grow password-field" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
							   title="Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule, un chiffre, et un caractère spécial."
						/>

						<!-- show password-->
						<svg xmlns="http://www.w3.org/2000/svg" fill="none"
							 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
							 class="size-6 hover:text-secondary hover:cursor-pointer toggle-password-svg"
							 data-password-input-type="text">
							<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
							<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
						</svg>

						<!-- hide password-->
						<svg xmlns="http://www.w3.org/2000/svg" fill="none"
							 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
							 class="size-6 hover:text-secondary hover:cursor-pointer hidden toggle-password-svg"
							 data-password-input-type="password">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
						</svg>
					</label>
					<label class="input input-bordered flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 opacity-70 text-secondary">
							<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
						</svg>
						<!-- input password filed -->
						<input type="password" placeholder="Mot de passe" name="confirm_password"
							   class="grow password-field" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
							   title="Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule, un chiffre, et un caractère spécial."
						/>

						<!-- show password-->
						<svg xmlns="http://www.w3.org/2000/svg" fill="none"
							 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
							 class="size-6 hover:text-secondary hover:cursor-pointer toggle-password-svg"
							 data-password-input-type="text">
							<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
							<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
						</svg>

						<!-- hide password-->
						<svg xmlns="http://www.w3.org/2000/svg" fill="none"
							 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
							 class="size-6 hover:text-secondary hover:cursor-pointer hidden toggle-password-svg"
							 data-password-input-type="password">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
						</svg>
					</label>
				</div>
			</div>
			<button class="btn btn-primary min-h-0 h-10 font-bold my-2">Sauvegarder</button>
		</form>
	</div>
<?php endif; ?>
