<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;
    protected $fillable = ['project_name','combined_plan','project_date','updated_at'];

    public function getClient()
    {
        return $this->belongsTo('App\Models\clients','client_id');
    }

}
