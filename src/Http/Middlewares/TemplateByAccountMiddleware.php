<?php

namespace Tots\TemplatesAccount\Http\Middlewares;

use Closure;
use Tots\Account\Models\TotsAccount;
use Tots\Templates\Models\TotsTemplate;
use Tots\TemplatesAccount\Models\TotsTemplateAccount;

class TemplateByAccountMiddleware
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
        // Get Currente template
        $template = $request->input(TotsTemplate::class);
        // Verify if template and account are related
        $permission = TotsTemplateAccount::where('template_id', $template->id)->where('account_id', $account->id)->first();
        if($permission === null){
            throw new \Exception('The template not exist');
        }
        // Return next request
        return $next($request);
    }
}
