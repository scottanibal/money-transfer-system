<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestLogs extends Model
{
    use HasFactory;

    protected $table = 'requests_logs';

    protected $guarded = [];
}
