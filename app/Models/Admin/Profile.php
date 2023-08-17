<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    //  use SoftDeletes;
    use HasFactory;
    public $table = 'profiles';

    public $fillable = [
        'user_id',
        'designation',
        'phone_number',
        'date_joined',
        'date_of_birth',
        'passport_number',
        'date_joined_organisation',
        'area_of_expertise',
        'area_of_training_of_trainer'
    ];

    protected $casts = [
        'designation' => 'string',
        'phone_number' => 'string',
        'date_joined' => 'datetime',
        'date_of_birth' => 'datetime',
        'passport_number' => 'string',
        'date_joined_organisation' => 'datetime',
        'area_of_expertise' => 'string',
        'area_of_training_of_trainer' => 'string'
    ];

    public static array $rules = [
        'user_id' => 'required',
        'designation' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:255',
        'date_joined' => 'nullable',
        'date_of_birth' => 'nullable',
        'passport_number' => 'nullable|string|max:255',
        'date_joined_organisation' => 'nullable',
        'area_of_expertise' => 'nullable|string|max:65535',
        'area_of_training_of_trainer' => 'nullable|string|max:65535',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Admin\User::class, 'user_id');
    }
}
