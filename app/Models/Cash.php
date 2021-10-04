<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cash extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function getTotalRupiah()
    {
        return "Rp. " . number_format($this->total, 2, ',', '.');
    }

    public function getTanggalIndo()
    {
        $carbon = new \Carbon\Carbon($this->date);
        $formatted_date = $carbon->isoFormat('D MMMM Y');
        return $formatted_date;
    }
}
