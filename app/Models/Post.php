<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    // protected $guarded = [];
    protected $fillable = [
        'title',
        'slug', 
        'body', 
        'image', 
        'description', 
        'published_at', 
        'featured', 
        'status',
        'user_id',
        'category_id',
    ];

    //A post belongs to a user and  a user can have many posts
    //Get the user that owns the post
    public function user(): BelongsTo {

        //No need to add user ID, laravel does that automatically
        // return $this->belongsTo(User::class, 'id');
        return $this->belongsTo(User::class, 'user_id')->withDefault('John Doe');
    }

    //A post belongs to one category and a category can have many posts
    public function category(): BelongsTo {

        //No need to add category ID, laravel does that automatically
        // return $this->belongsTo(User::class, 'id');
        return $this->belongsTo(Category::class, 'category_id');
    }

    //A post belongs to many tags and a tags belongs many posts
    //Many to Many Relationship
    public function tags(): BelongsToMany {

        //No need to add category ID, laravel does that automatically
        //Ad the reference
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    //Comments belong to a post
    public function comments(): HasMany {
        return $this->HasMany(Comment::class);
    }

    // public function id(): int {
    //     return $this->id;
    // }

    // public function title(): string {
    //     return $this->title;
    // }

    public static function searchPost($search) {
        // if empty return static::query if not, return 
        return empty($search) ? static::query() 
        : static::query()->where('id', 'like', '%' . $search . '%')->orWhere('title', 'like', '%' . $search . '%')
        ->orWhere('body', 'like', '%' . $search . '%');
    }

    public function scopeCategory(Builder $query, string $category): Builder {
        return $query->where('category_id', $category);
    }

    // Post::featured
    public function scopeFeatured(Builder $query): Builder {
        return $query->where('featured', true);
    }

    public function scopePublished(Builder $query): Builder {
        return $query->whereNotNull('published_at')->where('published_at', '<=', new \DateTime());
    }

    public function scopeRecentAsc(Builder $query): Builder {
        return $query->orderBy('title', 'asc');
    }

    public function scopeRecentDesc(Builder $query): Builder {
        return $query->orderBy('title', 'desc');
    }
}
