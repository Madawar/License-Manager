 <li x-data="{ {{ request()->routeIs('department.*') ? 'open: true' : 'open: false' }}}"
     @click.away="{{ request()->routeIs('department.*') ? 'open = true' : 'open = false' }}">
     <a @click="open = true">
         <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                 d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
         </svg>
         Departments
     </a>
     <ul class="menu" x-show="open" x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-700"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90">
         <li>
             <a href="{{ action([DepartmentController::class, 'create']) }}">
                 <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                 </svg>
                 Create Department

             </a>
         </li>
         <li>
             <a href="{{ action([DepartmentController::class, 'index']) }}">

                 <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                 </svg>
                 View Departments

             </a>
         </li>
     </ul>
 </li>

 <div>
     <p class="sidebar-header">
        Department
     </p>
     <a class="sidebar-item {{ request()->routeIs('department.*') ? 'bg-gray-100' : '' }}"
         href="{{ route('department.index']) }}">
         <span class="text-left">
             <svg class="h-6 w-6" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg">
                 <g id="Filled_Outline" data-name="Filled Outline">
                     <circle cx="21" cy="12" fill="#36474f" r="9" />
                     <path d="m10 46h22v12h-22z" fill="#bbdefb" />
                     <path
                         d="m39 48v-16a9 9 0 0 0 -9-9h-2.08a12.972 12.972 0 0 1 -13.84 0h-2.08a9 9 0 0 0 -9 9v12a4 4 0 0 0 4 4z"
                         fill="#bbdefb" />
                     <path d="m26 48h-8l-11.86-22.82a8.92 8.92 0 0 1 5.86-2.18h1z" fill="#e0e0e0" />
                     <path
                         d="m48 61a20.877 20.877 0 0 1 -13-19.156v-11.844a36.076 36.076 0 0 0 13-4 36.07 36.07 0 0 0 13 4v11.844a20.877 20.877 0 0 1 -13 19.156z"
                         fill="#ffd54f" />
                     <path d="m48 26v35a20.877 20.877 0 0 0 13-19.156v-11.844a36.07 36.07 0 0 1 -13-4z"
                         fill="#ffc108" />
                     <path
                         d="m21 22a10 10 0 1 0 -10-10 10.011 10.011 0 0 0 10 10zm0-18a8 8 0 1 1 -8 8 8.009 8.009 0 0 1 8-8z" />
                     <path d="m20 29h2v2h-2z" />
                     <path
                         d="m61.109 29.006a34.916 34.916 0 0 1 -12.639-3.889 1 1 0 0 0 -.94 0 34.916 34.916 0 0 1 -12.639 3.889 1 1 0 0 0 -.891.994v11.845a21.816 21.816 0 0 0 13.615 20.078 1 1 0 0 0 .77 0 21.816 21.816 0 0 0 13.615-20.078v-11.845a1 1 0 0 0 -.891-.994zm-1.109 12.839a19.805 19.805 0 0 1 -12 18.067 19.805 19.805 0 0 1 -12-18.067v-10.96a36.882 36.882 0 0 0 12-3.756 36.874 36.874 0 0 0 12 3.756z" />
                     <path d="m39.618 41.2-1.418 1.417 6 6a1 1 0 0 0 1.414 0l12-12-1.414-1.417-11.289 11.3z" />
                     <path
                         d="m27 39h-4.553l-7.478-14.38a14.22 14.22 0 0 0 13.231-.62h1.8a7.958 7.958 0 0 1 5.992 2.739c.749-.114 1.49-.258 2.225-.422a9.984 9.984 0 0 0 -8.217-4.317h-2.08a1.008 1.008 0 0 0 -.534.154 12.159 12.159 0 0 1 -12.772 0 1.008 1.008 0 0 0 -.534-.154h-2.08a10.011 10.011 0 0 0 -10 10v12a5.006 5.006 0 0 0 5 5h3v9h2v-9h15a5 5 0 0 0 0-10zm-20 8a3 3 0 0 1 -3-3v-12a7.958 7.958 0 0 1 1.88-5.141l6.313 12.141h-2.193v2h3.233l3.12 6zm11.607 0-11.2-21.539a7.945 7.945 0 0 1 4.593-1.461h.393l11.96 23zm8.393 0h-.393l-3.12-6h3.513a3 3 0 0 1 0 6z" />
                 </g>
             </svg>
         </span>
         <span class="mx-4 text-md font-normal">
            Departments
         </span>
         <span class="flex-grow text-right">
             <a href="{{ route('department.create']) }}" class="w-6 h-6 text-xs  rounded-full text-white bg-red-500">
                 <span class="p-1">
                    <svg class="h-6 w-6" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                        .st0{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;}
                    </style><path class="st0" d="M31,16c0,8.284-6.716,15-15,15S1,24.284,1,16S7.716,1,16,1S31,7.716,31,16z M16,5.097v21.988 M26.994,16.091  H5.006"/></svg>
                </span>
             </button>
         </span>
     </a>

 </div>
 <li x-data="{ {{ request()->routeIs('license.*') ? 'open: true' : 'open: false' }}}"
     @click.away="{{ request()->routeIs('license.*') ? 'open = true' : 'open = false' }}">
     <a @click="open = true">
         <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                 d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
         </svg>
         Licenses
     </a>
     <ul class="menu" x-show="open" x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-700"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90">
         <li>
             <a href="{{ action([LicenseController::class, 'create']) }}">
                 <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                 </svg>
                 Create License

             </a>
         </li>
         <li>
             <a href="{{ action([LicenseController::class, 'index']) }}">

                 <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                 </svg>
                 View Licenses

             </a>
         </li>
     </ul>
 </li>

 <div>
     <p class="sidebar-header">
        License
     </p>
     <a class="sidebar-item {{ request()->routeIs('license.*') ? 'bg-gray-100' : '' }}"
         href="{{ route('license.index']) }}">
         <span class="text-left">
             <svg class="h-6 w-6" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg">
                 <g id="Filled_Outline" data-name="Filled Outline">
                     <circle cx="21" cy="12" fill="#36474f" r="9" />
                     <path d="m10 46h22v12h-22z" fill="#bbdefb" />
                     <path
                         d="m39 48v-16a9 9 0 0 0 -9-9h-2.08a12.972 12.972 0 0 1 -13.84 0h-2.08a9 9 0 0 0 -9 9v12a4 4 0 0 0 4 4z"
                         fill="#bbdefb" />
                     <path d="m26 48h-8l-11.86-22.82a8.92 8.92 0 0 1 5.86-2.18h1z" fill="#e0e0e0" />
                     <path
                         d="m48 61a20.877 20.877 0 0 1 -13-19.156v-11.844a36.076 36.076 0 0 0 13-4 36.07 36.07 0 0 0 13 4v11.844a20.877 20.877 0 0 1 -13 19.156z"
                         fill="#ffd54f" />
                     <path d="m48 26v35a20.877 20.877 0 0 0 13-19.156v-11.844a36.07 36.07 0 0 1 -13-4z"
                         fill="#ffc108" />
                     <path
                         d="m21 22a10 10 0 1 0 -10-10 10.011 10.011 0 0 0 10 10zm0-18a8 8 0 1 1 -8 8 8.009 8.009 0 0 1 8-8z" />
                     <path d="m20 29h2v2h-2z" />
                     <path
                         d="m61.109 29.006a34.916 34.916 0 0 1 -12.639-3.889 1 1 0 0 0 -.94 0 34.916 34.916 0 0 1 -12.639 3.889 1 1 0 0 0 -.891.994v11.845a21.816 21.816 0 0 0 13.615 20.078 1 1 0 0 0 .77 0 21.816 21.816 0 0 0 13.615-20.078v-11.845a1 1 0 0 0 -.891-.994zm-1.109 12.839a19.805 19.805 0 0 1 -12 18.067 19.805 19.805 0 0 1 -12-18.067v-10.96a36.882 36.882 0 0 0 12-3.756 36.874 36.874 0 0 0 12 3.756z" />
                     <path d="m39.618 41.2-1.418 1.417 6 6a1 1 0 0 0 1.414 0l12-12-1.414-1.417-11.289 11.3z" />
                     <path
                         d="m27 39h-4.553l-7.478-14.38a14.22 14.22 0 0 0 13.231-.62h1.8a7.958 7.958 0 0 1 5.992 2.739c.749-.114 1.49-.258 2.225-.422a9.984 9.984 0 0 0 -8.217-4.317h-2.08a1.008 1.008 0 0 0 -.534.154 12.159 12.159 0 0 1 -12.772 0 1.008 1.008 0 0 0 -.534-.154h-2.08a10.011 10.011 0 0 0 -10 10v12a5.006 5.006 0 0 0 5 5h3v9h2v-9h15a5 5 0 0 0 0-10zm-20 8a3 3 0 0 1 -3-3v-12a7.958 7.958 0 0 1 1.88-5.141l6.313 12.141h-2.193v2h3.233l3.12 6zm11.607 0-11.2-21.539a7.945 7.945 0 0 1 4.593-1.461h.393l11.96 23zm8.393 0h-.393l-3.12-6h3.513a3 3 0 0 1 0 6z" />
                 </g>
             </svg>
         </span>
         <span class="mx-4 text-md font-normal">
            Licenses
         </span>
         <span class="flex-grow text-right">
             <a href="{{ route('license.create']) }}" class="w-6 h-6 text-xs  rounded-full text-white bg-red-500">
                 <span class="p-1">
                    <svg class="h-6 w-6" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                        .st0{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;}
                    </style><path class="st0" d="M31,16c0,8.284-6.716,15-15,15S1,24.284,1,16S7.716,1,16,1S31,7.716,31,16z M16,5.097v21.988 M26.994,16.091  H5.006"/></svg>
                </span>
             </button>
         </span>
     </a>

 </div>
 <li x-data="{ {{ request()->routeIs('user.*') ? 'open: true' : 'open: false' }}}"
     @click.away="{{ request()->routeIs('user.*') ? 'open = true' : 'open = false' }}">
     <a @click="open = true">
         <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                 d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
         </svg>
         Users
     </a>
     <ul class="menu" x-show="open" x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-700"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90">
         <li>
             <a href="{{ action([UserController::class, 'create']) }}">
                 <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                 </svg>
                 Create User

             </a>
         </li>
         <li>
             <a href="{{ action([UserController::class, 'index']) }}">

                 <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                 </svg>
                 View Users

             </a>
         </li>
     </ul>
 </li>

 <div>
     <p class="sidebar-header">
        User
     </p>
     <a class="sidebar-item {{ request()->routeIs('user.*') ? 'bg-gray-100' : '' }}"
         href="{{ route('user.index']) }}">
         <span class="text-left">
             <svg class="h-6 w-6" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg">
                 <g id="Filled_Outline" data-name="Filled Outline">
                     <circle cx="21" cy="12" fill="#36474f" r="9" />
                     <path d="m10 46h22v12h-22z" fill="#bbdefb" />
                     <path
                         d="m39 48v-16a9 9 0 0 0 -9-9h-2.08a12.972 12.972 0 0 1 -13.84 0h-2.08a9 9 0 0 0 -9 9v12a4 4 0 0 0 4 4z"
                         fill="#bbdefb" />
                     <path d="m26 48h-8l-11.86-22.82a8.92 8.92 0 0 1 5.86-2.18h1z" fill="#e0e0e0" />
                     <path
                         d="m48 61a20.877 20.877 0 0 1 -13-19.156v-11.844a36.076 36.076 0 0 0 13-4 36.07 36.07 0 0 0 13 4v11.844a20.877 20.877 0 0 1 -13 19.156z"
                         fill="#ffd54f" />
                     <path d="m48 26v35a20.877 20.877 0 0 0 13-19.156v-11.844a36.07 36.07 0 0 1 -13-4z"
                         fill="#ffc108" />
                     <path
                         d="m21 22a10 10 0 1 0 -10-10 10.011 10.011 0 0 0 10 10zm0-18a8 8 0 1 1 -8 8 8.009 8.009 0 0 1 8-8z" />
                     <path d="m20 29h2v2h-2z" />
                     <path
                         d="m61.109 29.006a34.916 34.916 0 0 1 -12.639-3.889 1 1 0 0 0 -.94 0 34.916 34.916 0 0 1 -12.639 3.889 1 1 0 0 0 -.891.994v11.845a21.816 21.816 0 0 0 13.615 20.078 1 1 0 0 0 .77 0 21.816 21.816 0 0 0 13.615-20.078v-11.845a1 1 0 0 0 -.891-.994zm-1.109 12.839a19.805 19.805 0 0 1 -12 18.067 19.805 19.805 0 0 1 -12-18.067v-10.96a36.882 36.882 0 0 0 12-3.756 36.874 36.874 0 0 0 12 3.756z" />
                     <path d="m39.618 41.2-1.418 1.417 6 6a1 1 0 0 0 1.414 0l12-12-1.414-1.417-11.289 11.3z" />
                     <path
                         d="m27 39h-4.553l-7.478-14.38a14.22 14.22 0 0 0 13.231-.62h1.8a7.958 7.958 0 0 1 5.992 2.739c.749-.114 1.49-.258 2.225-.422a9.984 9.984 0 0 0 -8.217-4.317h-2.08a1.008 1.008 0 0 0 -.534.154 12.159 12.159 0 0 1 -12.772 0 1.008 1.008 0 0 0 -.534-.154h-2.08a10.011 10.011 0 0 0 -10 10v12a5.006 5.006 0 0 0 5 5h3v9h2v-9h15a5 5 0 0 0 0-10zm-20 8a3 3 0 0 1 -3-3v-12a7.958 7.958 0 0 1 1.88-5.141l6.313 12.141h-2.193v2h3.233l3.12 6zm11.607 0-11.2-21.539a7.945 7.945 0 0 1 4.593-1.461h.393l11.96 23zm8.393 0h-.393l-3.12-6h3.513a3 3 0 0 1 0 6z" />
                 </g>
             </svg>
         </span>
         <span class="mx-4 text-md font-normal">
            Users
         </span>
         <span class="flex-grow text-right">
             <a href="{{ route('user.create']) }}" class="w-6 h-6 text-xs  rounded-full text-white bg-red-500">
                 <span class="p-1">
                    <svg class="h-6 w-6" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                        .st0{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;}
                    </style><path class="st0" d="M31,16c0,8.284-6.716,15-15,15S1,24.284,1,16S7.716,1,16,1S31,7.716,31,16z M16,5.097v21.988 M26.994,16.091  H5.006"/></svg>
                </span>
             </button>
         </span>
     </a>

 </div>

