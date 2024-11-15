<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['commodity_id', 'month_year', 'price', 'rentang', 'status', 'keterangan'];

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }
}
