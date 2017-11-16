<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ArticleCategory extends Model
{
	use SoftDeletes;
    protected $table = 'article_category';
}
