<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Items extends Model
{
    protected $table = 'lost_items';
    protected $fillable = ['item_name', 'image', 'description', 'finders_name', 'found_location', 'date', 'category_id', 'status'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
}
