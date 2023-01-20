<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Candidate
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $is_candidate
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Postulation[] $postulations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Candidate extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    static $rules = [
        'name' => 'required|string',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string|confirmed'
    ];

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //protected $guard = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function postulation()
    {
        return $this->hasMany(Postulation::class);
    }

    public function pendingPostulation()
    {
        return $this->hasMany(PendingPostulation::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function file()
    {
        return $this->hasOne(Cv::class);
    }
}
