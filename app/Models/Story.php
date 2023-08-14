<?php

namespace App\Models;

use App\Http\Controllers\MyStoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Story extends Model
{
    use HasFactory;

    protected $table='stories';

    protected $fillable=[
        'nameStory',
        'thumbnail',
        'author',
        'information',
    ];
}
