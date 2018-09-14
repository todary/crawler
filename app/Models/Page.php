<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Page extends Model
{

    use SoftDeletes;

    protected $table = "pages";

    protected $primaryKey = "page_id";

    protected $dates = ["deleted_at"];

    protected $fillable = [
        'page_url'
    ];

}
