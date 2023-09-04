<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
  use HasFactory, Sluggable;

  protected $guarded = [];

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }

  public function quotes()
  {
    return $this->belongsToMany(Quote::class, 'quote_tag');
  }

  public function group()
  {
    return $this->belongsTo(TagsGroup::class, 'group_id');
  }
}
