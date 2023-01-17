<?php

namespace App\Http\Controllers;

use OpenAI;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArticleGenerator extends Controller
{
    public function index(Request $input)
    {
        if ($input->title == null) {
            return;
        }

        $title = $input->title;

        $client = OpenAI::client(config('app.openai_api_key'));
        
        $result = $client->completions()->create([
            "model" => "text-davinci-003",
            
            'max_tokens' => 10,
            'prompt' =>  $title,
        ]);

        $content = trim($result['choices'][0]['text']);


        return view('write', compact('title', 'content'));
    }
}
