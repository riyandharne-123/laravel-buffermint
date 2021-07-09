<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'title',
        'location',
        'requirement_count'
    ];

    public function applications() {
        return $this->hasMany(Application::class, 'job_id');
    }
}
