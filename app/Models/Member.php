<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Member extends Authenticatable implements JWTSubject
    {
    use HasFactory, HasUuids, HasApiTokens;


    public function getJWTIdentifier()
        {
        return $this->getKey();
        }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
        {
        return [];
        }
    protected $fillable = [
        'name',
        'password',
        'account_type',
        'email',
        'email_verified_at',
        'remember_token'
    ];
    }
