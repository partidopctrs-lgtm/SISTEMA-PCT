<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasUuids;

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class);
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
        'phone',
        'cpf',
        'registration_number',
        'role',
        'status',
        'photo',
        'birth_date',
        'rg',
        'nationality',
        'marital_status',
        'voter_id',
        'voter_zone',
        'voter_section',
        'profession',
        'education',
        'address',
        'neighborhood',
        'city',
        'state',
        'zip_code',
        'zip_code',
        'committee_city',
        'referred_by',
        'registration_document',
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

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }

    public function committeeMemberships()
    {
        return $this->hasMany(CommitteeMember::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_by');
    }

    public function inviter()
    {
        return $this->belongsTo(User::class, 'referred_by');
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
