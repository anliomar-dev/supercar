<?php if(!empty($current_event)): ?>
    <div class="edit-form section w-full grid grid-cols-1 lg:grid-cols-2 justify-center  gap-3 bg-base-100 py-10 rounded-lg p-4">
        <form action="" method="POST" class="flex flex-col gap-y-2 bg-base-100 p-5 rounded-lg shadow-md">
            <div class="login-form-title flex justify-center">
                <h2 class="text-xl font-bold font-comic py-4">Ajouter un nouvel Evennement</h2>
            </div>
            <input type="hidden" name="action" value="edit">
            <div class="fields flex flex-col">
                <!-- /.fields -->
                <!-- tittre et emplacement de l'évennement-->
                <div class=" grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
                        <input type="text" class="" placeholder="Titre" name="titre" value="<?php echo $current_event["titre"]; ?>"
                               required title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$"
                        />
                    </label>
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 opacity-70 text-secondary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
                        <input type="text" class="" placeholder="Emplacement(adresse valide)" value="<?php echo $current_event["location"]; ?>"
                               name="location" required title="minimum 2 caractères" pattern="^(?!\s*$).{2,}$"
                        />
                    </label>
                </div>

                <!-- lien de l'image -->
                <div class="fullname grid grid-cols-1 gap-3 w-full">
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
                            value="<?php echo $current_event["image"]; ?>"
                            pattern="^(https?://)?([a-zA-Z0-9]([a-zA-Z0-9\-].*[a-zA-Z0-9])?\.)+[a-zA-Z].*$"
                            title="Must be valid URL"
                        />
                    </label>
                    <p class="validator-hint">Must be valid URL</p>
                </div>

                <!-- date de début et fin de l'évennemenr-->
                <div class=" grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Début</legend>
                        <input type="date" class="input" name="date_debut"
                               value="<?php echo $current_event["date_debut"]; ?>"  required
                        />
                    </fieldset>

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Fin de l'évennement</legend>
                        <input type="date" class="input" name="date_fin" required
                               value="<?php echo $current_event["date_fin"]; ?>"
                        />
                    </fieldset>
                </div>

                <!-- description de l'évennement-->
                <fieldset class="fieldset w-full">
                    <legend class="fieldset-legend">Description</legend>
                    <label>
                            <textarea class="textarea h-24 w-full" name="description" placeholder="Description">
                                value="<?php echo $current_event["description"]; ?>"
                            </textarea>
                    </label>
                </fieldset>
            </div>
            <button class="btn btn-primary min-h-0 h-10 font-bold my-2">Ajouter</button>
        </form>
        <div class="flex items-center">
            <img src="<?php echo $current_event["image"]; ?>" class="rounded-lg" alt="<?php echo 'evennement'. $current_event["titre"]; ?>">
        </div>
    </div>

<?php endif; ?>
