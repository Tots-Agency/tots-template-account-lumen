<?php

namespace Tots\TemplatesAccount\Http\Controllers\Components;

use Illuminate\Http\Request;
use Tots\Templates\Models\TotsComponent;
use Tots\Templates\Models\TotsTemplate;

class FetchByIdController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        // Get Current Template
        $template = $request->input(TotsTemplate::class);
        
        $item = TotsComponent::where('id', $id)->where('template_id', $template->id)->first();
        if($item === null) {
            throw new \Exception('Component not exist');
        }
        return $item;
    }
}