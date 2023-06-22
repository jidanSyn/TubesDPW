<?php

namespace App\Models;

use App\Models\Game;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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
