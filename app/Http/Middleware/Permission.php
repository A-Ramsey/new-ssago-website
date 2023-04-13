<?php

namespace App\Http\Middleware;
use App\PermissionCheck;

use Closure;

class Permission
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$rules)
    {
        $passValidation = false;
        foreach ($rules as $rule) {
            $rule = trim($rule);
            if (!auth()->check()) {
                $passValidation = false;
                break;
            } elseif ($rule == 'team_pink' && PermissionCheck::teamPink()) {
                $passValidation = true;
                break;
            } elseif ($rule == 'exec' && PermissionCheck::exec()) {
                $passValidation = true;
                break;
            } elseif ($rule == 'assistant' && PermissionCheck::assistant()) {
                $passValidation = true;
                break;
            } elseif ($rule == 'club') {
                if (PermissionCheck::club($request->route('id'))) {
                    //uses of club should use id for the club id
                    $passValidation = true;
                    break;
                }
            } elseif ($rule == 'event') {
                if (PermissionCheck::event($request->route('eventId'))) {
                    //uses of event should use eventId for the club id
                    $passValidation = true;
                    break;
                }
            } elseif ($rule == 'on_committee') {
                if (PermissionCheck::onCommittee($request->route('committeeId'))) {
                    //uses of this should use committeeId for the committeeId
                    $passValidation = true;
                    break;
                }
            }
        }
        if ($passValidation) {
            return $next($request);
        }
        return redirect('/')->with(['messages' => 'No Permission for this page']);
    }
}
