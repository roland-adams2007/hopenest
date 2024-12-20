<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3b9416ab5d.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/tailwind.js')}}"></script>
    <title>Create Blog - Admin Dashboard</title>
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
            <header class="w-full h-20 bg-[#2b7a3d] shadow-md flex gap-x-2 items-center px-4">
                <button id="sidebarOpen" class="text-white text-2xl md:hidden">
                    ☰
                </button>
                <h1 class="text-white text-xl font-semibold">Create Blog</h1>
            </header>

            <!-- Form Content -->
            <div class="p-6 flex-1 overflow-y-auto bg-gray-100">
                <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-6">Create a New Blog</h2>
                    <form action="{{route('admin.blog.store')}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @if (session('message'))
                        <p class="w-full h-10 flex justify-center items-center text-green-600">{{session('message')}}</p>
                       @endif
                       @if ($errors->any())
                       <p class="w-full h-10 flex justify-center items-center text-red-600">{{$errors->first('error')}}</p>
                     @endif
                        <!-- Blog Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Blog Title
                            </label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                required
                                class="w-full p-3 border border-gray-300 rounded-md focus:ring-[#2b7a3d] focus:border-[#2b7a3d]"
                                placeholder="Enter blog title"
                                value="{{old('title')}}"
                            />
                            @error('title')
                                <p class="text-red-500">{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Blog Content -->
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                                Content
                            </label>
                            <textarea
                                id="content"
                                name="content"
                                rows="8"
                                required
                                class="w-full p-3 border border-gray-300 rounded-md focus:ring-[#2b7a3d] focus:border-[#2b7a3d]"
                                placeholder="Write the blog content..."
                                value="{{old('content')}}"
                            ></textarea>
                            @error('content')
                                <p class="text-red-500">{{$message}}</p>
                            @enderror
                        </div>


                        <!-- Image Upload -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                Upload Image
                            </label>
                            <input
                                type="file"
                                id="image"
                                name="image"
                                accept="image/*"
                                class="w-full p-3 border border-gray-300 rounded-md focus:ring-[#2b7a3d] focus:border-[#2b7a3d]"
                                value="{{old('image')}}"
                            />
                            @error('image')
                                <p class="text-red-500">{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button
                                type="submit"
                                class="bg-[#2b7a3d] text-white py-3 px-6 rounded-md hover:bg-[#236430] transition"
                            >
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            @include('partials.admin_footer')
        </main>
    </div>
    <script src='{{asset('assets/js/admin_script.js')}}'></script>
    <script src='{{asset('assets/js/admin_loader.js')}}'></script>
</body>
</html>
