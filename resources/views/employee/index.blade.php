@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/wel.css'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="transition-all duration-300 w-[220px] h-screen overflow-hidden shadow-lg flex flex-col">
            <h1 class="text-xl font-bold p-4">Employee Panel</h1>
            <ul class="menu flex-grow space-y-2 px-4">
                <li><a href="/employee/dashboard" class="flex items-center gap-2">🏠 Dashboard</a></li>
                <li>
                    <details class="group">
                        <summary class="flex items-center gap-2 cursor-pointer">👨‍💼 Profile</summary>
                        <ul class="ml-4 space-y-1 hidden group-open:block">
                            <li><a href="/employee/profile">View Profile</a></li>
                            <li><a href="/employee/profile/edit">Edit Profile</a></li>
                        </ul>
                    </details>
                </li>
                <li>
                    <details class="group">
                        <summary class="flex items-center gap-2 cursor-pointer">📊 Reports</summary>
                        <ul class="ml-4 space-y-1 hidden group-open:block">
                            <li><a href="/employee/reports">View Reports</a></li>
                            <li><a href="/employee/reports/generate">Generate Report</a></li>
                        </ul>
                    </details>
                </li>
                <li><a class="flex items-center gap-2">📅 Schedule</a></li>
                <li><a class="flex items-center gap-2">📞 Support</a></li>
                <li><a class="flex items-center gap-2" href="/logout">🚪 Logout</a></li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-auto">
            <!-- Topbar -->
            <div class="p-4 shadow flex items-center">
                <h2 class="text-xl font-bold">Employee Dashboard</h2>
            </div>

            <!-- Page Content -->
            <main class="p-6 flex-1 overflow-y-auto">
                <div class="container">
                    <h1 class="text-2xl font-bold mb-4">Welcome, [Employee Name]!</h1>
                    <p class="mb-4">Here you can manage your profile, view reports, and more.</p>

                    <!-- Example Chart -->
                    <div class="mb-6">
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>

                    <!-- Example Table -->
                    <h2 class="text-xl font-bold mb-2">Your Recent Activities</h2>
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Activity</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2023-10-01</td>
                                <td>Completed Task A</td>
                                <td>✅</td>
                            </tr>
                            <tr>
                                <td>2023-10-02</td>
                                <td>Started Task B</td>
                                <td>🔄</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Activities',
                    data: [12, 19, 3, 5, 2, 3],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
@endsection