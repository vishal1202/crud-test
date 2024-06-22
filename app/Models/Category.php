<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // Define the relationship with the Material model
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
