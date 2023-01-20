<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Position
 *
 * @property $id
 * @property $company_id
 * @property $recruiter_id
 * @property $salary
 * @property $description
 * @property $position_status
 * @property $created_at
 * @property $updated_at
 *
 * @property Company $company
 * @property Postulation[] $postulations
 * @property Recruiter $recruiter
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Position extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'recruiter_id', 'salary', 'description', 'position_status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postulations()
    {
        return $this->hasMany('App\Models\Postulation', 'position_id', 'id');
    }

    public function report()
    {
        return $this->hasMany('App\Models\Report', 'position_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function recruiter()
    {
        return $this->hasOne('App\Models\Recruiter', 'id', 'recruiter_id');
    }
}
