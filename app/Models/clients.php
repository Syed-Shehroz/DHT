<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    //protected $table = 'clients';
    use HasFactory;
    protected $fillable = ['client_name','email','phone_1','phone_2','phone_3','address','updated_at'];
}
