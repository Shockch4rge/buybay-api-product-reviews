<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model implements AuthenticatableContract
{
    use HasUuids;

    public function getAuthIdentifierName()
    {
        return 'id';
    }
    public function getAuthIdentifier()
    {
        return $this->id;
    }
    public function getAuthPassword()
    {
        return null;
    }
    public function getRememberToken()
    {
        return null;
    }
    public function setRememberToken($value) {}
    public function getRememberTokenName() {}
}

//class User extends Authenticatable implements JWTSubject
//{
//    use HasApiTokens, HasFactory, Notifiable;
//
//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array<int, string>
//     */
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];
//
//    /**
//     * The attributes that should be hidden for serialization.
//     *
//     * @var array<int, string>
//     */
//    protected $hidden = [
//        'password',
//        'remember_token',
//    ];
//
//    /**
//     * The attributes that should be cast.
//     *
//     * @var array<string, string>
//     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
//
//    public function getJWTIdentifier()
//    {
//        return $this->getKey();
//    }
//
//    public function getJWTCustomClaims()
//    {
//        return [];
//    }
//
//    public function setPasswordAttribute(string $password)
//    {
//        if (!empty($password)) {
//            $this->attributes['password'] = bcrypt($password);
//        }
//    }
//}
