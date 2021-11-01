    <div class=" bg-white dark:bg-gray-800 border-r  border-gray-100 border-opacity-90 h-full "
        @click.away="open = false" x-data="{ open: false }">
        <div class="flex-shrink-0 px-3 py-1 flex flex-row items-center justify-between">
            <a href="#"
                class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                Hi, <br />

            </a>
            <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline"
                @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="flex flex-col sm:w-full sm:flex-row sm:justify-around md:block"
            :class="{'block': open, 'hidden': !open}">
            <div class="md:w-72 w-full ">
                <nav class=" ">
                    <div>
                        <p class="sidebar-header">
                            License, Certification, Warranty Managment
                        </p>
                        <a class="sidebar-item {{ request()->routeIs('license.*') ? 'bg-gray-100' : '' }}"
                            href="{{ route('license.index') }}">
                            <span class="text-left">
                                <svg class="h-6 w-6 " id="Layer_1" style="enable-background:new 0 0 50 50;"
                                    version="1.1" viewBox="0 0 50 50" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Layer_1_1_">
                                        <path
                                            d="M1,39.117h29v9.766l6-3.6l6,3.6v-9.766h7v-38H1V39.117z M40.265,32.331c-0.09,0.091-0.186,0.175-0.281,0.26   c-0.054,0.048-0.104,0.099-0.16,0.145c-0.062,0.052-0.128,0.096-0.192,0.145c-0.843,0.645-1.859,1.074-2.968,1.197   c-0.018,0.002-0.036,0.006-0.055,0.008c-0.201,0.02-0.405,0.031-0.611,0.031s-0.41-0.011-0.611-0.031   c-0.018-0.002-0.036-0.006-0.055-0.008c-1.109-0.123-2.124-0.552-2.968-1.197c-0.064-0.049-0.13-0.094-0.192-0.145   c-0.055-0.046-0.106-0.097-0.16-0.145c-0.095-0.085-0.19-0.169-0.281-0.26c-1.071-1.084-1.735-2.572-1.735-4.214   c0-3.309,2.691-6,6-6s6,2.691,6,6C42,29.758,41.337,31.246,40.265,32.331z M40,45.351l-4-2.4l-4,2.4v-6.234v-4.07   c0.034,0.02,0.072,0.033,0.107,0.052c0.265,0.148,0.538,0.284,0.82,0.402c0.012,0.005,0.025,0.009,0.038,0.014   c0.937,0.386,1.961,0.602,3.036,0.602s2.099-0.216,3.036-0.602c0.012-0.005,0.025-0.009,0.038-0.014   c0.282-0.118,0.555-0.253,0.82-0.402c0.035-0.019,0.073-0.032,0.107-0.052v4.07v6.234H40z M3,3.117h44v34h-5v-3.726   c1.241-1.41,2-3.253,2-5.274c0-4.411-3.589-8-8-8s-8,3.589-8,8c0,2.021,0.759,3.864,2,5.274v3.726H3V3.117z" />
                                        <rect height="2" width="26" x="12" y="7.117" />
                                        <rect height="2" width="16" x="17" y="13.117" />
                                        <rect height="2" width="11" x="7" y="31.117" />
                                    </g>
                                </svg>
                            </span>
                            <span class="mx-4 text-md font-normal">
                                Licenses
                            </span>
                            <span class="flex-grow text-right">
                                <button href="" class="w-6 h-6 text-xs  rounded-full text-white bg-red-500">
                                    <span class="p-1">

                                    </span>
                                </button>
                            </span>
                        </a>

                    </div>
                </nav>
            </div>
        </div>
    </div>
