<?php

namespace Tots\TemplatesAccount\Http\Controllers\Components;

use Illuminate\Http\Request;
use Tots\Templates\Http\Controllers\Components\CreateController as ComponentsCreateController;
use Tots\Templates\Models\TotsTemplate;
use Tots\TemplatesAccount\Models\TotsTemplateAccount;

class CreateController extends \Laravel\Lumen\Routing\Controller
{
    public function handle(Request $request)
    {
        // Get Current Template
        $template = $request->input(TotsTemplate::class);
        // Process validations
        $this->validate($request, [
            'title' => 'required|min:3',
        ]);
        // Create Component
        $controller = new ComponentsCreateController($request);
        return $controller->handle($request->merge([
            'template_id' => $template->id,
        ]));
    }
}