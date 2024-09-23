<?php

namespace App\Models\Demo\News;

use Rishadblack\OracleTableLinker\Traits\HasDbLink;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasDbLink;
    use HasFactory;
}
