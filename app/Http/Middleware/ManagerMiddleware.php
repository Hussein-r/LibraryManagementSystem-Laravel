<?php

namespace App\Http\Middleware;
use Auth;
use App\User;
use Closure;

class ManagerMiddleware
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
        $manager=@auth::user();
        if($manager->is_admin ==1)
        {
             redirect('chart');
                return $next($request);

        }
        else{
            
            // $message = 'you are not authorized ';
                return redirect('error');
            // dd('hit');
        }
       
    }
}
