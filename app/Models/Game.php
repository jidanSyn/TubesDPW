<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Dotenv\Repository\Adapter\GuardedWriter;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Game extends Model
{
    use HasFactory;
    use Sluggable;

    public function scopeSearch($query, $searching)
    {
        $query->when($searching['search'] ?? false, function ($query, $cari) {
            return $query->where('name', 'like', '%' . $cari . '%');
        });
    }
    
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $guarded = ['id'];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
