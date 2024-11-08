<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Scout\Engines\Engine;
use Laravel\Scout\EngineManager;

class book extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = "book";

    protected $primaryKey = "id";

    protected $fillable = ['book_images', 'book_name', 'book_author', 'book_file', 'book_publisher', 'book_year_of_manufacture', 'book_amount', 'book_category', 'book_status'];

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

    public function searchableUsing(): Engine
    {
        return app(EngineManager::class)->engine('algolia');
    }
}
