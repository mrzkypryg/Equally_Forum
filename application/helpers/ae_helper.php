<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Array Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/array_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Element
 *
 * Lets you determine whether an array index is set and whether it has a value.
 * If the element is empty it returns FALSE (or whatever you specify as the default value.)
 *
 * @access	public
 * @param	string
 * @param	array
 * @param	mixed
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('getAe'))
{
	function getAe()
	{
		$d = date("Y/m/d");
	    $d = explode('/', $d);
	    $ae = $d[0];
		 if($d[1] > 6){  
		   $time = mktime(0,0,0,date("m"),date("d"),date("Y")+1);
		   $t = date("Y/m/d", $time);
		   $t = explode('/', $t);
		   $ae = $ae.'-'.$t[0];
		 }else{
			$time = mktime(0,0,0,date("m"),date("d"),date("Y")-1); 
			$t = date("Y/m/d", $time);
			$t = explode('/', $t);
			$ae = $t[0].'-'.$ae;
		 }
	 return $ae;
	}
	function getMonth(){
		$d = date("Y/m/d");
	    $d = explode('/', $d);
		$m = $d[1];
		return $m;
	}
	function getYear(){
		$d = date("Y/m/d");
	    $d = explode('/', $d);
		$m = $d[0];
		return $m;
	}
	function getDay(){
		$d = date("Y/m/d");
	    $d = explode('/', $d);
		$m = $d[2];
		return $m;
	}
	function getdayWeak($i){
		  
		$d = date(getYear()."-".getMonth()."-".$i);
		$tempDate = $d;
		return date('D', strtotime( $tempDate));
	}
	function getDat(){
		$d = date("Y-m-d");
		return $d;
	}
	function getMonthname($i){
		if($i == 01){
			return 'January';
		}else if($i == 02){
			return 'February';
		}else if($i == 03){
			return 'March';
		}else if($i == 04){
			return 'Apiral';
		}else if($i == 05){
			return 'May';
		}else if($i == 06){
			return 'June';
		}else if($i == 07){
			return 'July';
		}else if($i == 8){
			return 'Augest';
		}else if($i == 9){
			return 'Sectember';
		}else if($i == 10){
			return 'October';
		}else if($i == 11){
			return 'November';
		}else if($i == 12){
			return 'December';
		}
	}
}
if ( ! function_exists('rev'))
{
	function rev($dat){
		if(!empty($dat)){
			$earr = explode('/', $dat);	
			//print_r($earr);
			$ndob = $earr[2].'-'.$earr[1].'-'.$earr[0]; 
			return $ndob;
		}
		
		
	}
	
	function rev1($dat){
		if(!empty($dat)){
			$earr = explode('/', $dat);	
			//print_r($earr);
			$ndob = $earr[2].'-'.$earr[1].'-'.$earr[0]; 
			return $ndob;
		}
	}
	
	function change($dat){
		if(!empty($dat)){
			$earr = explode('-', $dat);	
			//print_r($earr);
			$ndob = $earr[2].'/'.$earr[1].'/'.$earr[0]; 
			return $ndob;
		}
		
		
	}
	function checkrev($dat){
		$earr = explode('/', $dat);	
		if(strlen($earr[0]) == 2){
			$ndob = $earr[2].'-'.$earr[1].'-'.$earr[0]; 
			return $ndob;
		}else{
			return $dat;
		}
	}
	
}

