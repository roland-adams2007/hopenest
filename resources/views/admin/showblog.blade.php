<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3b9416ab5d.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/tailwind.js')}}"></script>
    <title>Show Blogs - Admin Dashboard</title>
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
            <header class="w-full h-20 bg-[#2b7a3d] shadow-md gap-x-2 flex items-center px-4">
                <button id="sidebarOpen" class="text-white text-2xl md:hidden">
                    ☰
                </button>
                <h1 class="text-white text-xl font-semibold">Show Blogs</h1>
                <div class="ml-auto">
                    <a href="{{route('admin.blog.create')}}" class="bg-white text-[#2b7a3d] py-2 px-4 rounded-md hover:bg-gray-100 transition">
                        Add New Blog
                    </a>
                </div>
            </header>

            <!-- Main Content Area -->
            <div class="p-6 flex-1 overflow-y-auto bg-gray-100">
                <!-- Search Bar -->
                <div class="mb-6">
                    <input
                        type="search"
                        placeholder="Search blogs..."
                        class="w-full md:w-1/2 p-3 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-[#2b7a3d] focus:border-[#2b7a3d]"
                    />
                </div>

                @if (session('message'))
                        <p class="w-full h-10 flex justify-center items-center text-green-600">{{session('message')}}</p>
                       @endif
                       @if ($errors->any())
                       <p class="w-full h-10 flex justify-center items-center text-red-600">{{$errors->first('error')}}</p>
                     @endif

                <!-- Blog Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-md shadow-md overflow-hidden">
                        <thead class="bg-[#2b7a3d] text-white">
                            <tr>
                                <th class="py-3 px-4 text-left">#</th>
                                <th class="py-3 px-4 text-left">Title</th>
                                <th class="py-3 px-4 text-left">Date</th>
                                <th class="py-3 px-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($blogs) || $blogs->isEmpty())
                                <tr>
                                  <td colspan="4">
                                    No blog available yet
                                  </td>
                                </tr>
                            @else
                                @foreach ($blogs as $blog)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">{{$loop->iteration}}</td>
                                    <td class="py-3 px-4">{{$blog->title}}</td>
                                    <td class="py-3 px-4">{{date('Y-m-d',strtotime($blog->date))}}</td>
                                    <td class="py-3 px-4 flex items-center gap-x-2">
                                        <button class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600 transition">
                                            View
                                        </button>
                                        <button class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 transition">
                                            Edit
                                        </button>
                                        <form action="{{route('admin.blog.delete')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 transition">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Footer -->
            @include('partials.admin_footer')
        </main>
    </div>
    <script src='{{asset('assets/js/admin_script.js')}}'></script>
    <script src='{{asset('assets/js/admin_loader.js')}}'></script>
    <script>
        // Get references to the DOM elements
        const searchInput = document.querySelector('input[type="search"]');
        const blogTable = document.querySelector('tbody');

        // Add event listeners for search and filter
        searchInput.addEventListener('input', filterDonations);

        function filterDonations() {
            const searchText = searchInput.value.toLowerCase();

            // Get all donation rows
            const rows = blogTable.querySelectorAll('tr');

            rows.forEach((row) => {
                const title = row.querySelector('td:nth-child(1)');
                if (title && status) {
                    const titleText = title.textContent.toLowerCase();
                    if (
                        titleText.includes(searchText)
                    ) {
                        row.style.display = ''; // Show row
                    } else {
                        row.style.display = 'none'; // Hide row
                    }
                }
            });
        }

    </script>
</body>
</html>
