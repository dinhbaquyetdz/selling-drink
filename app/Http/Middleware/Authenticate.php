<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // if(Auth::check()){
        //     if(Auth::user()->role == 1){
        //         return Route('index');
        //     }elseif(Auth::user()->role == 2){
        //         return "Admin";
        //     }
        // }else{
        //     return Route('login');
        // }
        
        return $request->expectsJson() ? null : route('login');
    }
}
