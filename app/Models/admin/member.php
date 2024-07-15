<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;

    protected $table = "member";

    protected $primaryKey = "id";

    protected $fillable = ['name_member', 'name_login', 'password', 'Email', 'role', 'born', 'numberphone', 'ID_number_card', 'address'];
}
