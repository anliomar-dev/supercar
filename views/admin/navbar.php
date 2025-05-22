<div class="navbar bg-base-100 shadow-md px-3 rounded-lg">
    <div class="navbar-start flex flex-col items-start">
        <p class="text-sm">
			<?php echo date("d-m-Y");  ; ?>
		</p>
        <a class="text-md font-bold">Anli Omar</a>
    </div>
    <div class="navbar-end">
        <label for="my-drawer-2" class="btn drawer-button lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </label>
        <div class="dropdown dropdown-left">
            <div tabindex="0" role="button" class="btn btn-ghost rounded-field">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>

            </div>
            <ul
                tabindex="0"
                class="menu dropdown-content bg-base-200 rounded-box z-1 mt-4 w-52 p-2 shadow-sm">
                <li>
                    <input
                        type="radio"
                        name="theme-dropdown"
                        class="theme-controller w-full btn btn-sm btn-ghost justify-start"
                        aria-label="light"
                        value="default" />
                </li>
                <li>
                    <input
                        type="radio"
                        name="theme-dropdown"
                        class="theme-controller w-full btn btn-sm btn-ghost justify-start"
                        aria-label="dark"
                        value="night" />
                </li>
            </ul>
        </div>
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <div class="avatar avatar-placeholder">
                    <div class="bg-neutral text-neutral-content w-8 rounded-full">
                        <span>SY</span>
                    </div>
                </div>
            </div>
            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li>
                    <a href="/supercar/admin/utilisateurs/moi" class="justify-between">
                        Mon Profile
                    </a>
                </li>
                <li><a href="/supercar/admin/logout">Deconnexion</a></li>
            </ul>
        </div>
    </div>
</div>