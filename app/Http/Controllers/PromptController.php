<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrokPHP\Laravel\Facades\GrokAI;
use GrokPHP\Client\Config\ChatOptions;
use GrokPHP\Client\Enums\Model;

class PromptController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string|max:255',
        ]);

        $prompt = $request->input('prompt');

        $response = GrokAI::chat(
            [['role' => 'user', 'content' => $prompt]],
            new ChatOptions(model: Model::GROK_2)
        );

        return redirect()->back()->with(['response'=> $response->content()]);
    }
}
