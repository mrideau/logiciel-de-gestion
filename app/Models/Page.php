<?php

namespace App\Models;

use Dotlogics\Grapesjs\App\Contracts\Editable;
use Dotlogics\Grapesjs\App\Traits\EditableTrait;
use Illuminate\Database\Eloquent\Model;

class Page extends Model implements Editable
{
    use EditableTrait;

    protected $fillable = [
      'name', 'slug', 'route'
    ];

    protected $guarded = [
      'gjs_data'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
