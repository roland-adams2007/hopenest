<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3b9416ab5d.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/tailwind.js')}}"></script>
    <title>Admin Dashboard - HopeNest</title>
</head>
<body class="h-screen">

    <div id="loader" class="fixed inset-0 bg-gray-100 flex items-center justify-center z-50" aria-label="Loading">
        <div class="w-16 h-16 border-4 border-green-600 border-t-transparent rounded-full animate-spin"></div>
    </div>
    <!-- Wrapper -->
    <div class="wrapper flex w-full h-full">
        <!-- Sidebar -->
        @include('partials.admin_header')
        
        <!-- Main Content -->
        <main class="w-full h-full flex flex-col">
            <!-- Header -->
            <header class="w-full h-20 bg-[#2b7a3d] shadow-md flex items-center justify-between px-4">
                <button id="sidebarOpen" class="text-white text-2xl md:hidden">
                    ☰
                </button>
                <h1 class="text-white text-xl font-semibold ml-4">Dashboard</h1>
                <div class="ml-auto flex items-center gap-x-4 text-sm text-white">
                 Welcome, {{$user_details->name}}
                </div>
            </header>
            
            <!-- Main Content Area -->
            <div class="p-6 flex-1 overflow-y-auto bg-gray-100">
                <h2 class="text-2xl font-bold mb-4">Welcome to the Admin Dashboard</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Dashboard cards -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex items-center gap-x-4">
                        <i class="fas fa-dollar-sign text-3xl text-[#2b7a3d]"></i>
                        <div>
                            <h3 class="font-semibold text-lg">Total Donations</h3>
                            <p class="text-2xl font-bold text-[#2b7a3d]">${{$amt_donated}}</p>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-md flex items-center gap-x-4">
                        <i class="fas fa-pen text-3xl text-[#2b7a3d]"></i>
                        <div>
                            <h3 class="font-semibold text-lg">Total Blogs</h3>
                            <p class="text-2xl font-bold text-[#2b7a3d]">{{$blog_count}}</p>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-md flex items-center gap-x-4">
                        <i class="fas fa-users text-3xl text-[#2b7a3d]"></i>
                        <div>
                            <h3 class="font-semibold text-lg">Total Donors</h3>
                            <p class="text-2xl font-bold text-[#2b7a3d]">{{$donations_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            @include('partials.admin_footer')
        </main>
    </div>
    <script src='{{asset('assets/js/admin_script.js')}}'></script>
    <script src='{{asset('assets/js/admin_loader.js')}}'></script>
</body>
</html>
