<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Asset\Asset;
use App\Models\Asset\AssetShowcase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\User\UserFactory> */
    use HasFactory, Notifiable;

    public function Economy()
    {
        return $this->hasOne(Economy::class, 'user_id',"id");
    }

    public function Friends()
    {
        //TODO: FIX FRIENDS RELATIONSHIP
        return $this->hasMany(Friend::class,"user_1","id");
    }

    public function Showcase()
    {
        return $this->hasMany(AssetShowcase::class,"user_id","id");
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
