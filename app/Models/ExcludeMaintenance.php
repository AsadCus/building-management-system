<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcludeMaintenance extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public function loginlocation ()
    {
        return $this->belongsTo(LoginLocation::class, 'location_id');
    }
}
