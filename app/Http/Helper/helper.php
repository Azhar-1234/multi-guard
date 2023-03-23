<?php

	//get unautorized message
	if (!function_exists('unauthorized_message')){
		function unauthorized_message($message='Unauthorized access'){
			return translate($message);
		}
    }
    //auth user informations
	if (!function_exists('auth_user')){
		function auth_user($guardName = 'admin'){
			return Auth::guard($guardName)->user();
		}

    }
	//permissions check method
	if (!function_exists('permission_check')){
		function permission_check($permission){
			$permissions = format_permissions(json_decode(auth_user()->role->permissions,true));
			if(in_array($permission,$permissions)){
				return true;
			}
			return false;
		}
	}
	  
	//permisson formations
	if (!function_exists('format_permissions')){
		function format_permissions($permissions){
			$permission_values = [];
			foreach ($permissions as $features) {
				foreach ($features as $feature) {
					$permission_values = array_merge($permission_values, $feature);
				}
			}
			return $permission_values ;
		}
	}