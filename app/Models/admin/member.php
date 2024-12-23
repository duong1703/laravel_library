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


    protected $fillable = [ 'admin_id' ,'name_member', 'name_login', 'password', 'Email', 'role', 'born', 'numberphone', 'ID_number_card', 'address'];

    public function readbooks()
    {
        return $this->hasMany(readbook::class);
    }

    public function comments()
    {
        return $this->hasMany(comment::class);
    }

    public function admin()
    {
        return $this->belongsTo(admin::class, 'admin_id');
    }

    public function message(){
        return $this->belongsTo(message::class, 'member_id');
    }



}
