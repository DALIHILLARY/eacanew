<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;

 class Finding extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'findings';

    public $fillable = [
        'title',
        'content',
        'user_id',
        'case_id'
    ];

    protected $casts = [
        'title' => 'string',
        'content' => 'string'
    ];

    public static array $rules = [
        'title' => 'required|string|max:255',
        'content' => 'nullable|string|max:65535',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function case(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Admin\Case::class, 'case_id');
    }

    public function current_status() : MorphOne
    {
        return $this->morphOne(Status::class, 'statusable')->latestOfMany();
    }

}
