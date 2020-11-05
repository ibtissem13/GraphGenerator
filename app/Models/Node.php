<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;
	 protected $table = 'nodes';
    protected $primaryKey= 'id';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  protected $fillable = [
         'graph_id'
    ];
    public function graph()
{ 
    return $this->belongsTo('App\Models\Graph'); 
}
	
	public function children(){
	return $this->hasMany('App\Models\Relation','parent_id','id');
	}

	
	
}
