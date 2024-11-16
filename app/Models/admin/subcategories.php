<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategories extends Model
{
    use HasFactory;

    protected $table = "subcategories";

    protected $primaryKey = "id";

    protected $fillable = ['name', 'category_id'];

    public function category()
    {
        return $this->belongsTo(categories::class);
    }

    public function book(){
        return $this->hasMany(book::class, 'sub_categories_id');
    }
}
