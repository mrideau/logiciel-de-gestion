<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
        'label', 'date'
    ];

    protected $guarded = [
        'operation_categories_id', 'value'
    ];

    function category() {
        return $this->belongsTo(OperationCategory::class, 'operation_categories_id');
    }
}
