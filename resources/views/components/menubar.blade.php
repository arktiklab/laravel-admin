<div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
    <div class="flex flex-grow flex-col overflow-y-auto bg-indigo-700 pt-5">
        <div class="flex flex-shrink-0 items-center px-4">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=300" alt="Your Company" />
        </div>

        <div class="mt-5 flex flex-1 flex-col">
            <nav class="mt-5 space-y-1 px-2">
                @foreach($navMenu as $menu)
                    <a href="" class="{{ false ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600', }} 'group flex items-center px-2 py-2 text-sm font-medium rounded-md'">
                        @if($menu->icon)
                            <x-icon name="heroicon-o-{{ $menu->icon }}" class="w-6 h-6 mr-3 flex-shrink-0 text-indigo-300" aria-hidden="true" />
                        @endif
                        {{ $menu->name }}
                    </a>
                @endforeach
            </nav>
        </div>
    </div>
</div>
