<x-layout>
    <x-slot name="title">Revenue Chart</x-slot> 
    <x-slot name="breadcrumb_active">Chart</x-slot>
    <x-slot name="card_footer">@HelpMatch</x-slot>

    <h2 class="text-center">Monthly Revenue Chart</h2>
    <div class="card-body card-dashboard p-4 bg-white shadow">
        <canvas id="revenueChart" width="400" height="170"></canvas>
    </div>
</x-layout>

<script>
    const revenuePerMonth = @json($revenuePerMonth);

    const monthLabels = [...new Set(revenuePerMonth.map(item => item.month))];
    const serviceNames = [...new Set(revenuePerMonth.map(item => item.service_name))];

    // Fungsi untuk menghasilkan warna random
    function getRandomColor() {
        const r = Math.floor(Math.random() * 255);
        const g = Math.floor(Math.random() * 255);
        const b = Math.floor(Math.random() * 255);
        return {
            background: `rgba(${r}, ${g}, ${b}, 0.2)`,
            border: `rgba(${r}, ${g}, ${b}, 1)`
        };
    }

    // Siapkan datasets dengan warna random
    const datasets = serviceNames.map(service => {
        const color = getRandomColor();
        return {
            label: service,
            data: monthLabels.map(month =>
                revenuePerMonth.find(item => item.month === month && item.service_name === service)?.total_revenue || 0
            ),
            backgroundColor: color.background,
            borderColor: color.border,
            borderWidth: 1,
            // Efek animasi untuk tiap dataset
            barPercentage: 0.5, // Atur ukuran bar agar lebih ramping
            categoryPercentage: 0.5,
            animation: {
                delay: 100, // Delay untuk memulai animasi (dalam ms)
                duration: 1000, // Durasi animasi
                easing: 'easeOutBounce', // Easing animasi yang lebih dinamis
            }
        };
    });

    // Membuat grafik dengan efek animasi
    new Chart(document.getElementById('revenueChart'), {
        type: 'bar',
        data: {
            labels: monthLabels,
            datasets: datasets
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Revenue per Month by Service'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            animation: {
                duration: 2000, // Durasi animasi grafik secara keseluruhan
                easing: 'easeInOutElastic', // Jenis easing yang lebih elastis
                onComplete: function () {
                    console.log('Animation completed!');
                }
            }
        }
    });
</script>

