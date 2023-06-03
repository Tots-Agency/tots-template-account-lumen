<?php

namespace Tots\TemplatesAccount\Http\Controllers\Templates;

use Illuminate\Http\Request;
use Tots\Account\Models\TotsAccount;
use Tots\TemplatesAccount\Models\TotsTemplateAccount;

class FetchByIdController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        // Get Current Account
        $account = $request->input(TotsAccount::class);
        
        $item = TotsTemplateAccount::where('template_id', $id)->where('account_id', $account->id)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        return $item->post;
    }
}