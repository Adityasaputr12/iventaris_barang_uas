<title>{{ config('app.titleDashboard', 'Laravel') }} - {{ $settings->webname }}</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('alert.alert-info')
                    <br/>

                    <div class="text-center mb-4">
                        <h4>Statistik Peminjaman dan Pengembalian</h4>
                    </div>

                    <canvas id="dashboardChart" width="400" height="200"></canvas>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx = document.getElementById('dashboardChart').getContext('2d');
                        const dashboardChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Peminjaman', 'Pengembalian'],
                                datasets: [{
                                    label: 'Jumlah Barang',
                                    data: [{{ $jumlahPeminjaman ?? 12 }}, {{ $jumlahPengembalian ?? 8 }}],
                                    backgroundColor: ['#60a5fa', '#34d399'],
                                    borderColor: ['#3b82f6', '#10b981'],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            precision:0
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
