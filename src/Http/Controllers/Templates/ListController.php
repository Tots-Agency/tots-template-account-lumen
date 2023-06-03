<?php

namespace Tots\TemplatesAccount\Http\Controllers\Templates;

use Illuminate\Http\Request;
use Tots\Account\Models\TotsAccount;
use Tots\Templates\Models\TotsTemplate;

class ListController extends \Laravel\Lumen\Routing\Controller
{
    public function handle(Request $request)
    {
        // Get Current Account
        $account = $request->input(TotsAccount::class);
        // Create query
        $elofilter = \Tots\EloFilter\Query::run(TotsTemplate::class, $request);
        // Custom filters
        $elofilter->getQueryRequest()->addJoin('tots_template_account', 'tots_template_account.template_id', 'tots_template.id');
        $elofilter->getQueryRequest()->addWhere('tots_template_account.account_id', $account->id);
        // Execute query
        return $elofilter->execute();
    }
}