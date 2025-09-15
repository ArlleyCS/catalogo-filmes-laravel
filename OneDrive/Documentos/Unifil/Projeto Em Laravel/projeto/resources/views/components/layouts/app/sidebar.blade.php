<aside :class="{ 'w-full md:w-64': sidebarOpen, 'w-0 md:w-16 hidden md:block': !sidebarOpen }"
    class="bg-sidebar text-sidebar-foreground border-r border-gray-200 dark:border-gray-700 sidebar-transition overflow-hidden">
    <div class="h-full flex flex-col">
        <nav class="flex-1 overflow-y-auto custom-scrollbar py-4">
            <ul class="space-y-1 px-2">
                <x-layouts.sidebar-link href="{{ route('dashboard') }}" icon='fas-house'
                    :active="request()->routeIs('dashboard*')">Dashboard</x-layouts.sidebar-link>

                {{-- ====================================================== --}}
                {{-- |          NOVO LINK ADICIONADO AQUI                 | --}}
                {{-- ====================================================== --}}
                <x-layouts.sidebar-link href="{{ route('filmes.index') }}" icon='fas-film' 
                    :active="request()->routeIs('filmes.*')">Catálogo de Filmes</x-layouts.sidebar-link>


                <x-layouts.sidebar-two-level-link-parent title="Example two level" icon="fas-house"
                    :active="request()->routeIs('two-level*')">
                    <x-layouts.sidebar-two-level-link href="#" icon='fas-house'
                        :active="request()->routeIs('two-level*')">Child</x-layouts.sidebar-two-level-link>
                </x-layouts.sidebar-two-level-link-parent>

                <x-layouts.sidebar-two-level-link-parent title="Example three level" icon="fas-house"
                    :active="request()->routeIs('three-level*')">
                    <x-layouts.sidebar-two-level-link href="#" icon='fas-house'
                        :active="request()->routeIs('three-level*')">Single Link</x-layouts.sidebar-two-level-link>

                    <x-layouts.sidebar-three-level-parent title="Third Level" icon="fas-house"
                        :active="request()->routeIs('three-level*')">
                        <x-layouts.sidebar-three-level-link href="#" :active="request()->routeIs('three-level*')">
                            Third Level Link
                        </x-layouts.sidebar-three-level-link>
                    </x-layouts.sidebar-three-level-parent>
                </x-layouts.sidebar-two-level-link-parent>
            </ul>
        </nav>
    </div>
</aside>