<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ]; 

    public function floor ()
    {
        return $this->belongsTo(Floor::class);
    }

    public function room ()
    {
        return $this->belongsTo(Room::class);
    }

    public function form ()
    {
        return $this->belongsTo(Form::class);
    }
}
