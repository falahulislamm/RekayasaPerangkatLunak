<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Villa;
use App\Models\Payment;

class ChartController extends Controller
{
    
    public function revenueChart()
    {
        $revenuePerMonth = DB::table('orders')
        ->join('providers_services', 'orders.provider_service_id', '=', 'providers_services.id')
        ->join('services', 'providers_services.service_id', '=', 'services.id')
        ->where('orders.status', 'completed') // Hanya menghitung pesanan yang selesai
        ->select(
            'services.name as service_name',
            DB::raw("DATE_FORMAT(orders.order_date, '%Y-%m') as month"), // Menggunakan kolom order_date
            DB::raw('SUM(providers_services.price) as total_revenue')
        )
        ->groupBy('services.id', 'services.name', DB::raw("DATE_FORMAT(orders.order_date, '%Y-%m')"))
        ->orderBy('month', 'ASC')
        ->get();

    return view('profit-chart', compact('revenuePerMonth'));
    }

}
