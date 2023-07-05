<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyFee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function members()

    {
        return $this->belongsTo(Member::class, 'member_uniq_id');
    }
}
