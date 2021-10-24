<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name', 'description', 'slug', 'image', 'parent_id'];

    // Category belongs to many post

    public function posts(): HasMany {
        
        return $this->hasMany(Post::class);
    }

    //For sub Category
    public function subCategories(): HasMany {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
