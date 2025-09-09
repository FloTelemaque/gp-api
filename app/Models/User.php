<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Traits\HasUuid;
use App\Models\Traits\Multitenancy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuid, Multitenancy, HasRoles;

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'company_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'name',
        'password',
        'email_verified_at',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at',
        'created_at',
        'updated_at',
        'remember_token',
        'roles',
        'laravel_through_key'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'immutable_datetime',
        'password' => 'hashed',
    ];


    /**
     * Generate token on  if the user is an administrator.
     */
    protected function token(): Attribute
    {
        return new Attribute(
            get: fn () => $this->createToken('api')->plainTextToken
        );
    }


    /**
     * Fullname
     */
    protected function fullname(): Attribute
    {
        return new Attribute(
            get: fn () => "{$this->first_name} {$this->last_name}"
        );
    }


    /**
     * Return is admin role
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
}
