<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class TemplateController extends Controller
{
    public function show(string $id)
    {
        $template = Template::find($id);
        if ($template) {
            return response()->json($template);
        } else {
            return response()->json(['message' => 'Template not found'], 404);
        }
    }
}