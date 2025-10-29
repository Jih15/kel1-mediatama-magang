<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name',
        'type',
    ];

    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'category_id', 'category_id');
    }

    public $timestamps = true;
}
