<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class SubPage extends Model
{

    use SoftDeletes;

    protected $table = "sub_pages";

    protected $primaryKey = "sub_page_id";

    protected $dates = ["deleted_at"];

    protected $fillable = [
        'page_id','sub_page_url'
    ];

}
