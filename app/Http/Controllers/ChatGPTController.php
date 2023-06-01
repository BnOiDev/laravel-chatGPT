<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatGPTController extends Controller
{
    public function index()
    {
        return view('chatgpt.index');
    }

    public function ask(Request $request)
    {
        $prompt = $request->input('prompt');
        $response = $this->askToChatGPT($prompt);

        return view('chatgpt.response', ['response' => $response]);
    }

    private function askToChatGPT($prompt) {
        $response = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer ' . ('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'),
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/engines/text-davinci-003/completions', [
                "prompt" => $prompt,
                "max_tokens" => 1000,
                "temperature" => 0.5
            ]);
        
        //  $responseData = $response->json();
        //  dd($responseData);
        
        return $response->json()['choices'][0]['text'];
    }
}
