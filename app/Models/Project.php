<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'created_by_user_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'users_projects', 'project_id','user_id');
    }
}
