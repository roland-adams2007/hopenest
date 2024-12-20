<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3b9416ab5d.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/tailwind.js')}}"></script>
    <title>Donations - Admin Dashboard</title>
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
                <h1 class="text-white text-xl font-semibold">Donations</h1>
            </header>

            <!-- Content Section -->
            <div class="p-6 flex-1 overflow-y-auto bg-gray-100">
                <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-6">Manage Donations</h2>

                    <!-- Search and Filters -->
                    <div class="flex flex-col md:flex-row md:items-center gap-4 mb-6">
                        <input
                            type="search"
                            placeholder="Search by donor name..."
                            class="flex-1 p-3 border border-gray-300 rounded-md focus:ring-[#2b7a3d] focus:border-[#2b7a3d]"
                        />
                        <select
                            class="p-3 border border-gray-300 rounded-md focus:ring-[#2b7a3d] focus:border-[#2b7a3d]"
                        >
                            <option value="">Filter by status</option>
                            <option value="completed">Completed</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>

                    <!-- Donation Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse bg-white text-left text-sm text-gray-700">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-6 py-4 font-medium">Donor Name</th>
                                    <th class="px-6 py-4 font-medium">Amount</th>
                                    <th class="px-6 py-4 font-medium">Date</th>
                                    <th class="px-6 py-4 font-medium">Status</th>
                                    <th class="px-6 py-4 font-medium">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($donations) || $donations->isEmpty())
                                <tr>
                                    <td colspan="5">
                                      No donations has been made yet, Check again later.
                                    </td>
                                  </tr>
                                @else
                                    @foreach ($donations as $donation)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">{{$donation->donor_name}}</td>
                                        <td class="px-6 py-4">${{$donation->amount}}</td>
                                        <td class="px-6 py-4">{{date('Y-m-d',strtotime($donation->date))}}</td>
                                        <td class="px-6 py-4">
                                            @if ($donation->status==='completed')
                                            <span class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                                {{$donation->status}}
                                            </span>   
                                            @endif
                                            @if ($donation->status==='pending')
                                            <span class="px-3 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">
                                                {{$donation->status}}
                                            </span>   
                                            @endif
                                            @if ($donation->status==='failed')
                                            <span class="px-3 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">
                                                {{$donation->status}}
                                            </span>   
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <button class="text-blue-600 hover:underline">View</button>
                                            <button class="text-red-600 hover:underline ml-4">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
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
        const statusFilter = document.querySelector('select');
        const donationTable = document.querySelector('tbody');

        // Add event listeners for search and filter
        searchInput.addEventListener('input', filterDonations);
        statusFilter.addEventListener('change', filterDonations);

        function filterDonations() {
            const searchText = searchInput.value.toLowerCase();
            const selectedStatus = statusFilter.value;

            // Get all donation rows
            const rows = donationTable.querySelectorAll('tr');

            rows.forEach((row) => {
                const donorName = row.querySelector('td:nth-child(1)');
                const status = row.querySelector('td:nth-child(4) span');
                if (donorName && status) {
                    const donorNameText = donorName.textContent.toLowerCase();
                    const statusText = status.textContent.toLowerCase();
                    if (
                        donorNameText.includes(searchText) &&
                        (selectedStatus === '' || statusText === selectedStatus)
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
