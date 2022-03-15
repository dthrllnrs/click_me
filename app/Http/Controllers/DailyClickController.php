<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DailyClick;
use App\Models\UniqueClicker;
use App\Traits\ResultResponse;
use App\Traits\IpTrait;
use DB;

class DailyClickController extends Controller
{
    use ResultResponse, IpTrait;

    /**
     * Increment daily click
     *
     * @param Request $request
    * @return JsonResponse
    */
    Public function increment(Request $request) {

        $title = 'Increment Daily Click';

        DB::beginTransaction();
        try {
            $today = Carbon::now()->toDateString();
            $clickerIp = $request->ip();

            $dailyClick = DailyClick::find($today);

            if($dailyClick) {
                $dailyClick->clicks++;
                $dailyClick->save();
            } else {
                $dailyClick = DailyClick::create([
                    'day' => $today,
                    'clicks' => 1
                ]);
            }

            $clicker = UniqueClicker::where('day', $today)->where('ip_address', $clickerIp)->first();

            if(!$clicker) {
                $clicker = UniqueClicker::create([
                    'day' => $today,
                    'ip_address' => $clickerIp
                ]);
            }

            DB::commit();
            return $this->successResponse($title, 'Increment Request Success', [
                'daily_clicks' => $dailyClick,
                'unique_clickers' => count($dailyClick->uniqueClickers)
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse($title, $e->getMessage(), []);
        }
    }

    public function getCountToday(Request $request) {
        $title = 'Get Daily Click';

        try {
            $today = Carbon::now()->toDateString();

            $dailyClick = DailyClick::where('day', $today)->first();

            return $this->successResponse($title, '', [
                'daily_clicks' => $dailyClick,
                'unique_clickers' => count($dailyClick->uniqueClickers)
            ]);

        } catch (\Exception $e) {
            return $this->errorResponse($title, $e->getMessage(), []);
        }
    }

}
