<?php

namespace App\Models;

use Dotenv\Repository\Adapter\GuardedWriter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;


class Game extends Model
{
    // use Sluggable;
    use HasFactory;

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'name'
    //         ]
    //     ];
    // }

    protected $guarded = ['id'];

    public function getRouteKeyName() {
        return 'id';
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
