<?php

namespace Tots\TemplatesAccount\Http\Controllers\Components;

use Illuminate\Http\Request;
use Tots\Templates\Models\TotsComponent;

class RemoveByIdController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id)
    {
        $item = TotsComponent::where('id', $id)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        $item->delete();
        return ['deletes' => $id];
    }
}