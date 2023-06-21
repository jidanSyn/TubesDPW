<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    protected $with = ['game', 'transaction'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    public function game() 
    {
        return $this->belongsTo(Game::class);
    }

    public function transaction() 
    {
        return $this->belongsTo(Transaction::class);
    }
}
