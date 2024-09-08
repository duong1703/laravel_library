<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class member extends Authenticatable
{
    use HasFactory;

    protected $table = "member";

    protected $primaryKey = "id";


    protected $fillable = ['name_member', 'name_login', 'password', 'Email', 'role', 'born', 'numberphone', 'ID_number_card', 'address'];

    public function readbooks()
    {
        return $this->hasMany(readbook::class);
    }

    public function comments()
    {
        return $this->hasMany(comment::class);
    }


}
