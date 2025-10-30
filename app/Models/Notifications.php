<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $primaryKey = 'notification_id';

    protected $fillable = [
        'user_id',
        'transaction_id',
        'sent_to',
        'sent_at',
    ];

    public $timestamps = false;

    public function transaction()
    {
        return $this->belongsTo(Transactions::class, 'transaction_id', 'transaction_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
