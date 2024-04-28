<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visited extends Model
{
    use HasFactory;
    protected $table = 'visited';


    protected $fillable = [
        'summary_id',
        'user_id',
    ];

    protected $guarded = [
        'updated_at' => 'timestamp',
    ];
}
