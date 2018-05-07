<?php
/**
 * Helper functions for the application
 * @author skpaul82 <hello@skpaul.me>
 * 
 */


/**
 * [dd helper function to dump data if array or just echo as string, by default]
 * @param  [type]  $param     [array or string or number]
 * @param  integer $is_exit [boolean value 1/0 for terminating the script]
 * @return [type]           [dump/echo param]
 */
function dd($param, $is_exit=1)
{
	// check the arr argument is array or not
	if(is_array($param)){
		echo '<pre>';
		var_dump($param);
		echo '</pre>';

	}else{

		echo $param;
	}

	if($is_exit == 1)
		exit;
}