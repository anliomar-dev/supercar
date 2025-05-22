<?php if(!empty($user_data)): ?>
	<form action="/supercar/admin/utilisateurs/update_profile" method="POST" class="flex flex-col gap-y-2 bg-base-200 p-5 rounded-lg card-body">
		<div class="fields flex flex-col gap-y-3">
			<!-- /.fields -->
			<div class=" grid grid-cols-1 md:grid-cols-2 gap-3 w-full">
				<label class="input input-bordered flex items-center gap-2 w-full">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
						<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
					</svg>
					<input type="text" placeholder="Prenom" name="prenom" required
						   title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$" class="grow"
						   value="<?php echo $user_data["prenom"]; ?>"
					/>
				</label>
				<label class="input input-bordered flex items-center gap-2 w-full">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
						<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
					</svg>
					<input type="text" placeholder="Nom de famille" name="nom" required
						   title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$" class="grow"
						   value="<?php echo $user_data["nom"]; ?>"
					/>
				</label>
			</div>

			<!--email and phone-->
			<div class="phone-email-fields grid grid-cols-1 md:grid-cols-2 gap-3 w-full">
				<label class="input input-bordered flex items-center gap-2 w-full">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
						<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
					</svg>
					<input type="text" placeholder="Téléphone" name="phone" required pattern="^\+\d{1,4}(\s?\d{7,12})+$"
						   title="Le numéro doit être au format international. exp: +230 5429 7857" class="grow"
						   value="<?php echo $user_data["telephone"]; ?>"
					/>
				</label>
				<label class="input input-bordered flex items-center gap-2 w-full">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 opacity-70 text-secondary">
						<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
					</svg>
					<input type="email" class="grow" placeholder="Email" required name="email"  value="<?php echo $user_data["email"]; ?>" />
				</label>
			</div>

			<!-- /.adresse -->
			<div class="adresse w-full grid grid-cols-1">
				<label class="input input-bordered flex items-center gap-2 w-full">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none"
						 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
						<path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
						<path stroke-linecap="round" stroke-linejoin="round"
							  d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
					</svg>
					<input type="text" placeholder="Adresse" name="address" required title="minimum 5 caractères"
						   pattern="^(?!\s*$).{2,}$" class="grow"  value="<?php echo $user_data["adresse"]; ?>" />
				</label>
			</div>
		</div>
		<button class="btn btn-primary min-h-0 h-10 font-bold my-2">Sauvegarder</button>
		<a href="/supercar/admin/utilisateurs/moi" class="btn min-h-0 h-10 font-bold my-2">Annuler</a>
	</form>
<?php endif; ?>