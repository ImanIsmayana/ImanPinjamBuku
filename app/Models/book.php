<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $table = 'books';
    public $timestamps = true;
    
    protected $fillable = [
        'id', 'title', 'author', 'publisher',
    ];

    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = json_encode($value);
    }
  
    public function getCategoryAttribute($value)
    {
        return $this->attributes['category'] = json_decode($value);
    }
}
