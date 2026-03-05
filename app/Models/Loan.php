<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'customer',
        'loan_number',
        'date_distributed',
        'loan_type',
        'principle',
        'bf',
        't_interest',
        'fees',
        'receipts',
        'balance',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_distributed' => 'date',
            'principle' => 'float',
            'bf' => 'float',
            't_interest' => 'float',
            'fees' => 'float',
            'receipts' => 'float',
            'balance' => 'float',
        ];
    }
}
