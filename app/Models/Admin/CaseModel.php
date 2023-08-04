<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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

    public function current_status() : MorphOne
    {
        return $this->morphOne(Status::class, 'statusable')->latestOfMany();
    }

    public function status_timeline() : MorphMany
    {
        return $this->morphMany(Status::class, 'statusable');
    }

    public function countries()
    {
        return $this->belongsToMany(\App\Models\Admin\Country::class, 'case_country', 'case_id', 'country_id');
    }

    public function categories()
    {
        return $this->belongsToMany(\App\Models\Admin\CaseType::class, 'case_category', 'case_id', 'case_type_id');
    }
}
