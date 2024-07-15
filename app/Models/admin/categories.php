<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $primaryKey = "id";

    protected $fillable = ['name'];

    public function subcategories()
    {
        return $this->hasMany(subcategories::class, 'category_id');
    }

    
}
