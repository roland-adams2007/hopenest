
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
    <title>Donation
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
                    <a href="{{route('donation')}}" class="text-3xl md:text-4xl font-bold leading-tight hover:text-yellow-400">Donation</a>
                   </div>
                </div>
            </section>

            <section class="bg-gray-100 py-8 px-4">
                <!-- Section Title -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">
                        Our <span class="text-yellow-400 border-b-4 border-green-400 inline-block pb-1">Donation</span> Stats
                    </h2>
                </div>
                
                <!-- Stats Grid -->
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
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">
                        <span class="text-yellow-400 border-b-4 border-green-400 inline-block pb-1">Donate</span> Now
                    </h2>
                </div>
                
                <div class="bg-white p-6 shadow-lg rounded-lg max-w-3xl mx-auto">
                    <form action="{{route('donation')}}" method="POST" class="space-y-6">
                        @csrf
                        @if (session('success'))
                            <p class="w-full h-10 flex justify-center items-center text-green-600">{{session('success')}}</p>
                        @endif
                        @if (session('error'))
                            <p class="w-full h-10 flex justify-center items-center text-red-600">{{session('error')}}</p>
                        @endif
                        <!-- User Details -->
                        <div>
                            <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" 
                                placeholder="Enter your full name" 
                                value="{{old('name')}}"
                                required>
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" 
                                placeholder="Enter your email address"
                                value="{{old('email')}}" 
                                required>
                        </div>
                        
                        <!-- Donation Amount -->
                        <div>
                            <label for="amount" class="block text-gray-700 font-medium mb-2">Donation Amount ($)</label>
                            <div class="flex gap-4 flex-wrap">
                                <button type="button" onclick="donationAmount(10)" class="flex-1 bg-gray-100 py-2 px-4 border border-gray-300 rounded-md hover:bg-gray-200">$10</button>
                                <button type="button" onclick="donationAmount(25)" class="flex-1 bg-gray-100 py-2 px-4 border border-gray-300 rounded-md hover:bg-gray-200">$25</button>
                                <button type="button" onclick="donationAmount(50)" class="flex-1 bg-gray-100 py-2 px-4 border border-gray-300 rounded-md hover:bg-gray-200">$50</button>
                                <button type="button" onclick="donationAmount(100)" class="flex-1 bg-gray-100 py-2 px-4 border border-gray-300 rounded-md hover:bg-gray-200">$100</button>
                            </div>
                            <input 
                                id="amount" 
                                name="amount" 
                                type="number"
                                min="1"
                                class="mt-4 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" 
                                placeholder="Enter custom amount"
                                value="{{old('amount')}}">
                                
                        </div>
            
                        <!-- Summary -->
                        <div class="bg-gray-100 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-700">Donation Summary</h3>
                            <p class="mt-2 text-gray-600">You're about to donate <span id="summary-amount" class="font-bold text-gray-800 break-words">$0</span>.</p>
                        </div>
            
                        <!-- Payment Button -->
                        <button 
                            type="submit" 
                            class="w-full bg-green-500 text-white py-2 px-4 rounded-md font-semibold hover:bg-green-600 transition">
                            Proceed to Payment
                        </button>
                    </form>
                </div>
            </section>
            

          
            
        </main>

        @include('partials.footer')
    </div>
    <script>
        const summaryAmount = document.getElementById('summary-amount');
        const amountInput = document.getElementById('amount');

        function donationAmount(amt) {
            const amount =amountInput;
            amount.value = amt;
            updateSummary(); 
        }

        function updateSummary() {
            const amount =amountInput;
            const summary = summaryAmount;
            summary.innerHTML = `$${amount.value || 0}`;
        }

        amountInput.addEventListener('input', updateSummary);
    </script>
    
</body>
</html>