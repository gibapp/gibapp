<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Items;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['category_name'];

    public function items(): HasMany
    {
        return $this->hasMany(Items::class, 'category_id');
    }

    use HasFactory;
}
