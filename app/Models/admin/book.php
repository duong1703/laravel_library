<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $table = "book";

    protected $primaryKey = "id";

    protected $fillable = [  'admin_id' , 'book_images', 'book_name', 'book_author', 'book_file', 'book_publisher', 'book_year_of_manufacture', 'book_amount', 'book_category', 'sub_categories_id' , 'book_status'];

    public function readbooks()
    {
        return $this->hasMany(readbook::class);
    }

    public function comments()
    {
        return $this->hasMany(comment::class);
    }

    public function toSearchableArray()
    {
        $array = $this->only([
            'book_name', 
            'book_author', 
            'book_category'
        ]);
    
        return $array;
    }

    public function admin(){
        return $this->belongsTo(admin::class, 'admin_id');
    }

    public function subcategories(){
        return $this->belongsTo(subcategories::class,'sub_categories_id');
    }
}
