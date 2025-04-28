<div class="edit-form section w-full flex justify-center bg-base-100 py-10 rounded-lg">
    <form action="" method="POST" class="w-1/2 flex flex-col gap-y-2 bg-base-100 p-5 rounded-lg shadow-md">
        <div class="login-form-title flex justify-center">
            <h2 class="text-xl font-bold font-comic py-4">Ajouter une nouvelle demande</h2>
        </div>
        <input type="hidden" name="action" value="add">
        <div class="fields flex flex-col gap-y-3">
            <!-- /.fields -->
            <div class=" grid grid-cols-1 md:grid-cols-2 gap-3">
                <label class="input input-bordered flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    <input type="date" class="" name="date" required />
                </label>

                <!-- time fieled -->
                <label class="input input-bordered flex items-center gap-2">
                    <input type="time" class="" name="time" required  />
                </label>
            </div>
            <div class=" grid grid-cols-1 md:grid-cols-2 gap-3">
                <select class="select" name="brand" id="brand">
                    <?php if(!empty($all_brands)): ?>
                        <?php foreach($all_brands as $brand): ?>
                            <option value=<?php echo $brand["id_marque"]; ?>><?php echo $brand["nom"]; ?></option>
                        <?php endforeach; ?>
                    <?php endif;?>
                </select>
                <!-- cars -->
                <select class="select input-bordered" id="car"  name="car" required>

                </select>
            </div>
        </div>
        <button class="btn btn-primary min-h-0 h-10 font-bold my-2">Sauvegarder</button>
    </form>
</div>