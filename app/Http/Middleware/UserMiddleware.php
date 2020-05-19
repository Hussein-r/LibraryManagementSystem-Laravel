<?php

namespace App\Http\Middleware;
use Auth;
use App\User;
use Closure;

class UserMiddleware
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
        $user=@auth::user();
        if($user->is_admin ==0 && $user->is_active ==0 )
        {
           
                return $next($request);

        }
        else{
            // $message = 'you account is inactivated';
            return redirect('error');
            // dd('hit');
        }
        // return $next($request);
    }
}
