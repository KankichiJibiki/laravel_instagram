<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
    ];

    public function post_categories(){
        return $this->hasMany(PostCategory::class);
    }
}
