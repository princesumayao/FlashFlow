<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'instagram_url',
        'facebook_url',
        'github_url',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
