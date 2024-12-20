<header class="w-full shadow-md sticky top-0 left-0 bg-[#2b7a3d] z-40">
    <div class="flex w-full h-20 justify-between items-center px-4">
        <!-- Logo -->
        <h1 class="text-white text-2xl md:text-3xl font-bold">
            Hope<span class="text-yellow-400">Nest</span>
        </h1>

        <!-- Navigation -->
        <div class="flex items-center">
            <!-- Mobile Menu Button -->
            <button type="button" id="openMenu" class="md:hidden text-white p-2 focus:outline-none">
                ☰
            </button>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex gap-x-5 items-center text-white">
                <a href="{{route('index')}}" class="hover:text-yellow-400">Home</a>
                <a href="{{route('about')}}" class="hover:text-yellow-400">About</a>
                <a href="{{route('blog')}}" class="hover:text-yellow-400">Blog</a>
                <a href="{{route('contact')}}" class="hover:text-yellow-400">Contact</a>
                <a href="{{route('donation')}}" class="bg-yellow-400 text-[var(--primary-green)] py-2 px-4 rounded-lg font-semibold hover:bg-yellow-500">
                    Donate
                </a>
            </nav>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <nav id="miniNav" class="absolute top-full left-0 w-full hidden md:hidden bg-[#2b7a3d] z-40 p-4 flex flex-col gap-y-3 text-white">
        <a href="{{route('index')}}" class="hover:text-yellow-400 text-yellow-400">Home</a>
        <a href="{{route('about')}}" class="hover:text-yellow-400">About</a>
        <a href="{{route('blog')}}" class="hover:text-yellow-400">Blog</a>
        <a href="{{route('contact')}}" class="hover:text-yellow-400">Contact</a>
        <a href="{{route('donation')}}" class="bg-yellow-400 text-[var(--primary-green)] py-2 px-4 rounded-lg font-semibold hover:bg-yellow-500">
            Donate
        </a>
    </nav>
</header>