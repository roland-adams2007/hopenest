<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3b9416ab5d.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/tailwind.js')}}"></script>
    <title>Login - HopeNest Admin</title>
    <style>
        body{
             background-image: url('../assets/images/team-spirit.jpg');
             background-repeat: no-repeat;
             background-position: center;
            background-size: cover;
        }
    </style>
</head>
<body class="h-screen">
    <div class="absolute inset-0 bg-black/40"></div>
   <main class="relative z-10 flex items-center justify-center h-full">
      <div class="max-w-md w-full rounded-lg shadow-lg p-8 bg-gray-50">
        <div class="flex justify-center items-center mb-6">
            <i class="fa-solid fa-book-open-reader text-5xl text-[#2b7a3d] mr-2" aria-hidden="true"></i>
            <p class="text-3xl font-bold text-green-500">HopeNest</p>
        </div>
        
        <h2 class="text-2xl font-semibold text-center mb-4 text-gray-700 ">Login to Your Admin Account</h2>
        <form action="{{route('login.store')}}" method="POST" class="flex flex-col gap-y-2">
            @csrf
            @if (session('message'))
             <p class="w-full h-10 flex justify-center items-center text-red-600">{{session('message')}}</p>
            @endif
            <label for="email" class="sr-only">Email</label>
            <input
             type="email"
             id="email"
             name="email"
             placeholder="Email"
              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" 
              required
              value="{{old('email')}}"
              >
              @error('email')
              <p class="text-red-500">{{$message}}</p>
          @enderror
            
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
            @error('password')
                            <p class="text-red-500">{{$message}}</p>
                        @enderror
            
            <button type="submit" id="login_btn" class="bg-green-500 hover:bg-green-600 text-white rounded-lg py-2  transition duration-200">Login</button>
        </form>
        <div class="mt-4 text-center">
            <a href="#" class="text-gray-400 hover:underline">Forgot Password?</a>
        </div>
      </div>
   </main>
</body>
</html>