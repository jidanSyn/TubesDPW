<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['game', 'transaction'];

    public function game() 
    {
        return $this->belongsTo(Game::class);
    }

    public function transaction() 
    {
        return $this->belongsTo(Transaction::class);
    }
}
