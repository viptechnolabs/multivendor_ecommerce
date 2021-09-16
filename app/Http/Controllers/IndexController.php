<?php

namespace App\Http\Controllers;

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
}
