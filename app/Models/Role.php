<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use Termwind\Components\Hr;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name','desc'];


    /**
     * Get all of the registred user for the role
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     public function roles(): HasMany
     {
        return $this->hasMany(User::class, 'role_id','id');
     }


    
}
