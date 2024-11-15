<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'kode_kuesioner', 'note'];

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
