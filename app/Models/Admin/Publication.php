<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Publication extends Model
{
    use SoftDeletes;
    use Sluggable;
    use HasFactory;
    
    public $table = 'publications';

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
}
