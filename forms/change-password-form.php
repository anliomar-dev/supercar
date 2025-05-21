<form action="" method="POST" class="flex flex-col gap-y-2 bg-base-200 p-5 rounded-lg card-body">
    <div class="fields flex flex-col gap-y-3">

		<!-- change password section -->
		<div class="flex justify-center pt-4"><h3 class="text-lg">Changer le mot de passe</h3></div>
		<!-- old password -->
		<div class="password-fields grid grid-cols-1 gap-3 w-full">
			<label class="input input-bordered flex items-center gap-2 w-full">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 opacity-70 text-secondary">
					<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
				</svg>
				<!-- input password filed -->
				<input type="password" placeholder="Ancien mot de passe" name="old_password"
					   required class="grow password-field" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
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

		<!-- new password -->
		<div class="password-fields grid grid-cols-1 md:grid-cols-2 gap-3 w-full">
			<label class="input input-bordered flex items-center gap-2 w-full">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 opacity-70 text-secondary">
					<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
				</svg>

				<!-- input password filed -->
				<input type="password" placeholder="Nouveau" name="password"
					   required class="grow password-field" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
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
			<label class="input input-bordered flex items-center gap-2 w-full">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 opacity-70 text-secondary">
					<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
				</svg>
				<!-- input password filed -->
				<input type="password" placeholder="Confirmer" name="confirm_password"
					   required class="grow password-field" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
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
    <a href="/supercar/admin/utilisateurs/moi" class="btn min-h-0 h-10 font-bold my-2">Annuler</a>
</form>
