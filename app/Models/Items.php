<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $fillable = ['item_name', 'image', 'description', 'finders_name', 'found_location', 'date', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
}
