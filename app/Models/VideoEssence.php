<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class VideoEssence extends Model
{
	use SoftDeletes;
    protected $table = 'video_essence';
}