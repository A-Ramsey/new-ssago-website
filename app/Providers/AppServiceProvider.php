<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\PermissionCheck;

// use App\Permission;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    public function checkRule(string $rule, $clubEventCommittee = false)
    {
        $permissionsCheck = false;
        if (!auth()->check()) {
            $permissionsCheck = false;
        } elseif ($rule == 'team_pink' && PermissionCheck::teamPink()) {
            $permissionsCheck = true;
        } elseif ($rule == 'exec' && PermissionCheck::exec()) {
            $permissionsCheck = true;
        } elseif ($rule == 'assistant' && PermissionCheck::assistant()) {
            $permissionsCheck = true;
        } elseif ($rule == 'club') {
            if (PermissionCheck::club($clubEventCommittee->id)) {
                $permissionsCheck = true;
            }
        } elseif ($rule == 'event') {
            if (PermissionCheck::event($clubEventCommittee->id)) {
                $permissionsCheck = true;
            }
        } elseif ($rule == 'on_committee') {
            if (PermissionCheck::onCommittee($clubEventCommittee->id)) {
                $permissionsCheck = true;
            }
        }
        return $permissionsCheck;
    }

    public function checkRules(Array $rules, $clubEventCommittee = false)
    {
        $permissionsCheck = false;
        foreach($rules as $rule) {
            if ($this->checkRule($rule, $clubEventCommittee)) {
                $permissionsCheck = true;
                break;
            }
        }

        return $permissionsCheck;
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('permission', function ($rules, $clubEventCommittee = false) {
            if (!is_array($rules)) {
                $rules = [$rules];
            }
            
            $permissionsCheck = $this->checkRules($rules, $clubEventCommittee);
            return $permissionsCheck;
        });

        Blade::if('isclub', function ($club, $inverse = false) {
            $isClub = false;
            if (auth()->check() && auth()->user()->club->id == $club->id) {
                $isClub = true;
            }
            
            if ($inverse) {
                return !$isClub;
            }
            return $isClub;
        });
    }
}
