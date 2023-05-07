<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <title>Arktik - Admin</title>

<link rel="stylesheet" href="{{asset('vendor/arktiklab/laravel-admin/dist/arktik-admin.app.css')}}" />
</head>
<body class="font-sans antialiased">
    <div>
        <!-- Static sidebar for desktop -->
        <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-grow flex-col overflow-y-auto bg-indigo-700 pt-5">
                <div class="flex flex-shrink-0 items-center px-4">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=300" alt="Your Company" />
                </div>
                <div class="mt-5 flex flex-1 flex-col">
                    <nav class="flex-1 space-y-1 px-2 pb-4">
                        <!-- Nav Menu Item List -->
                        {{--                        <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">--}}
                        {{--                            <component :is="item.icon" class="mr-3 h-6 w-6 flex-shrink-0 text-indigo-300" aria-hidden="true" />--}}
                        {{--                            {{ item.name }}--}}
                        {{--                        </a>--}}
                    </nav>
                </div>
            </div>
        </div>
        <div class="flex flex-1 flex-col md:pl-64">
            <!-- LAYOUT TOP BAR -->
            <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white shadow">
                <button type="button" class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden" @click="sidebarOpen = true">
                    <span class="sr-only">Open sidebar</span>
                    <!--                    <Bars3BottomLeftIcon class="h-6 w-6" aria-hidden="true" />-->
                </button>
                <div class="flex flex-1 justify-between px-4">
                    <div class="flex flex-1">
                        <form class="flex w-full md:ml-0" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
                                    <!--                                    <MagnifyingGlassIcon class="h-5 w-5" aria-hidden="true" />-->
                                </div>
                                <input id="search-field" class="block h-full w-full border-transparent py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 focus:border-transparent focus:placeholder-gray-400 focus:outline-none focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search" />
                            </div>
                        </form>
                    </div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <button type="button" class="rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <span>Notifications</span>
                            <!--                            <BellIcon class="h-6 w-6" aria-hidden="true" />-->
                        </button>

                        <!--                         Profile dropdown-->
                        <div class="relative ml-3">
                            <div>
                                <div class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                </div>
                            </div>
                            <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <div>
                                    <a href="" class="bg-gray-100 block px-4 py-2 text-sm text-gray-700">Tom Cook</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PAGE DYNAMIC CONTENT -->
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
