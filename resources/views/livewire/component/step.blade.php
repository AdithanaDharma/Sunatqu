<div>
    <div class="flex justify-center sticky">
        <ol class="flex items-center justify-center w-full max-w-40">
            <li
                class="flex w-full items-center {{ request()->routeIs('daftar-sunat') ? 'text-white ' : 'text-gray-400' }} dark:text-white after:content-[''] after:w-full after:h-1 after:border-b after:border-[#375534]  after:border-4 after:inline-block dark:after:border-blue-800">
                <span
                    class="flex items-center justify-center w-10 h-10 bg-[#375534] rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
                    <svg class="w-3.5 h-3.5 text-white lg:w-4 lg:h-4 dark:text-blue-300" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5.917 5.724 10.5 15 1.5" />
                    </svg>
                </span>
            </li>
            <li
                class=" items-center {{ request()->routeIs('paket') ? 'text-white after:border-[#375534] ' : 'text-gray-400 after:border-gray-200' }} ">
                <span
                    class="flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0 {{ request()->routeIs('paket') ? 'bg-[#375534] dark:bg-blue-800' : 'bg-gray-100 dark:bg-gray-700' }}">
                    <svg class="w-4 h-4  lg:w-5 lg:h-5 dark:text-gray-100 {{ request()->routeIs('paket') ? 'text-white dark:bg-blue-800' : 'bg-gray-100 dark:bg-gray-700' }}" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path
                            d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z" />
                    </svg>
                </span>
            </li>

        </ol>
    </div>
</div>