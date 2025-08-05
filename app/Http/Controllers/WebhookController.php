<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->all();

        // Identify type of webhook
        if (isset($payload['tag_name'])) {
            // Store in tag_fire_logs
            DB::table('tag_fire_logs')->insert([
                'event_name' => $payload['event_name'],
                'tag_name' => $payload['tag_name'],
                'container_id' => $payload['container_id'],
                'container_type' => $payload['container_type'],
                'fired_at' => Carbon::parse($payload['fired_at']),
                'metadata' => json_encode($payload['metadata'] ?? []),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if (isset($payload['alert_type'])) {
            // Store in gtm_alerts
            DB::table('gtm_alerts')->insert([
                'tag_name' => $payload['tag_name'] ?? null,
                'event_name' => $payload['event_name'] ?? null,
                'alert_type' => $payload['alert_type'],
                'container_type' => $payload['container_type'],
                'severity' => $payload['severity'],
                'description' => $payload['description'],
                'created_at' => now(),
            ]);
        }

        return response()->json(['status' => 'success'], 200);
    }
}

