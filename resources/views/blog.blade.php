<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover insightful blogs on various topics at HopeNest.">
    <meta name="keywords" content="HopeNest, Blog, Articles, Insights, Learn, Explore">
    <meta name="author" content="HopeNest">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/3b9416ab5d.js" crossorigin="anonymous" defer></script>
    
    <!-- Tailwind JS -->
    <script src="{{ asset('assets/js/tailwind.js') }}" defer></script>
    <script src="{{ asset('assets/js/script.js') }}" defer></script>

    <title>@yield('title', 'Blog') - HopeNest</title>
</head>
<body class="font-poppins bg-gray-100 relative overflow-y-hidden">

    <!-- Loader -->
    <div id="loader" class="fixed inset-0 bg-gray-100 flex items-center justify-center z-50">
        <div class="w-16 h-16 border-4 border-green-600 border-t-transparent rounded-full animate-spin"></div>
    </div>

    <div class="wrapper w-full h-screen overflow-y-auto">
        <!-- Header -->
        @include('partials.header')

        <!-- Main Content -->
        <main class="mt-4 flex flex-col gap-y-6">
            <!-- Hero Section -->
            <section 
                class="relative w-full h-[300px] bg-cover bg-center bg-fixed"
                style="background-image: url('{{ asset('assets/images/help.jpg') }}');"
            >
                <div class="absolute inset-0 bg-black/40"></div>
                <div class="relative z-10 flex flex-col justify-center items-center text-center h-full text-white px-4">
                    <nav class="flex gap-x-3 items-center">
                        <a href="{{ route('index') }}" class="text-3xl md:text-4xl font-bold text-yellow-400">
                            Home
                        </a>
                        <span class="text-3xl md:text-4xl font-bold">&gt;</span>
                        <a href="{{ route('about') }}" class="text-3xl md:text-4xl font-bold hover:text-yellow-400">
                            Blog
                        </a>
                    </nav>
                </div>
            </section>

            <!-- Blog Section -->
            <section class="bg-gray-50 py-8 px-4">
                @if (empty($blogs) || $blogs->isEmpty())
                    <div class="text-center text-gray-600">
                        <p>No blogs available at the moment. Check back later!</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Blog Cards -->
                        @foreach ($blogs as $blog)
                        <article class="bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow p-4 flex flex-col">
                            <img 
                                src="{{ $blog->image }}" 
                                alt="{{ $blog->title }}" 
                                class="w-full h-48 object-cover rounded-t-lg mb-4"
                            >
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                                {{ $blog->title }}
                            </h3>
                            <p class="text-gray-700 mb-4 leading-relaxed">
                                {{ \Illuminate\Support\Str::limit($blog->content, 150, '...') }}
                            </p>
                            <a 
                                href="#" 
                                class="text-green-600 font-medium hover:underline mt-auto">
                                Read More &rarr;
                            </a>
                        </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $blogs->links('vendor.pagination.custom-pagination') }}
                    </div>
                @endif
            </section>
        </main>

        <!-- Footer -->
        @include('partials.footer')
    </div>
</body>
</html>
