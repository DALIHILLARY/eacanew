<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class Country extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'countries';

    public $fillable = [
        'code',
        'name',
        'description'
    ];

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'description' => 'string'
    ];

    public static array $rules = [
        'code' => 'required|string|max:5',
        'name' => 'required|string|max:100',
        'description' => 'nullable|string|max:65535',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
