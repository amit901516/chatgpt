<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;

class AiController extends Controller
{
    public function index()
    {
        return view('ai.index');

    }
    public function result(Request $request)
    {
        $topic = $request->topic;
        $open_ai = new OpenAi(env('OPEN_AI_API_KEY'));
        $prompt = "SEO report on ".
        $topic."";

        $openAiOutput = $open_ai->complete([
            'engine' => 'text-davinci-003',
            'prompt' => $prompt,
            'temperature' => 0.9,
            'max_tokens' => 800,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
        ]);

        $output = json_decode($openAiOutput, true);
        $outputText = $output["choices"][0]["text"];
        return view('ai.index', ['result' =>  $outputText] );
    }
}
