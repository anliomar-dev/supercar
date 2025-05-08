<?php if(!empty($current_image)):?>
    <div class="edit-form section w-full grid grid-cols-1 lg:grid-cols-2 justify-center bg-base-100 py-10 rounded-lg p-6">
        <form action="" method="POST" class="flex flex-col gap-y-2 bg-base-100 p-5 rounded-lg shadow-md">
            <div class="login-form-title flex justify-center">
                <h2 class="text-xl font-bold font-comic py-4">Modifier l'image</h2>
            </div>
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id_image" value="<?php echo $current_image["id_image"]; ?>">
            <div class="fields flex flex-col gap-y-3">
                <!-- /.fields -->
                <div class=" grid grid-cols-1 md:grid-cols-2 gap-3">
                    <select class="select" name="brand" id="brand">
                        <?php if(!empty($all_cars)): ?>
                            <?php foreach($all_cars as $car): ?>
                                <option
                                    value="<?php echo $car["id_modele"]; ?>"
                                    <?php if($current_image["id_modele"] === $car["id_modele"]){echo "selected";} ?>
                                >
                                    <?php echo $car["nom"]; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif;?>
                    </select>
                    <label class="input validator">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path
                                stroke-linecap="round" stroke-linejoin="round"
                                d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <input
                            type="url"
                            required
                            placeholder="https://"
                            value=<?php echo $current_image["url"]; ?>
                            pattern="^(https?://)?([a-zA-Z0-9]([a-zA-Z0-9\-].*[a-zA-Z0-9])?\.)+[a-zA-Z].*$"
                            title="Must be valid URL"
                        />
                    </label>
                    <p class="validator-hint">Must be valid URL</p>
                </div>
                <div class=" grid grid-cols-1 md:grid-cols-2 gap-3">
                    <select class="select" name="type-img" id="type-img">
                        <option
                            value="inside"
                            <?php if($current_image["type"] == "inside"): ?>
                                <option value="inside">Intérieur</option>
                                <option value="outside">Extérieur</option>
                            <?php elseif($current_image["type"] == "outside"): ?>
                                <option value="outside">Extérieur</option>
                                <option value="inside">Intérieur</option>
                            <?php endif; ?>
                        </option>
                    </select>
                    <select class="select" name="color" id="color">
                        <option value="<?php echo $current_image["couleur"]; ?>" >
                            <?php echo ucfirst($current_image["couleur"]); ?>
                        </option>
                        <option value="blue">Blue</option>
                        <option value="red">Red</option>
                        <option value="yellow">Yellow</option>
                        <option value="white">White</option>
                        <option value="black">Black</option>
                        <option value="green">Green</option>
                        <option value="orange">Orange</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-primary min-h-0 h-10 font-bold my-2">Ajouter</button>
        </form>
		<div class="flex items-center">
			<img src="<?php echo $current_image["url"]; ?>" class="rounded-lg" alt="image">
		</div>
    </div>
<?php endif;?>
