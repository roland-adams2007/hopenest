<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3b9416ab5d.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/tailwind.js')}}"></script>
    <title>Profile - Admin Dashboard</title>
</head>
<body class="h-screen">
    <div id="loader" class="fixed inset-0 bg-gray-100 flex items-center justify-center z-50" aria-label="Loading">
        <div class="w-16 h-16 border-4 border-green-600 border-t-transparent rounded-full animate-spin"></div>
    </div>
    <div class="wrapper flex w-full h-full">
        <!-- Sidebar -->
        @include('partials.admin_header')

        <!-- Main Content -->
        <main class="w-full h-full flex flex-col">
            <!-- Header -->
            <header class="w-full h-20 bg-[#2b7a3d] shadow-md flex items-center gap-x-2 px-4">
                <button id="sidebarOpen" class="text-white text-2xl md:hidden">
                    ☰
                </button>
                <h1 class="text-white text-xl font-semibold">Admin Profile</h1>
            </header>

            <!-- Content Section -->
            <div class="p-6 flex-1 overflow-y-auto bg-gray-100">
                <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-6">Profile Information</h2>

                    <!-- Profile Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Full Name</label>
                            <p class="p-3 border border-gray-300 rounded-md bg-gray-50">{{$user_details->name}}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Email Address</label>
                            <p class="p-3 border border-gray-300 rounded-md bg-gray-50">{{$user_details->email}}</p>
                        </div>
                    </div>

                    <!-- Edit Profile Button -->
                    <div class="mt-6 text-right">
                        <button
                            class="bg-[#2b7a3d] text-white py-3 px-6 rounded-md hover:bg-[#236430] transition"
                        >
                            Edit Profile
                        </button>
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
