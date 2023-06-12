<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
        'no_room_category' => 'boolean',
    ]; 

    public function rooms ()
    {
        return $this->hasMany(Room::class);
    }

    public function values ()
    {
        return $this->hasMany(Value::class);
    }

    public function loginlocation ()
    {
        return $this->belongsTo(LoginLocation::class, 'location_id');
    }
}
