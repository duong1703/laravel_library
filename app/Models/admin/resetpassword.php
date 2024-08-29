<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resetpassword extends Model
{
    use HasFactory;

    protected $table = "resetpassword";

    protected $primaryKey = "id";
    protected $fillable = ['tokenId_member', 'token'];

    public function tokenId_member(){
        return $this->belongsTo(member::class);
    }
}
