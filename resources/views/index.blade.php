<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HopeNest - Where compassion takes flight, and dreams find a home. Join us to make a difference in the world.">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="https://kit.fontawesome.com/3b9416ab5d.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/script.js') }}" defer></script>
    <title>Home - HopeNest</title>
</head>
<body class="font-poppins bg-gray-100 relative">

    <!-- Loader -->
    <div id="loader" class="fixed inset-0 bg-gray-100 flex items-center justify-center z-50" aria-label="Loading">
        <div class="w-16 h-16 border-4 border-green-600 border-t-transparent rounded-full animate-spin"></div>
    </div>

    <!-- Wrapper -->
    <div class="wrapper w-full h-screen overflow-y-auto">
        <!-- Header -->
        @include('partials.header')

        <!-- Main Content -->
        <main class="mt-2 flex flex-col gap-y-8">
            <!-- Banner Section -->
            <section class="relative w-full h-[500px] bg-cover bg-center" style="background-image: url('assets/images/help.jpg');">
                <div class="absolute inset-0 bg-black/40"></div> <!-- Dark overlay -->
                <div class="relative z-10 flex flex-col justify-center items-center text-center h-full text-white px-4">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                        Welcome to <span class="text-yellow-400">HopeNest</span>
                    </h1>
                    <p class="mt-4 max-w-2xl text-lg md:text-xl">
                        Where Compassion Takes Flight, and Dreams Find a Home.
                    </p>
                    <a href="{{ route('donation') }}" class="mt-6 bg-yellow-400 text-green-800 py-3 px-8 rounded-lg font-semibold hover:bg-yellow-500 transition">
                        Get Involved
                    </a>
                </div>
            </section>

            <!-- About Us Section -->
            <section class="bg-gray-100 py-12">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-gray-800">
                        <span class="text-yellow-400 border-b-4 border-green-400 pb-1">About</span> Us
                    </h2>
                </div>

                <div class="bg-green-800 w-full shadow-lg">
                    <div class="max-w-6xl mx-auto p-6 text-white flex flex-col md:flex-row items-center gap-8">
                        <!-- Image -->
                        <div class="w-64 h-64 rounded-lg overflow-hidden shadow-md">
                            <img src="assets/images/team.jpg" alt="Our Team" class="h-full w-full object-cover">
                        </div>

                        <!-- Content -->
                        <div class="flex flex-col gap-6">
                            <h3 class="text-3xl font-semibold text-yellow-400">Our Team</h3>
                            <p class="text-lg leading-relaxed">
                                At HopeNest, we are a nonprofit organization driven by compassion and a mission to make a meaningful impact worldwide.
                            </p>
                            <h4 class="font-semibold text-xl">Our Mission</h4>
                            <ul class="list-disc list-inside space-y-2">
                                <li><strong>Empowering Communities:</strong> We provide accessible education and healthcare services to underserved communities.</li>
                                <li><strong>Alleviating Hunger:</strong> Distributing nutritious meals to vulnerable populations worldwide.</li>
                                <li><strong>Environmental Stewardship:</strong> Promoting reforestation and environmental awareness for a greener future.</li>
                                <li><strong>Empowering Youth:</strong> Equipping youth with mentorship and educational opportunities for success.</li>
                            </ul>
                            <a href="{{ route('about') }}" class="bg-yellow-400 text-green-800 py-3 px-6 rounded-lg font-semibold hover:bg-yellow-500 transition">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Major Causes Section -->
            <section class="bg-gray-50 py-12">
                <div class="text-center mb-10">
                    <h2 class="text-4xl font-bold text-gray-800">
                        Our <span class="text-yellow-400 border-b-4 border-green-400 pb-1">Major</span> Causes
                    </h2>
                </div>

                <div class="flex flex-col md:flex-row items-center justify-center gap-6 px-4">
                    <!-- Cause Cards -->
                    @foreach([
                        ['icon' => 'hand-holding-heart', 'title' => 'Give Donations', 'description' => 'Every donation benefits children in need by providing food, clothing, and education.'],
                        ['icon' => 'lightbulb', 'title' => 'Give Inspiration', 'description' => 'Engage children in knowledge-sharing activities and encourage participation.'],
                        ['icon' => 'leaf', 'title' => 'Help the Ecosystem', 'description' => 'Promote sustainable practices to protect our ecosystem.']
                    ] as $cause)
                    <div class="w-full md:w-[350px] bg-white border rounded-lg shadow-lg hover:shadow-2xl transition-shadow p-6 text-center">
                        <div class="text-green-600 text-5xl mb-4">
                            <i class="fas fa-{{ $cause['icon'] }}"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-green-600 mb-4">{{ $cause['title'] }}</h3>
                        <p class="text-gray-700 text-base leading-relaxed">{{ $cause['description'] }}</p>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Donation Stats Section -->
            <section class="bg-gray-100 py-12">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">
                        Our <span class="text-yellow-400 border-b-4 border-green-400 pb-1">Donation</span> Stats
                    </h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                    @foreach([
                        ['icon' => 'donate', 'title' => 'Total Donations', 'value' => '$' . $amt_donated],
                        ['icon' => 'users', 'title' => 'Total Donors', 'value' => $donations_count],
                        ['icon' => 'hands-helping', 'title' => 'Projects Completed', 'value' => '45']
                    ] as $stat)
                    <div class="p-6 bg-white shadow-lg rounded-lg border">
                        <div class="text-green-600 text-5xl mb-4">
                            <i class="fas fa-{{ $stat['icon'] }}"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-800">{{ $stat['title'] }}</h3>
                        <p class="text-gray-700 text-lg mt-2">{{ $stat['value'] }}</p>
                    </div>
                    @endforeach
                </div>
            </section>

            <section class="bg-gray-50 py-8 px-4">
                <!-- Section Title -->
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-gray-800">
                        Our <span class="text-yellow-400 border-b-4 border-green-400 inline-block pb-1">Blog</span>
                    </h2>
                    <p class="text-gray-600 mt-2">Explore our latest updates, stories, and insights</p>
                </div>
            
                <!-- Blog Grid -->
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
                                    src="{{ $blog->image}}" 
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
                    @endif
            </section>
        </main>
        @include('partials.footer')
    </div>


</body>
</html>
