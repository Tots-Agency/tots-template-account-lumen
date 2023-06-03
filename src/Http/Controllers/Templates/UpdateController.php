<?php

namespace Tots\TemplatesAccount\Http\Controllers\Templates;

use Illuminate\Http\Request;
use Tots\Account\Models\TotsAccount;
use Tots\Templates\Http\Controllers\Templates\UpdateController as TemplatesUpdateController;
use Tots\TemplatesAccount\Models\TotsTemplateAccount;

class UpdateController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        // Get Current Account
        $account = $request->input(TotsAccount::class);

        $itemRel = TotsTemplateAccount::where('template_id', $id)->where('account_id', $account->id)->first();
        if($itemRel === null) {
            throw new \Exception('Item not exist');
        }
        // Process validations
        $this->validate($request, [
            'title' => 'required|min:3',
        ]);
        // Execute update controller
        $controller = new TemplatesUpdateController();
        return $controller->handle($id, $request);
    }
}