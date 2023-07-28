<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class InformationRequest extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'information_requests';

    public $fillable = [
        'user_id',
        'description',
        'reason'
    ];

    protected $casts = [
        'description' => 'string',
        'reason' => 'string'
    ];

    public static array $rules = [
        'user_id' => 'required',
        'description' => 'nullable|string',
        'reason' => 'nullable|string|max:65535',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Admin\User::class, 'user_id');
    }
}
