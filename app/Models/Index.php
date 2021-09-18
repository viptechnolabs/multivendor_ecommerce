<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    use HasFactory;

    public const OPTION = [
        'all' => 'All',
        'last_day' => 'Last day',
        'last_week' => 'Last week',
        'current_month' => 'Current month',
        'last_month' => 'Last month',
        'custom' => 'Custom',
    ];
}
