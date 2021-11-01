<div class="flex w-full max-w-xs p-4 bg-white">
    <?php use App\Http\Controllers\IncidentController; ?>
    <?php use App\Http\Controllers\DepartmentController; ?>
    <?php use App\Http\Controllers\InsightController; ?>
    <?php use App\Http\Controllers\ChecklistController; ?>
    <?php use App\Http\Controllers\AuditController; ?>
    <?php use App\Http\Controllers\UserController; ?>
    <?php use App\Models\Incident; ?>
    <?php use App\Models\Checklist; ?>
    <?php use App\Models\Audit; ?>
    <ul class="flex flex-col w-full">
        <li class="my-px">
            <a href="{{ action([IncidentController::class, 'index']) }}"
                class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 {{ request()->is('incidents') ? 'bg-gray-100' : '' }} ">
                <span class="flex items-center justify-center text-lg text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                </span>
                <span class="ml-3">Incidents</span>
                <span
                    class="flex items-center justify-center text-sm text-gray-500 font-semibold bg-gray-200 h-6 px-2 rounded-full ml-auto">{{ Incident::where('finalized', 0)->count() }}</span>
            </a>
        </li>
        @if (Auth::user()->account_type == 'osh')
            <li class="my-px">
                <a href="{{ action([ChecklistController::class, 'index']) }}"
                    class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 {{ request()->is('checklist') ? 'bg-gray-100' : '' }} ">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </span>
                    <span class="ml-3">Checklist</span>
                    <span
                        class="flex items-center justify-center text-sm text-gray-500 font-semibold bg-gray-200 h-6 px-2 rounded-full ml-auto">{{ Checklist::count() }}</span>
                </a>
            </li>
        @endif

        <li class="my-px">
            <a href="{{ action([AuditController::class, 'index']) }}"
                class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 {{ request()->is('audit') ? 'bg-gray-100' : '' }} ">
                <span class="flex items-center justify-center text-lg text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </span>
                <span class="ml-3">Audits</span>
                <span
                    class="flex items-center justify-center text-sm text-gray-500 font-semibold bg-gray-200 h-6 px-2 rounded-full ml-auto">{{ Audit::count() }}</span>
            </a>
        </li>
        @if (Auth::user()->account_type == 'osh')
            <li class="my-px">
                <a href="{{ action([DepartmentController::class, 'index']) }}"
                    class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100 {{ request()->is('department') ? 'bg-gray-100' : '' }} ">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </span>
                    <span class="ml-3">Departments</span>
                </a>
            </li>

            <li class="my-px">
                <a href="{{ action([InsightController::class, 'index']) }}"
                    class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100 {{ request()->is('insight') ? 'bg-gray-100' : '' }} ">
                    <span class="flex items-center justify-center text-lg text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </span>
                    <span class="ml-3">Insights</span>
                </a>
            </li>
        @endif

        <li class="my-px">
            <a href="/" class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                <span class="flex items-center justify-center text-lg text-green-400">
                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                        stroke="currentColor" class="h-6 w-6">
                        <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </span>
                <span class="ml-3">Add new Incident</span>
            </a>
        </li>
        <li class="my-px">
            <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Account</span>
        </li>
        <li class="my-px">
            <a href="#" class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                <span class="flex items-center justify-center text-lg text-gray-400">
                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                        stroke="currentColor" class="h-6 w-6">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </span>
                <span class="ml-3">Profile</span>
            </a>
        </li>
        <li class="my-px">
            <a href="{{ action([UserController::class, 'index']) }}"
                class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100 {{ request()->is('users') ? 'bg-gray-100' : '' }} ">
                <span class="flex items-center justify-center text-lg text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </span>
                <span class="ml-3">Users</span>
            </a>
        </li>
        <li class="my-px">
            <a href="#" class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                <span class="flex items-center justify-center text-lg text-gray-400">
                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                        stroke="currentColor" class="h-6 w-6">
                        <path
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                </span>
                <span class="ml-3">Notifications</span>
                <span
                    class="flex items-center justify-center text-sm text-gray-500 font-semibold bg-gray-200 h-6 px-2 rounded-full ml-auto">10</span>
            </a>
        </li>

        <li class="my-px">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#" onclick="event.preventDefault();
            this.closest('form').submit();"
                    class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                    <span class="flex items-center justify-center text-lg text-red-400">
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path
                                d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z">
                            </path>
                        </svg>
                    </span>
                    <span class="ml-3">Logout</span>
                </a>
            </form>
        </li>
    </ul>
</div>
