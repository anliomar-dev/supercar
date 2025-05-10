<div class="w-full flex justify-center bg-base-100 py-10 rounded-lg">
    <form action="/supercar/admin/voitures/create" method="POST" class="w-1/2 flex flex-col gap-y-2 bg-base-100 p-5 rounded-lg shadow-md">
        <div class="login-form-title flex justify-center">
            <h2 class="text-xl font-bold font-comic py-4">Ajouter une nouvelle voiture</h2>
        </div>
        <div class="fields flex flex-col gap-y-3">
            <!-- /.fields -->
            <div class=" grid grid-cols-1 md:grid-cols-2 gap-3">
                <label class="input input-bordered flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>
                    <input type="text" placeholder="Nom du modèle" name="nom" required title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$" class="grow" />
                </label>
                <select class="select" name="id_marque">
                    <option disabled selected value="">Veuillez choisir une marque</option>
                    <?php if(!empty($all_brands)): ?>
						<?php foreach($all_brands as $brand): ?>
							<option value=<?php echo $brand["id_marque"]; ?>>
								<?php echo $brand["nom"]; ?>
							</option>
						<?php endforeach; ?>
					<?php endif;?>
                </select>
            </div>

            <div class="grid grid-cols-1 gap-3 w-full">
                <label class="input input-bordered flex items-center gap-2 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 7.756a4.5 4.5 0 1 0 0 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <input type="number" placeholder="Prix" name="prix" min="1" required title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$" class="grow" />
                </label>
            </div>

            <!-- /.fields -->
            <div class=" grid grid-cols-1 md:grid-cols-2 gap-3">
                <select class="select" name="moteur">
                    <option disabled selected value="">Moteur (hybride, éléctrique, à combustion)</option>
                    <option value="Electrique">Eléctrique</option>
                    <option value="Combustion">Combustion</option>
                    <option value="Hybride">Hybride</option>
                </select>
                <select class="select" name="transmission">
                    <option disabled selected value="">Transmissions (Auto, Manuelle)</option>
                    <option value="Automatique">Automatique</option>
                    <option value="Manuelle">Manuelle</option>
                </select>
            </div>

            <!-- /.fields -->
            <div class=" grid grid-cols-1 md:grid-cols-2 gap-3">
                <select class="select" name="carburant">
                    <option disabled selected value="">Carburant (Essence, Diesel)</option>
                    <option value="Essence">Essence</option>
                    <option value="Diesel">Diesel</option>
                </select>
                <label class="input input-bordered flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                    </svg>
                    <input type="number" placeholder="Année" name="annee" min="1990" step="1" required title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$" class="grow" />
                </label>
            </div>

            <fieldset class="fieldset w-full">
                <legend class="fieldset-legend">Description</legend>
                <label>
                    <textarea class="textarea h-24 w-full" placeholder="Description" name="description" required></textarea>
                </label>
            </fieldset>
        </div>
        <button class="btn btn-primary min-h-0 h-10 font-bold my-2">Ajouter</button>
    </form>
</div>