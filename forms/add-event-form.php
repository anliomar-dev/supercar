<div class="section w-full flex justify-center bg-base-100 py-10 rounded-lg">
    <form action="" method="POST" class="w-1/2 flex flex-col gap-y-2 bg-base-100 p-5 rounded-lg shadow-md">
        <div class="login-form-title flex justify-center">
            <h2 class="text-xl font-bold font-comic py-4">Ajouter un nouvel Evennement</h2>
        </div>
        <div class="fields flex flex-col">
            <!-- /.fields -->
			<!-- tittre et emplacement de l'évennement-->
			<div class=" grid grid-cols-1 md:grid-cols-2 gap-3">
				<label class="input input-bordered flex items-center gap-2">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
						<path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
						<path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
					</svg>
					<input type="text" class="" placeholder="Titre" name="titre" required title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$" />
				</label>
				<label class="input input-bordered flex items-center gap-2">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
						<path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
						<path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
					</svg>
					<input type="text" class="" placeholder="Emplacement(adresse valide)" name="location" required title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$" />
				</label>
			</div>

			<!-- lien de l'image -->
			<div class="fullname grid grid-cols-1 gap-3 w-full pt-4">
				<label class="input validator w-full">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
						<path
							stroke-linecap="round" stroke-linejoin="round"
							d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
					</svg>
					<input
						type="url"
						required
						name="event-img-url"
						placeholder="https://"
						value="https://url de l'image"
						pattern="^(https?://)?([a-zA-Z0-9]([a-zA-Z0-9\-].*[a-zA-Z0-9])?\.)+[a-zA-Z].*$"
						title="Must be valid URL"
					/>
				</label>
				<p class="validator-hint">Must be valid URL</p>
			</div>

			<!-- date de début et fin de l'évennemenr-->
            <div class=" grid grid-cols-1 md:grid-cols-2 gap-3">
				<fieldset class="fieldset">
					<legend class="fieldset-legend">Début</legend>
					<input type="date" class="input" name="date_debut" required />
				</fieldset>

				<fieldset class="fieldset">
					<legend class="fieldset-legend">Fin de l'évennement</legend>
					<input type="date" class="input" name="date_fin" required />
				</fieldset>
            </div>

			<!-- description de l'évennement-->
			<fieldset class="fieldset w-full pt-4">
				<legend class="fieldset-legend">Description</legend>
				<label>
                        <textarea class="textarea h-24 w-full" name="description" placeholder="Description"></textarea>
				</label>
			</fieldset>
        </div>
        <button class="btn btn-primary min-h-0 h-10 font-bold my-2">Ajouter</button>
    </form>
</div>
