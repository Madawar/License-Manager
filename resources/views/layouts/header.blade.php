  <div class="navbar  bg-neutral text-neutral-content ">
      <div class="flex-1 px-2 mx-2">
          <span class="text-lg font-bold">
              {{ env('APP_NAME') }}
          </span>
      </div>
      <div class="flex-none hidden px-2 mx-2 lg:flex">
          <div class="flex items-stretch">
              <a href="/license" class="btn btn-ghost btn-sm rounded-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                      class="h-6 w-6 pr-1">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                  </svg>
                  License List

              </a>
              <a href="/license/create" class="btn btn-ghost btn-sm rounded-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-1" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Record License

              </a>



              @if (Auth::check())
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a href="#" onclick="event.preventDefault();
          this.closest('form').submit();" class="btn btn-ghost btn-sm rounded-btn">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                              class="h-6 w-6">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                          </svg>
                          <span class="ml-3">Logout ({{ Auth::user()->name }})</span>
                      </a>
                  </form>
              @endif
          </div>
      </div>
      <div class="flex-none">


          <button class="btn btn-square btn-ghost">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  class="inline-block w-6 h-6 stroke-current">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                  </path>
              </svg>
          </button>
      </div>
  </div>
