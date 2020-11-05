<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    use HasFactory;
	 protected $table = 'relations';
    protected $primaryKey= 'id';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  protected $fillable = [
        'parent_id', 'child_id'
    ];
	  public function child()
{ 
    return $this->belongsTo('App\Models\Node','child_id','id'); 
} public function parent()
{ 
    return $this->belongsTo('App\Models\Node','parent_id','id'); 
}
}
