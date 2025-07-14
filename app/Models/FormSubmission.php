<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'email', 'phone', 'ni_number','utr_number', 'reason',
        'brp_front_url', 'brp_back_url', 'bank_statement_url', 'receipts_url'
    ];

}
