<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLocation extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 
    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ]; 

    public function floors ()
    {
        return $this->hasMany(Floor::class, 'location_id');
    }

    public function rooms ()
    {
        return $this->hasMany(Room::class, 'location_id');
    }

    public function excludemaintenance ()
    {
        return $this->hasMany(ExcludeMaintenance::class, 'location_id');
    }
}
