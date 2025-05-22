<?php if(isset($_SESSION["flash_message"])): ?>
    <div class="fixed top-24 flex justify-center w-full px-6 z-50">
        <div role="alert" class="alert
			<?php if(isset($_SESSION["flash_message"]["type"])){echo $_SESSION["flash_message"]["type"];}?>
			w-full md:w-1/2 lg:w-2/5 flex flex-col md:flex-row justify-between">
            <div class="flex flex-col items-center md:flex-row gap-4">
                <?php
                    require_once ROOT."components/icon-alert.php";
                    ;
                    if(isset($_SESSION["flash_message"]["type"])){
                        $type = $_SESSION["flash_message"]["type"];
                        displayAlertIconByType($type);
                    };
                ?>
                <span class="text-white text-center">
					<?php
                        $message = $_SESSION["flash_message"]["message"];
                        echo $message;
                        unset($_SESSION["flash_message"]);
                    ?>
				</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor"
                     class="size-6 font-bold hover:cursor-pointer remove-alert-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
        </div>
    </div>
<?php endif; ?>