<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        // get all middleware role parameters
        $roles = array_slice(func_get_args(), 2);

        foreach ($roles as $role) {
            try {
                Role::whereName($role)->firstOrFail(); // make sure we got a "real" role
                if ($user->hasRole($role)) {
                    return $next($request);
                }
            } catch (\Exception $exception) {
                return redirect()->route('home')->with('message', 'Could not find role "'.$role.'". ');
            }
        }

        return redirect('/')->with('message', 'You are not authorized to view that content or to do this.');
    }
}
