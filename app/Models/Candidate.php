<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['user_id', 'city', 'state', 'party_number', 'registration_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voteProjections()
    {
        return $this->hasMany(VoteProjection::class, 'candidate_id', 'user_id');
    }

    public function teamMembers()
    {
        return $this->hasMany(CampaignTeamMember::class, 'candidate_id', 'user_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'candidate_id', 'user_id');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class, 'candidate_id', 'user_id');
    }
}
