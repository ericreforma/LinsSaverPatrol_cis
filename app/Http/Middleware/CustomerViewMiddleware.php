<?php

namespace App\Http\Middleware;

use Closure;

class CustomerViewMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        foreach($request->privileges as $priv){
            if($priv->feature_id == 1) {
                if($priv->rolw_view == 1){
                    
                }
            }
        }

        return $next($request);
    }
}
