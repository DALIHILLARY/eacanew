<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Event extends Model
{
    use Sluggable;

    use SoftDeletes;
    use HasFactory;
    public $table = 'events';

    public $fillable = [
        'title',
        'slug',
        'content'
    ];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'content' => 'string'
    ];

    public static array $rules = [
        'title' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255',
        'content' => 'required|string',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
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

    public function current_status() : MorphOne
    {
        return $this->morphOne(Status::class, 'statusable')->latestOfMany();
    }

        /**
     * Get all of the blogPost's media.
     */
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

}
