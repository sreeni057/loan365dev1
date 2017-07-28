<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class purchases extends Model
{
    use SoftDeletes;
    /*Table Name*/
	protected $table = 'purchases';
	/*insert query*/
	public static function insertvalues($inputArr)
	{
		$insertvalue         = DB::table('purchases')
    							->insertGetId($inputArr);
    	return $insertvalue;
	}
	/*update query*/
	public static function updatevalues($id,$inputArr)
	{
		$updatevalues         = DB::table('purchases')
								->where('id',$id)
    						 	->update($inputArr);
    	return $updatevalues;
	}
	/*fetch single row*/
	public static function fetchvalues($id)
	{
		$fetchvalues         = DB::table('purchases')
    						 	->where('id',$id)
								->first();
    	return $fetchvalues;
	}
	/*Delete row*/
	public static function deletevalues($id)
	{
		$deletevalues         = DB::table('purchases')
    						 	->where('id',$id)
								->delete();
    	return $deletevalues;
	}
	/*Table value check */
	public static function check_table($id)
	{
		$check_table 		= DB::table('purchases')
		    						 	->where('id',$id)
										->count();
		return $check_table;
	}
	public static function validation($inputArr)
    {

        $rules    =[
			                'mortgage_type' => 'required',
			                'buyer_type' => 'required',
                   ];
                  

        $messages = array(
				            'mortgage_type.required' => 'Please Select Mortgage Type',
				            'buyer_type.required' => 'Please Select Buyer Type',
        				 );
        $validator = \Validator::make($inputArr, $rules, $messages);
        return $validator;
    }
	
}
