<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    public $timestamps = true;
    
    protected $fillable = [
        'name',
    ];

    public function category_books()
    {
        return $this->hasMany(category_book::class, 'category_id', 'id');
    }
}
