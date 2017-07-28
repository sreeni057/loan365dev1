<?php
/*
  Module Name : New user & old user starting page for guest 
  Created By  : Sreenivasan M  
*/

namespace Citw\Loan365\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\purchases;
use App\Models\remortages;
use Session;

class guest extends Controller
{
	/*The function used for new user and existing user Welcomemessage & Onboarding*/
    public function purchase($key)
    {
    	switch ($key) {
    			/*Welcome Message*/
 			case '1':
 				return view('loan365::welcomemsg.welcomeMsg');
 				break;
 				/*Select Mortgage Type*/
 			case '2': 	
 				$id                  	 = session::get('last_id');
 				$type                    = session::get('mortgage_type');
 				$mortgage_type			 = Input::get('mortgage_type');
 				$buyer_type			 	 = Input::get('buyer_type');
 				$remortgage_type	  	 = Input::get('remortgage_type');
 				/*insert*/
 			    if(Input::has('onboarding_upd'))
 				{
 					/*purchases*/
 					if($mortgage_type == 1)
	 				{
	 					$values_check  = purchases::check_table($id);
	 					if($values_check == 1)
	 					{
	 						$inputArr 				 = array(
					 										'mortgage_type'      => $mortgage_type,
					 										'buyer_type'         => $buyer_type,
					 									);

		 					/*update to purchases table*/
			 				$fetch_val       		 = purchases::updatevalues($id,$inputArr);

	 					}
	 					elseif($values_check == 0)
	 					{
	 						$inputArr 				 = array(
					 										'mortgage_type'      => $mortgage_type,
					 										'buyer_type'         => $buyer_type,
					 									);

		 					/*Insert to purchases table*/
			 				$last_id       		     = purchases::insertvalues($inputArr);

			 				/*Delete to remortages table*/
			 				$delete_val      		 = remortages::deletevalues($id);

			 				session(['last_id'		 => $last_id]);

		 					$fetch_remortage_table 	 = purchases::fetchvalues($last_id);

		 					$mortgage_type 			 = $fetch_remortage_table->mortgage_type;

		 					session(['mortgage_type' => $mortgage_type]); 
	 					}
	 					else
	 					{
	 						return redirect('error');
	 					}
	 					$key 					     = 4;
			 			return redirect('onboarding/'.$key);
	 				}
	 				/*remortages*/
	 				else if($mortgage_type == 2)
	 				{
	 					$values_check                = remortages::check_table($id);
	 					if($values_check == 1)
	 					{
	 						$inputArr 			     = array(
					 										'mortgage_type'      => $mortgage_type,
					 										'remortgage_type'    => $remortgage_type,
					 								   );
		 					/*update to remortages table*/
			 				$fetch_val      	     = remortages::updatevalues($id,$inputArr);
			 				$key                     = 3;
	 					}
	 					elseif($values_check == 0)
	 					{
	 						$inputArr 				 = array(
					 										'mortgage_type'      => $mortgage_type,
					 										'remortgage_type'    => $remortgage_type,
					 									);

		 					/*Insert to purchases table*/
			 				$last_id       		     = remortages::insertvalues($inputArr);
			 				/*Delete to purchases table*/
			 				$delete_val      		 = purchases::deletevalues($id);

			 				session(['last_id'		 => $last_id]);

		 					$fetch_remortage_table 	 = remortages::fetchvalues($last_id);

		 					$mortgage_type 			 = $fetch_remortage_table->mortgage_type;

		 					session(['mortgage_type' => $mortgage_type]); 

		 					$key    			     = 3;
	 					}
	 					else
	 					{
	 						return redirect('error');
	 					}
		 				return redirect('onboarding/'.$key);
	 				}
 				}
 				else
 				{
 					if(isset($id))
	 				{	
	 					/*purchases*/
	 					if($type == 1)
	 					{
	 						$fetch_val         = purchases::fetchvalues($id);
		 					$fetchvalues       = array(
				 											'id'            	=> $id,  
				 											'mortgage_type'		=> $type,
				 											'buyer_type'   		=> $fetch_val->buyer_type
			 										   );
	 					}
	 					/*remortages*/
	 					elseif($type == 2)
	 					{

	 						$fetch_val         = remortages::fetchvalues($id);
		 					$fetchvalues       = array(
				 											'id'                 => $fetch_val->id,  
				 											'mortgage_type'      => $fetch_val->mortgage_type,
				 											'buyer_type'         => $fetch_val->remortgage_type
			 										   );
	 					}
	 				}
	 				else
	 				{
			 				$fetchvalues       = array(
				 											'id'           		=>'',
				 											'mortgage_type'	    =>old('mortgage_type'),
				 											'buyer_type'        =>old('buyer_type')
				 									  );
	 				}
 				}
 				return view('loan365::onboarding.onboarding2',compact('key','fetchvalues'));
 				break;
 			/*Let’s do a quick health check on your current mortgage.*/
 			case '3':
 				$last_id        						= session::get('last_id');
 			    $type                   				= session::get('mortgage_type');
 			    if(empty($last_id))
 			    {
 			    	return redirect('oops');
 			    }
 				if(Input::has('onboarding_upt'))
 				{
 					$total_years_mortages   			= Input::get('total_years_mortages');
 					$value_of_home 						= Input::get('value_of_home');
 					$monthly_mortages_repay 			= Input::get('monthly_mortages_repay');
 					$balance_current_mortages 			= Input::get('balance_current_mortages');
 					$day  							 	= Input::get('day');
 					$month  							= Input::get('month');
 					$year    							= Input::get('year');
 					$inputArr                           = array(
 																	'total_years_mortages'                  => $total_years_mortages,
 																	'value_of_home'                         => $value_of_home,
 																	'monthly_mortages_repay'                => $monthly_mortages_repay,
 																	'balance_current_mortages'              => $balance_current_mortages,
 																	'end_date_mortgage_introductory'        => $day.'/'.$month.'/'.$year
 															   );
 					$fetchvalues 						= remortages::updatevalues($last_id,$inputArr);
 					$key                                = 4;
 					return redirect('onboarding/'.$key);
 				}
 				$fetchvalues							= remortages::fetchvalues($last_id);
 				$date_value  							= explode("/",$fetchvalues->end_date_mortgage_introductory);
 				if($date_value['0'] == "")
 				{
 					$fetchvalues->day 					= old('day'); 							
	 				$fetchvalues->month 				= old('month'); 							
	 				$fetchvalues->year 					= old('year');
 				}
 				else
 				{
 					$fetchvalues->day 					= $date_value['0']; 							
 					$fetchvalues->month 				= $date_value['1']; 							
 					$fetchvalues->year 					= $date_value['2']; 							
 				}
 				return view('loan365::onboarding.onboarding3',compact('key','fetchvalues'));
 				break;
 			/*Applying Type*/
 			case '4':
 				$last_id        						= session::get('last_id');
 			    $type                   				= session::get('mortgage_type');
 			    if(Input::has('onboarding_upd'))
 			    {
 			    	$applying_type                      = Input::get('applying_type');
 			    	$inputArr							= array(
 			    													'applying_type'		=> $applying_type
 			    											   );
 			    	if($type == '1')
 			    	{
 			    		$fetch_val       		        = purchases::updatevalues($last_id,$inputArr);
 			    	}
 			    	elseif($type == '2')
 			    	{
 			    		$fetchvalues 					= remortages::updatevalues($last_id,$inputArr);
 			    	}
 			    	$key = 5;
 			    	return redirect('onboarding/'.$key);

 			    }
 			    if($type == '1')
 			    {
 			    	$fetchvalues						= purchases::fetchvalues($last_id);
 			    }
 			    elseif ($type == '2') 
 			    {
 			    	$fetchvalues						= remortages::fetchvalues($last_id);	
 			    }
 			    else
 			    {
 			    	return redirect('error');
 			    }
 			    $fetchvalues							= array(	
 			    													'id' 			      => $last_id,
 			    													'mortgage_type'       => $type,
 			    													'applying_type' 	  => $fetchvalues->applying_type 

 			    											   );					
 				return view('loan365::onboarding.onboarding4',compact('key','fetchvalues'));
 				break;
 			/*A big part of how much you can borrow is dependent on your income and your available savings*/
 			case '5': 		
 				$last_id        						= session::get('last_id');
 			    $type                   				= session::get('mortgage_type');
 			    $earn_each_year							= Input::get('earn_each_year');
 			    $stamp_duty 							= Input::get('stamp_duty');
 			    if(Input::has('onboarding_upd'))
 			    {	
 			    	$applying_type                      = Input::get('applying_type');
 			    	$inputArr							= array(
 			    													'earn_each_year'		=> $earn_each_year,
 			    													'stamp_duty'			=> $stamp_duty
 			    											   );
 			    	if($type == '1')
 			    	{
 			    		$fetch_val       		        = purchases::updatevalues($last_id,$inputArr);
 			    	}
 			    	elseif($type == '2')
 			    	{
 			    		$fetchvalues 					= remortages::updatevalues($last_id,$inputArr);
 			    	}
 			    	$key = 6;

 			    	return redirect('onboarding/'.$key);
 			    }
 			    if ($type == '1')
 			    {
 			    	$fetchvalues						= purchases::fetchvalues($last_id);
 			    }
 			    elseif ($type == '2') 
 			    {
 			    	$fetchvalues						= remortages::fetchvalues($last_id);	
 			    }
 			    else
 			    {
 			    	return redirect('error');
 			    }
 				$fetchvalues							= array(	
 			    													'id' 			      => $last_id,
 			    													'mortgage_type'       => $type,
 			    													'earn_each_year'	  => $fetchvalues->earn_each_year,
 			    													'stamp_duty'		  => $fetchvalues->stamp_duty
 			    											   );		 				 
 				return view('loan365::onboarding.onboarding5',compact('key','fetchvalues'));
 				break;
 			/*Lenders also consider your other loans and credit arrangements when deciding how much you can borrow.*/
 			case '6':
 				$last_id        						= session::get('last_id');
 			    $type                   				= session::get('mortgage_type');
 			    $outstanding_cc_balances                = Input::get('outstanding_cc_balances');
 			    $monthly_repay_loan                     = Input::get('monthly_repay_loan');
 			    $country_court_judegment                = Input::get('country_court_judegment');
 			    $iva                                    = Input::get('iva');
 			    if(!empty(session::get('user_id')))
 			    		{
 			    			$inputArr = array(
 			    								'user_id' => session::get('user_id')
 			    							 );
 			    			purchases::updatevalues(session::get('last_id'),$inputArr);
 			    		}
 			    if(Input::has('onboarding_upd'))
 			    {	
 			    	$applying_type                      = Input::get('applying_type');

 			    	$inputArr							= array(
 			    													'outstanding_cc_balances'		=> $outstanding_cc_balances,
 			    													'monthly_repay_loan'			=> $monthly_repay_loan,
 			    													'country_court_judegment'	    => $country_court_judegment,
 			    													'iva'	    					=> $iva
 			    											   );
 			    	if($type == '1')
 			    	{
 			    		$fetch_val       		        = purchases::updatevalues($last_id,$inputArr);
 			    	}
 			    	elseif($type == '2')
 			    	{
 			    		$fetchvalues 					= remortages::updatevalues($last_id,$inputArr);
 			    	}
 			    	if($iva == 1 || $country_court_judegment == 1)
 			    	{
 			    		$key = 9;
 			    	}
 			    	else
 			    	{
 			    		$key = 7;
 			    	}
 			    	return redirect('onboarding/'.$key);
 			    }
 			    if ($type == '1')
 			    {
 			    	$fetchvalues						= purchases::fetchvalues($last_id);
 			    }
 			    elseif ($type == '2') 
 			    {
 			    	$fetchvalues						= remortages::fetchvalues($last_id);	
 			    }
 			    else
 			    {
 			    	return redirect('error');
 			    }
 				$fetchvalues							= array(	
 			    													'id' 			              => $last_id,
 			    													'mortgage_type'               => $type,
 			    													'outstanding_cc_balances'	  => $fetchvalues->outstanding_cc_balances,
 			    													'monthly_repay_loan'		  => $fetchvalues->monthly_repay_loan,
 			    													'country_court_judegment'	  => $fetchvalues->country_court_judegment,
 			    													'iva'		 				  => $fetchvalues->iva
 			    											   );
 				return view('loan365::onboarding.onboarding6',compact('key','fetchvalues'));
 				break;
 			/*There are two primary products to choose between: fixed rate and variable rate.*/
 			case '7':
 				$last_id        						= session::get('last_id');
 			    $type                   				= session::get('mortgage_type');
 			    $appeals_type                           = Input::get('appeals_type');
 			    $introductory_rate                      = Input::get('introductory_rate');
 			    $capital_type                           = Input::get('capital_type');
 			    if(Input::has('onboarding_upd'))
 			    {	
 			    	$inputArr							= array(
 			    													'appeals_type'		  => $appeals_type,
 			    													'introductory_rate'	  => $introductory_rate,
 			    													'capital_type'	      => $capital_type
 			    											   );
 			    	if($type == '1')
 			    	{
 			    		$fetch_val       		        = purchases::updatevalues($last_id,$inputArr);
 			    	}
 			    	elseif($type == '2')
 			    	{
 			    		$fetchvalues 					= remortages::updatevalues($last_id,$inputArr);
 			    	}
 			    	$key = 8;

 			    	return redirect('onboarding/'.$key);
 			    }
 			    if ($type == '1')
 			    {
 			    	$fetchvalues						= purchases::fetchvalues($last_id);
 			    }
 			    elseif ($type == '2') 
 			    {
 			    	$fetchvalues						= remortages::fetchvalues($last_id);	
 			    }
 			    else
 			    {
 			    	return redirect('error');
 			    }
 			    $fetchvalues							= array(	
 			    													'id' 			              => $last_id,
 			    													'mortgage_type'               => $type,
 			    													'appeals_type'		 		  => $fetchvalues->appeals_type,
 			    													'introductory_rate'	  		  => $fetchvalues->introductory_rate,
 			    													'capital_type'	     		  => $fetchvalues->capital_type
 			    											   );

 				return view('loan365::onboarding.onboarding7',compact('key','fetchvalues'));
 				break;
 			/*Lastly, we need some personal details..*/
 			case '8':
 				$last_id        						= session::get('last_id');
 			    $type                   				= session::get('mortgage_type');
 			    $user_name                              = Input::get('user_name');
 			    $user_email                             = Input::get('user_email');
 			    $day                                    = Input::get('day');
 			    $month                                  = Input::get('month');
 			    $year                                   = Input::get('year');
 			    if(Input::has('onboarding_upd'))
 			    {	
 			    	$inputArr							= array(
 			    													'user_name'		  => $user_name,
 			    													'user_email'	  => $user_email,
 			    													'user_dob'	      => $day.'/'.$month.'/'.$year
 			    											   );
 			    	if($type == '1')
 			    	{
 			    		$fetch_val       		        = purchases::updatevalues($last_id,$inputArr);
 			    	}
 			    	elseif($type == '2')
 			    	{
 			    		$fetchvalues 					= remortages::updatevalues($last_id,$inputArr);
 			    	}
 			    	$key = 9;

 			    	return redirect('onboarding/'.$key);
 			    }
 			    if ($type == '1')
 			    {
 			    	$fetchvalues						= purchases::fetchvalues($last_id);
 			    	
 			    }
 			    elseif ($type == '2') 
 			    {
 			    	$fetchvalues						= remortages::fetchvalues($last_id);	 			    	
 			    }
 			    else
 			    {
 			    	return redirect('error');
 			    }
 			    $date_value  						= explode("/",$fetchvalues->user_dob);
 			    	if($date_value['0'] == "")
	 				{
	 					$fetchvalues->day 					= old('day'); 							
		 				$fetchvalues->month 				= old('month'); 							
		 				$fetchvalues->year 					= old('year');
	 				}
	 				else
	 				{
	 					$fetchvalues->day 					= $date_value['0']; 							
	 					$fetchvalues->month 				= $date_value['1']; 							
	 					$fetchvalues->year 					= $date_value['2']; 							
	 				}
 				$fetchvalues							= array(	
 			    													'id' 			              => $last_id,
 			    													'mortgage_type'               => $type,
 			    													'user_name'		 		      => $fetchvalues->user_name,
 			    													'user_email'	  		      => $fetchvalues->user_email,
 			    													'day'                         => $fetchvalues->day,
 			    													'month'                       => $fetchvalues->month,
 			    													'year'                        => $fetchvalues->year,
 			    											   );
 				return view('loan365::onboarding.onboarding8',compact('key','fetchvalues'));
 				break;
 			case '9':
 					if(session::get('user_id'))
 					{
 						return redirect('dashbord');	
 					}
 					return redirect('register');
 					break;
 			default:
 				return redirect('error');
 				break;
 		}
    }
}
