<nav class="bg-white border-b border-gray-100 shadow-md">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800">
                Shift Management
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>

            @role('admin')
                <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                    {{ __('Admin Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('karyawan.index')" :active="request()->routeIs('karyawan.index')">
                    {{ __('Kelola Karyawan') }}
                </x-nav-link>
                <x-nav-link :href="route('shift.index')" :active="request()->routeIs('shift.index')">
                    {{ __('Kelola Shift') }}
                </x-nav-link>
            @endrole

            @role('karyawan')
                <x-nav-link :href="route('karyawan.dashboard')" :active="request()->routeIs('karyawan.dashboard')">
                    {{ __('Jadwal Saya') }}
                </x-nav-link>
                <x-nav-link :href="route('absensi.index')" :active="request()->routeIs('absensi.index')">
                    {{ __('Absensi') }}
                </x-nav-link>
            @endrole
        </div>

        <!-- User Profile Dropdown -->
        <div class="relative">
            <button id="dropdownButton" class="flex items-center px-3 py-2 border rounded-md text-gray-500 hover:bg-gray-100 focus:outline-none">
                <span>{{ Auth::user()->name }}</span>
                <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>

            <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-md hidden">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const button = document.getElementById("dropdownButton");
        const menu = document.getElementById("dropdownMenu");

        button.addEventListener("click", function() {
            menu.classList.toggle("hidden");
        });

        document.addEventListener("click", function(event) {
            if (!button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add("hidden");
            }
        });
    });
</script>
