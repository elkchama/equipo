<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',       // User's name
        'username',   // Unique username
        'phone',      // Contact phone number
        'gender',     // User's gender
        'email',      // User's email address
        'password',   // Encrypted password
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',        // Hide the password field
        'remember_token',  // Hide the remember token field
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',  // Cast email verification timestamp to DateTime
    ];

    /**
     * Set the password attribute and automatically encrypt it.
     *
     * @param string $password Unencrypted password
     * @return void
     */
    public function setPasswordAttribute(string $password)
    {
        $this->attributes['password'] = bcrypt($password); // Encrypt the password before saving
    }

    /**
     * One-to-many relationship with the Fidelizacion model.
     * A user can have multiple loyalty records.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fidelizaciones()
    {
        return $this->hasMany(Fidelizacion::class); // Relationship with fidelizations
    }
}
