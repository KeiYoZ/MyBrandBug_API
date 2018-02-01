<?php 

use Illuminate\Support\Facades\DB;

function checkAccessToken($access_token, $user_id){

	$authorized_user = DB::table('oauth_access_tokens')
						->where([
							['id', '=', $access_token],
							['user_id', '=', $user_id],
						])
						->first();

	return $authorized_user ? true : false;
}


?>