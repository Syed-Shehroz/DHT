<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubscriptionPayment extends Model
{
    use HasFactory;
    protected $fillable = ['type','amount','plan','validity','status','updated_at'];
}
