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
    <title>About
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
                    <a href="{{route('about')}}" class="text-3xl md:text-4xl font-bold leading-tight hover:text-yellow-400">About</a>
                   </div>
                </div>
            </section>

            <section class="bg-gray-100 py-12">
                  <!-- Content Section -->
                <div class="bg-[#2b7a3d] w-full shadow-lg">
                    <div class="max-w-6xl mx-auto p-6 text-white rounded-lg flex flex-col md:flex-row items-center gap-8">
                        <!-- Image Container -->
                        <div class="w-64 h-64 rounded-lg overflow-hidden shadow-md flex-shrink-0">
                            <img src="assets/images/founder.jpg" class="h-full w-full object-cover" alt="The Founder">
                        </div>
                
                        <!-- Text Content -->
                        <div class="flex flex-col gap-6">
                            <!-- Heading -->
                            <div>
                                <h3 class="text-3xl font-semibold text-yellow-400">About the Founder</h3>
                            </div>
                            
                            <!-- Mission Content -->
                            <div class="space-y-4">
                                    <p class="text-lg">
                                        <span class="font-semibold">Name: </span>John A. Smith
                                    </p>

                                    <p class="text-lg">
                                        <span class="font-semibold">Role: </span>Founder & CEO of Hopenest
                                    </p>

                                    <div class="space-y-2">
                                        <p class="text-lg leading-relaxed">
                                            John A. Smith is a visionary leader and passionate philanthropist dedicated to empowering communities and creating a better future for underserved populations. With over a decade of experience in social work and community development, John founded Hopenest with a mission to provide a safe haven for those in need, offering hope, support, and opportunities for a brighter tomorrow.
                                        </p>
    
                                        <p class="text-lg leading-relaxed">
                                            John’s journey began when he volunteered at a local shelter during his teenage years. Witnessing the struggles of families and individuals firsthand, he was inspired to take action and address the root causes of poverty, inequality, and homelessness. His dream was to create an organization that would not only provide immediate assistance but also focus on long-term solutions such as education, skill development, and mental health support.
                                        </p>
                                    </div>
                      

                                <h3 class="font-semibold text-xl border-b-4 border-yellow-400 inline-block"> Mission</h3>

                                <p>Under John's leadership, <span class="font-semibold">Hopenest</span> strives to:</p>

                                <ul class="list-disc list-inside space-y-2">
                                    <li><span class="font-semibold">Restore Hope: </span>By offering food, shelter, and immediate care to those in crisis.</li>

                                    <li><span class="font-semibold">Empower Individuals: </span>Through education, training programs, and job placement initiatives.</li>

                                    <li><span class="font-semibold">Build Community: </span>By fostering a sense of belonging and providing resources to help individuals and families thrive.</li>
                                </ul>

                                <p class="text-sm">
                                    John believes that together, we can make a significant impact. His mantra, <span class="italic">“Every act of kindness plants a seed of hope,”</span> continues to inspire the Hopenest team and volunteers to work tirelessly toward a more equitable world.
                                </p>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-gray-50 py-12">
                <!-- Section Title -->
                <div class="text-center mb-10">
                    <h2 class="text-4xl font-bold text-gray-800">
                        About 
                        <span class="text-yellow-400 border-b-4 border-green-400 inline-block pb-1">HopeNest</span>
                    </h2>
                </div>
            

                <div class="bg-[#2b7a3d] w-full shadow-lg">
                    <div class="max-w-6xl mx-auto p-6 text-white rounded-lg flex flex-col  items-center gap-8">
                        <p class="text-lg leading-relaxed">
                            <span class="font-semibold">Hopenest </span>is a charitable organization built on the foundation of compassion, empathy, and unwavering commitment to making a difference in the lives of those in need. At Hopenest, we believe that every individual deserves a chance to thrive, regardless of their circumstances. Our mission is to create a world where hope is accessible to everyone.
                        </p>
        
                        <h3 class="font-semibold text-xl border-b-4 border-yellow-400 inline-block"> Our Story</h3>
        
                        <div class="space-y-2">
                            <p class="text-lg leading-relaxed">
                                Hopenest was born out of the desire to address the growing challenges of poverty, inequality, and access to essential resources in our communities. What started as a small initiative to provide meals and shelter to struggling families has now evolved into a movement that empowers people through education, skill development, mental health support, and sustainable solutions.
                            </p>
            
                            <p class="text-lg leading-relaxed">
                                The founder of Hopenest, John A. Smith, envisioned a place where people could find safety, care, and the tools to rebuild their lives. Through the support of dedicated volunteers, donors, and partners, Hopenest has become a beacon of hope for countless individuals and families.
                            </p>
                        </div>
        
                        <h3 class="font-semibold text-xl border-b-4 border-yellow-400 inline-block"> Mission</h3>
        
                        <p class="text-lg">
                            Our mission at Hopenest is to provide a nurturing environment where individuals can rediscover hope, rebuild their lives, and achieve their dreams. We aim to:
                        </p>
        
                        <ul class="list-disc list-inside space-y-2">
                            <li>Offer immediate relief through food, clothing, and shelter.</li>
        
                            <li>Foster long-term growth through education, vocational training, and employment opportunities.</li>
        
                            <li>Promote mental and emotional well-being with counseling and community programs.</li>
        
                            <li>Build stronger communities by inspiring compassion, understanding, and collaboration.</li>
                        </ul>
                        
        
                        <h3 class="font-semibold text-xl border-b-4 border-yellow-400 inline-block"> Vision</h3>
        
                        <p class="text-lg">
                            To create a world where no one is left behind—a world where everyone has the opportunity to live with dignity, hope, and purpose.
                        </p>
        
        
                        <h3 class="font-semibold text-xl border-b-4 border-yellow-400 inline-block"> Our Core Values
                        </h3>
        
                        <ul class="list-disc list-inside space-y-2">
                            <li><span class="font-semibold">Compassion: </span>Putting humanity at the heart of all we do.</li>
        
                            <li><span class="font-semibold">Empowerment: </span>Equipping individuals with the tools and resources to thrive.</li>
        
                            <li><span class="font-semibold">Inclusivity: </span>Serving people of all backgrounds, beliefs, and walks of life.</li>
        
                            <li><span class="font-semibold">Sustainability: </span>Building solutions that create lasting impact.</li>
                            
                            <li><span class="font-semibold">Transparency: </span>Ensuring integrity and accountability in all our initiatives.</li>
                        </ul>
        
                        <h3 class="font-semibold text-xl border-b-4 border-yellow-400 inline-block"> Our Programs
                        </h3>
        
                        <ul class="list-disc list-inside space-y-2">
                            <li><span class="font-semibold">Hope Shelter: </span>Safe housing for homeless individuals and families.
                            </li>
        
                            <li><span class="font-semibold">Empowerment Workshops: </span>Skill-building programs to help participants find meaningful employment.</li>
        
                            <li><span class="font-semibold">Mental Health Support: </span>Counseling and emotional support to foster resilience.</li>
        
                            <li><span class="font-semibold">Community Kitchens: </span>Nutritious meals served to those in need.</li>
                            
                            <li><span class="font-semibold">Youth Education Programs: </span>Scholarships, school supplies, and mentorship for underprivileged youth.</li>
                        </ul>
        
                        <h3 class="font-semibold text-xl border-b-4 border-yellow-400 inline-block"> Get Involved</h3>
        
                        <p class="text-lg">
                            At Hopenest, we believe that change is a collective effort. Whether you donate, volunteer, or spread the word, your support helps us provide hope and opportunity to those who need it most. Together, we can build a brighter future for all.
                        </p>
                    </div>
                </div>
                
            </section>
            
        </main>

        @include('partials.footer')
    </div>    
</body>
</html>