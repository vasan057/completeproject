<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ArticleEssence extends Model
{
	use SoftDeletes;
    protected $table = 'article_essence';
}