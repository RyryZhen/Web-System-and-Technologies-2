<x-app-layout>
    <x-slot name="header">
        {{ __('Sales Analytics') }}
    </x-slot>

    <div class="space-y-8">
        <!-- Matcha Stat Highlights -->


        <!-- Professional Chart Card -->
        <div class="bg-white/80 backdrop-blur-xl p-10 rounded-[3rem] shadow-sm border border-emerald-100/50">
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
                <div>
                    <h3 class="text-2xl font-black text-[#1E3932] tracking-tight">Revenue Trajectory</h3>
                    <p class="text-sm text-emerald-600/60 font-medium italic">Visualization of seasonal brewing trends</p>
                </div>
                <div class="flex gap-2">
                    <span class="px-4 py-2 bg-emerald-50 text-[#00704A] text-xs font-bold rounded-full border border-emerald-100 italic">Curated Data</span>
                </div>
            </div>
            
            <div style="height: 450px;">
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('salesChart').getContext('2d');
            
            // Premium Matcha Gradient
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(0, 112, 74, 0.2)'); 
            gradient.addColorStop(0.5, 'rgba(0, 112, 74, 0.05)');
            gradient.addColorStop(1, 'rgba(241, 248, 233, 0)'); 

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Revenue',
                        data: @json($data),
                        borderColor: '#00704A',
                        backgroundColor: gradient,
                        fill: true,
                        tension: 0.45, // Super smooth organic curve
                        borderWidth: 4,
                        pointRadius: 0, 
                        pointHoverRadius: 10,
                        pointHoverBackgroundColor: '#ffffff',
                        pointHoverBorderColor: '#00704A',
                        pointHoverBorderWidth: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1E3932',
                            titleFont: { size: 14, weight: 'bold' },
                            padding: 12,
                            cornerRadius: 12,
                            displayColors: false
                        }
                    },
                    scales: {
                        y: { 
                            beginAtZero: true,
                            grid: { color: 'rgba(0, 112, 74, 0.05)', drawBorder: false },
                            ticks: { 
                                color: '#1E3932', 
                                font: { size: 12, weight: '600' },
                                callback: (val) => '$' + val
                            }
                        },
                        x: { 
                            grid: { display: false },
                            ticks: { color: '#1E3932', font: { size: 12, weight: '600' } }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>