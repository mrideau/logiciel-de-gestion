<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Operation extends Model
{
    use HasFactory, FilterQueryString;

    protected $filters = [
        'year', 'month'
    ];

    protected $fillable = [
        'label', 'date'
    ];

    protected $guarded = [
        'operation_categories_id', 'value'
    ];

    function category() {
        return $this->belongsTo(OperationCategory::class, 'operation_categories_id');
    }

    public function year($query, $value) {
        return $query->whereYear('date', $value);
    }

    public function month($query, $value) {
        return $query->whereMonth('date', $value);
    }
}
