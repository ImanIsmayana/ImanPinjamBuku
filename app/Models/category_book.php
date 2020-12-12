<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_book extends Model
{
    use HasFactory;

    protected $table = 'category_book';
    public $timestamps = true;

    protected $fillable = ['category_id', 'book_id'];

    public function books()
    {
        return $this->belongsTo(book::class, 'book_id', 'id');
    }

    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = json_encode($value);
    }
  
    public function getCategoryAttribute($value)
    {
        return $this->attributes['category'] = json_decode($value);
    }

}
