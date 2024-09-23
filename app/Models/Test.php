<?php

namespace App\Models;

use Rishadblack\OracleTableLinker\Traits\HasDbLink;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model {
    use HasDbLink;
    use HasFactory;
}
