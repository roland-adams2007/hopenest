
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="{{asset('assets/js/tailwind.js')}}"></script>
    <script src="{{ asset('assets/js/script.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/3b9416ab5d.js" crossorigin="anonymous"></script>
    <title>Contact
 - HopeNest</title>
</head>
<body class="font-poppins bg-gray-100 relative overflow-y-none">

    <div id="loader" class="fixed inset-0 bg-gray-100 flex items-center justify-center z-50">
        <div class="w-16 h-16 border-4 border-green-600 border-t-transparent rounded-full animate-spin"></div>
    </div>

    <div class="wrapper w-full h-screen overflow-y-auto">
        <!-- Header -->
        @include('partials.header')

        <!--Main-->
        <main class="mt-2 flex flex-col gap-y-3">
            <section class="relative w-full h-[300px] bg-cover bg-center bg-fixed" style="background-image: url('assets/images/help.jpg');">
                <div class="absolute inset-0 bg-black/40"></div> <!-- Dark overlay -->
                <div class="relative z-10 flex flex-col justify-center items-center text-center h-full text-white px-4">
                   <div class="flex gap-x-3 items-center">
                    <a href="{{route('index')}}" class="text-3xl md:text-4xl font-bold leading-tight text-yellow-400">Home</a>
                    <span class="text-3xl md:text-4xl font-bold leading-tight">></span>
                    <a href="{{route('contact')}}" class="text-3xl md:text-4xl font-bold leading-tight hover:text-yellow-400">Contact</a>
                   </div>
                </div>
            </section>

            <section class="bg-gray-100 py-8 px-4">
                <!-- Section Title -->
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-gray-800">
                        <span class="text-yellow-400 border-b-4 border-green-400 inline-block pb-1">Contact</span> Us
                    </h2>
                    <p class="text-gray-600 mt-2">We'd love to hear from you. Send us a message below.</p>
                </div>
            
                <!-- Contact Content -->
                <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <!-- Left: Contact Information -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="bg-green-500 text-white p-3 rounded-full">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89-5.26c.94-.63 2.27-.63 3.2 0L22 8M16 10v10M8 10v10M5 20h14a2 2 0 002-2v-8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <p class="text-gray-700 text-lg">1234 LoveCare Lane, Compassion City</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="bg-green-500 text-white p-3 rounded-full">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.75 3.58c-.84-1.56-3.16-1.56-4 0L3.64 19.07c-.63 1.18.24 2.43 1.5 2.43h13.72c1.26 0 2.13-1.25 1.5-2.43L16.75 3.58zM12 9v4m0 4h.01" />
                                </svg>
                            </div>
                            <p class="text-gray-700 text-lg">+(234) 7043507082</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="bg-green-500 text-white p-3 rounded-full">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h.01M12 12h.01M8 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="text-gray-700 text-lg">codewithroland@gmail.com</p>
                        </div>
                    </div>
            
                    <!-- Right: Contact Form -->
                    <div class="bg-white p-6 shadow-lg rounded-lg">
                        <form action="{{route('contact')}}" method="POST" class="space-y-6">
                            @csrf
                            @if ($errors->any())
                                <p class="w-full h-10 flex justify-center items-center text-red-600">{{$errors->first('error')}}</p>
                            @endif
                            @if (session('success'))
                            <p class="w-full h-10 flex justify-center items-center text-green-600">{{session('success')}}</p>
                            @endif
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" 
                                    placeholder="Enter your full name" 
                                    required>
                                    @if ($errors->first('name'))
                    <p class="text-red-600">You must choose at least one hashtag</p>
                    @endif
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" 
                                    placeholder="Enter your email address" 
                                    required>
                                    @if ($errors->first('email'))
                    <p class="text-red-600">You must choose at least one hashtag</p>
                    @endif
                            </div>
                            <div>
                                <label for="message" class="block text-gray-700 font-medium mb-2">Your Message</label>
                                <textarea 
                                    id="message" 
                                    name="message" 
                                    minlength="1"
                                    maxlength="1000"
                                    rows="4" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none" 
                                    placeholder="Write your message here..." 
                                    required></textarea>
                                    @if ($errors->first('message'))
                    <p class="text-red-600">You must choose at least one hashtag</p>
                    @endif
                            </div>
                            <button 
                                type="submit" 
                                class="w-full bg-green-500 text-white py-2 px-4 rounded-md font-semibold hover:bg-green-600 transition">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </section>
            
        </main>

        @include('partials.footer')
    </div>    
</body>
</html>