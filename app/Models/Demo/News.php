<?php

namespace App\Models\Demo;

use Rishadblack\OracleTableLinker\Traits\HasDbLink;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model {
    use HasDbLink;
    use HasFactory;
}
