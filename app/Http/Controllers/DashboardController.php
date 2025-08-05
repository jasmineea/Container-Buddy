<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller 
{
    public function index()
    {
        $user = auth()->user();
        
        $todayCount = DB::table('tag_fire_logs')
            ->whereDate('fired_at', today())
            ->count();

        $activeContainers = DB::table('tag_fire_logs')
            ->select('container_id')
            ->distinct()
            ->count();

        $anomalies = DB::table('gtm_alerts')
            ->whereDate('created_at', today())
            ->count();

        $lastUpdate = DB::table('tag_fire_logs')
            ->latest('created_at')
            ->value('created_at');

        $tagFireActivity = DB::table('tag_fire_logs')
            ->select(DB::raw('EXTRACT(HOUR FROM fired_at) as hour'), 'container_type', DB::raw('COUNT(*) as count'))
            ->whereDate('fired_at', today())
            ->groupBy(DB::raw('EXTRACT(HOUR FROM fired_at)'), 'container_type')
            ->get()
            ->groupBy('container_type');





        return view('dashboard', compact('user', 'todayCount', 'activeContainers', 'anomalies', 'lastUpdate', 'tagFireActivity'))
            ->with('dataClient', json_encode(array_column(($tagFireActivity['client'] ?? collect())->toArray(), 'count')))
            ->with('dataServer', json_encode(array_column(($tagFireActivity['server'] ?? collect())->toArray(), 'count')));
    }
}