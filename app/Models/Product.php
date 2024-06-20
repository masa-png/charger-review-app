<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory, Sortable;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function wattage()
    {
        return $this->belongsTo(Wattage::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
