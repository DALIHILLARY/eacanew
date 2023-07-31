<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class CaseModel extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'cases';

    public static array $status = [
        'NEW' => 0,
        'IN_PROGRESS' => 1,
        'CLOSED' => 2,
        'REOPENED' => 3,
        'RESOLVED' => 4,
        'REJECTED' => 5,
    ];

    public $fillable = [
        'title',
        'description'
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string'
    ];

    public static array $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
    
    /**
     * Get this case's findings.
     */
    public function findings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Finding::class, 'case_id');
    }

    public function caseTimelines(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Admin\CaseTimeline::class, 'case_id');
    }
}
