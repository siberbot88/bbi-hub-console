<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasUlids;
    protected $fillable = [
        'code',
        'amount',
        'due_date',
        'paid_at',
        'transaction_id',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
