<?php

namespace Tots\TemplatesAccount\Http\Controllers\Components;

use Illuminate\Http\Request;
use Tots\Account\Models\TotsAccount;
use Tots\Templates\Http\Controllers\Components\UpdateCurrentController as ComponentsUpdateController;
use Tots\Templates\Models\TotsComponent;
use Tots\TemplatesAccount\Models\TotsTemplateAccount;

class UpdateController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        // Get Current Template
        $template = $request->input(TotsTemplate::class);
        // Get Component
        $item = TotsComponent::where('id', $id)->where('template_id', $template->id)->first();
        if($item === null) {
            throw new \Exception('Component not exist');
        }
        // Process validations
        $this->validate($request, [
            'title' => 'required|min:3',
        ]);
        // Execute update controller
        $controller = new ComponentsUpdateController();
        return $controller->handle($id, $request->merge([
            TotsComponent::class => $item
        ]));
    }
}