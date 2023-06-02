<?php

namespace Tots\TemplatesAccount\Http\Middlewares;

use Closure;
use Tots\Account\Models\TotsAccount;
use Tots\Templates\Models\TotsTemplate;
use Tots\TemplatesAccount\Models\TotsTemplateAccount;

class TemplateByAccountOnlyMiddleware
{
    /**
     * Obtiene la cuenta
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get Current Account
        $account = $request->input(TotsAccount::class);

        // Get First Template
        $permission = TotsTemplateAccount::where('account_id', $account->id)->first();
        if($permission === null){
            throw new \Exception('The template not exist');
        }

        return $next($request->merge([TotsTemplate::class => $permission->template]));
    }
}
