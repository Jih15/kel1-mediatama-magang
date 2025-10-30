<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'user_id',
        'category_id',
        'type',
        'amount',
        'date',
        'description',
        'receipt_file'
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'category_id');
    }

    public function notifications()
    {
        return $this->hasOne(Notifications::class, 'transaction_id', 'transaction_id');
    }
}
