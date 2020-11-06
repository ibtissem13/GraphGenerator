<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
    use HasFactory;
	 protected $table = 'graphs';
    protected $primaryKey= 'id';
	
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];
	protected  $createRules = [
    'name' => 'required|unique:graphs',
    
];
 
	public function nodes()
    {
        return $this->hasMany('App\Models\Node');
    }
	 public function relashions()
    {
        return $this->hasManyThrough('App\Models\Relation', 'App\Models\Node','graph_id', 
            'parent_id', 
            'id', 
            'id' 
        );
    }
	public function getCreateRulesAttribute(){
		return $this->createRules;
	}
	public function getUpdateRules($id){
		$updateRules = [
		'name' =>['required','unique:graphs,name,'.$id],
    ];
		return $updateRules;
	}
	
	
	
}
