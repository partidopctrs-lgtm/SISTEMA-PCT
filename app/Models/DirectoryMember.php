<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectoryMember extends Model
{
    protected $fillable = [
        'directory_id',
        'user_id',
        'member_type', // founder, board_member, common_member
        'directory_role', // president, vice_president, secretary, treasurer, etc.
        'name',
        'cpf',
        'rg',
        'voter_title',
        'phone',
        'email',
        'address',
        'photo_path',
        'document_path',
        'status',
        'verification_status',
        'joined_at',
        'left_at'
    ];

    public function directory()
    {
        return $this->belongsTo(Directory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}