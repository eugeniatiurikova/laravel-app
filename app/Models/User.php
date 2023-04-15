<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;


class User extends Authenticatable // implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';

    public static $selectedFields = [
        'id',
        'name',
        'email',
        'created_at',
        'updated_at',
        'is_admin'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'last_login_at',
        'is_admin'
    ];

    protected $dates = [
        'last_login_at'
    ];

    public $timestamps = false;

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
        'is_admin' => 'bool'
    ];

    public function scopeUsers(Builder $query, array $columns = ['*']): Builder
    {
        return $query->select($columns)->orderByDesc('updated_at');
    }

    public function scopeUserById(Builder $query, int $id, array $columns = ['*']): ?Builder
    {
        return $query->select($columns)->where('id','=',$id);
    }

}
