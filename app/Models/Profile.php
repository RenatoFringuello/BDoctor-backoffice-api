<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specialization;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'picture',
        'bio',
        'curriculum',
        'services',
        'address',
        'telephone'
    ];

    public function specializations(){
        return $this->belongsToMany(Specialization::class);
    }
}
