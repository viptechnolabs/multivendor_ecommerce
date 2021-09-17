<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function activityLog()
    {
        $activities = Activity::orderBy('id', 'DESC')->paginate(10);
        return view('activity_log', ['activities' => $activities]);
    }

    public function activityDelete(Request $request)
    {
        if ($request->option) {
            $queryBuilder = Activity::query();
            if ($request->option === 'all') {
                $queryBuilder->truncate();
                activity('Activity delete')
                    ->log('Activity are deleted');
            } elseif ($request->option === 'last_day') {
                $yesterday = date("Y-m-d", strtotime('-1 days'));
                $queryBuilder->whereBetween('created_at', [$yesterday, date("Y-m-d")]);
            } elseif ($request->option === 'last_week') {
                $previous_week = strtotime("-1 week +1 day");
                $start_week = strtotime("last sunday midnight", $previous_week);
                $end_week = strtotime("next saturday", $start_week);
                $start_week = date("Y-m-d", $start_week);
                $end_week = date("Y-m-d", $end_week);
                $queryBuilder->whereBetween('created_at', [$start_week, $end_week]);
            } elseif ($request->option === 'current_month') {
                $queryBuilder->whereMonth('created_at', Carbon::now()->month);
            } elseif ($request->option === 'last_month') {
                $queryBuilder->whereMonth('created_at', '=', Carbon::now()->subMonth()->month);
            }
            if ($queryBuilder->count() > 0) {
                $queryBuilder->delete();
                activity('Activity delete')
                    ->log('Activity are deleted');
                session()->flash('message', 'Selected activity are deleted..!');
            } else {
                session()->flash('message', 'No activity in selected option..!');
            }
        }

        return redirect()->back();
    }
}
