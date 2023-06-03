<?php

namespace Tots\TemplatesAccount\Http\Controllers\Templates;

use Illuminate\Http\Request;
use Tots\Account\Models\TotsAccount;
use Illuminate\Validation\Rule;
use Tots\Templates\Http\Controllers\Templates\CreateController as TemplatesCreateController;
use Tots\TemplatesAccount\Models\TotsTemplateAccount;

class CreateController extends \Laravel\Lumen\Routing\Controller
{
    public function handle(Request $request)
    {
        // Get Current Account
        $account = $request->input(TotsAccount::class);
        // Process validations
        $this->validate($request, [
            'title' => 'required|min:3',
        ]);
        // Create Post
        $controller = new TemplatesCreateController($request);
        $template = $controller->handle($request);
        // Add post in account
        $rel = new TotsTemplateAccount();
        $rel->template_id = $template->id;
        $rel->account_id = $account->id;
        $rel->save();
        // Return data
        return $template;
    }
}