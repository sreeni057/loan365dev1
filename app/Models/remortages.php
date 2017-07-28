<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class remortages extends Model
{
    use SoftDeletes;
    /*Table Name*/
	protected $table         = 'remortages';
	/*insert query*/
	public static function insertvalues($inputArr)
	{
		$insertvalue         = DB::table('remortages')
    							->insertGetId($inputArr);
    	return $insertvalue;
	}
	/*update query*/
	public static function updatevalues($id,$inputArr)
	{
		$updatevalues         = DB::table('remortages')
								->where('id',$id)
    						 	->update($inputArr);
    	return $updatevalues;
	}
	/*fetch single row*/
	public static function fetchvalues($id)
	{
		$fetchvalues         = DB::table('remortages')
    						 	->where('id',$id)
								->first();
    	return $fetchvalues;
	}
	/*Delete row*/
	public static function deletevalues($id)
	{
		$deletevalues        = DB::table('remortages')
    						 	->where('id',$id)
								->delete();
    	return $deletevalues;
	}
	/*Table value check */
	public static function check_table($id)
	{
		$check_table 		= DB::table('remortages')
		    						 	->where('id',$id)
										->count();
		return $check_table;
	}
}
