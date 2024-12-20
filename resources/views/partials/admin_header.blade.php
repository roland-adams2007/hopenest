<nav class="w-full fixed z-40 md:relative md:w-[20%] h-full bg-[#2b7a3d] shadow-md text-white hidden md:flex flex-col">
    <div class="w-full h-20 flex items-center justify-between md:justify-center text-xl font-bold px-4">
        <button id="sidebarClose" class="text-white text-2xl md:hidden">
            X
        </button>
        <div>
            HopeNest
        </div>
    </div>
    <div class="flex flex-col gap-y-2 px-4">
        <a href="{{route('admin.dashboard')}}" class="block py-2 px-4 rounded-md hover:bg-white hover:text-[#2b7a3d] transition">
            Home
        </a>
        <a href="{{route('admin.blog')}}" class="block py-2 px-4 rounded-md hover:bg-white hover:text-[#2b7a3d] transition">
            Blog
        </a>
        <a href="{{route('admin.donation')}}" class="block py-2 px-4 rounded-md hover:bg-white hover:text-[#2b7a3d] transition">
            Donations
        </a>
        <a href="{{route('admin.profile')}}" class="block py-2 px-4 rounded-md hover:bg-white hover:text-[#2b7a3d] transition">
            Profile
        </a>
        <form action="{{route('logout')}}" method="post" class="w-full flex">
            @csrf
            <button type="submit" class="w-full py-2 px-4 text-left rounded-md hover:bg-white hover:text-[#2b7a3d] transition">
                Logout
            </button>
        </form>
    </div>
</nav>