<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User; // custome
use Illuminate\Http\Request;
use Session; // custome
use App\Http\Traits\ResponseTrait; // custome

class isOwner
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session::has('userId') || Session::has('userId')==null || !Session::has('identity')){
            return redirect()->route('logOut');
        }else{
            $user=User::find(Session::get('userId'));
            if(!$user){
                return redirect()->route('logOut');
            }else if(Session::get('identity') != 'owner'){
                return redirect(route(Session::get('identity').'.dashboard'))->with($this->resMessageHtml(false,'error','Access Denied'));
            }else{
                return $next($request);
            }
        }
        return redirect()->route('logOut');
    }
}
