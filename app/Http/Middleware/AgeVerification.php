<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;

class AgeVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(! $this->checkAge($request->cookie('check_age'))){
            if($request->isMethod('GET')){
                $verification = view('age-verification');
                
                return response($verification);
            }
    
            if($request->isMethod('POST')){
                $check = abs( (int) $request->input('check') );
                $age = date('Y') - $check;
                
                if($this->checkAge($age)){
                    Cookie::queue('check_age', $age, 15);
    
                    return redirect()->route('register');
                }
                
                return redirect()->route('home');
            } 
        }

        return $next($request);
    }

    private function checkAge($value){
        $age = abs( (int) $value );

        return ($age > 18 and $age < 80);
    }
}
