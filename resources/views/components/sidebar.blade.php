<aside
    id="logo-sidebar"
    class="fixed top-0 bg-cover bg-center bg-dprimary left-0 z-40 w-56 h-screen pt-8 transition-transform -translate-x-full border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar"
    style="
        background-image: url('http://iqacs-duck.research-ai.my.id/images/pattern.png');
    "
>
    <div class="h-full pl-5 pr-5 overflow-y-auto dark:bg-gray-800">
        <a class="flex items-center justify-center w-full" href="#">
            <div class="flex-1 flex justify-center items-center">
                <div>
                    <img
                        src="/images/logo.png"
                        class="h-10 w-10 me-3"
                        alt="FlowBite Logo"
                    />
                </div>
                <div class="">
                    <span
                        class="block font-semibold text-lwhite transition-all text-sm duration-200 mr-4 font-inter"
                    >
                        IQACS - ITIK
                    </span>
                </div>
            </div>
        </a>
        <ul class="space-y-2 font-medium text-white mt-8">
            <li>
                <a
                    href="{{ route("dashboard") }}"
                    class="flex items-center p-2 rounded-lg dark:text-white hover:text-orange hover:bg-gray-100 dark:hover:bg-gray-700 group"
                >
                    <i
                        class="ti ti-file-analytics text-2xl text-gray-200 transition duration-75 dark:text-gray-400 group-hover:text-orange dark:group-hover:text-orange"
                    ></i>
                    <span class="ms-3">Monitoring</span>
                </a>
            </li>
            <li>
                <a
                    href="{{ route("dashboard") }}"
                    class="flex items-center p-2 rounded-lg dark:text-white hover:text-orange hover:bg-gray-100 dark:hover:bg-gray-700 group"
                >
                    <i
                        class="ti ti-align-box-left-middle text-2xl text-gray-200 transition duration-75 dark:text-gray-400 group-hover:text-orange dark:group-hover:text-orange"
                    ></i>
                    <span class="ms-3">Rekam Data</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
