<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrowing extends Model
{
    use HasFactory;

    protected $table = 'borrowings';
    public $timestamps = true;
    
    protected $fillable = [
        'name', 'created_at_borrow', 'return_date', 'member_id', 'book_id', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public function books()
    {
        return $this->belongsTo(book::class, 'book_id', 'id');
    }

    public function members()
    {
        return $this->belongsTo(member::class, 'member_id', 'id');
    }
}
