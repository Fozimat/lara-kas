<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = ['description', 'date', 'total', 'type_id'];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
