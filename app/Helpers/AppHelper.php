<?php
use Illuminate\Support\Facades\Auth;

if (!function_exists('getOrgId')) {
    function getOrgId()
    {
        return Auth::user()->org_id;
    }

    function getUserId()
    {
        return Auth::user()->id;
    }

    
}
