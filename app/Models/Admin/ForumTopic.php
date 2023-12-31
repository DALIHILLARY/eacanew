<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class ForumTopic extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $table = 'forum_topics';
    use Sluggable;

    public $fillable = [
        'forum_category_id',
        'user_id',
        'name',
        'slug',
        'description'
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string'
    ];

    public static array $rules = [
        'forum_category_id' => 'required',
        'name' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:65535',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function posts()
    {
        return $this->morphMany(Post::class, 'postable');
    }
    public function forumCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Admin\ForumCategory::class, 'forum_category_id');
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
    public function current_status(): MorphOne
    {
        return $this->morphOne(Status::class, 'statusable')->latestOfMany();
    }
}
