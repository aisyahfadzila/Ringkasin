<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SummaryTopics extends Model
{
    use HasFactory;
    protected $table = 'summary_topics';

    protected $fillable = [
        'summary_id',
        'title',
        'content',
    ];
}
