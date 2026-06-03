<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\user as Authenticatable;


class profile extends Authenticatable 
{
    use HasFactory;
    protected $table = 'profile';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'username',
        'contact_number',
        'address'
       
    ];
}
