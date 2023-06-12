<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
        'is_mandatory' => 'boolean',
    ]; 

    public function maintenance ()
    {
        return $this->belongsTo(Maintenance::class);
    }

    public function values ()
    {
        return $this->hasMany(Value::class);
    }
}
