<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = 'post_categories';
    public $timestamps = false;
    protected $fillable = [
        'post_id',
        'category_id'
    ];


    public function categories(){
        return $this->belongsTo(Category::class);
    }
}
