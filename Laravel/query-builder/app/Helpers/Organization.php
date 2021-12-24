<?php

namespace App\Helpers;
use App\Models\User;

class Organization{
	
	public static function getOrganizationId()
	{
		$userId = auth()->user()->id;
        $activeUser = User::where('id',$userId)->first();
		return $activeUser->organization_id;
	}

	public static function getOrganizationAdmin()
	{
		$orgId = self::getOrganizationId();
        $currentUser = auth()->user()->id;
        $users = User::with('permissions')->where('id','!=',$currentUser)->where('organization_id', $orgId)->orderBy('id','DESC')->get(); 
        foreach($users as $user){
            $organizationAdmin = $user->permissions->pluck('name')->first();
        }
		return $organizationAdmin;
	}
}

?>