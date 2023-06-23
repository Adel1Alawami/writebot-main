<?php

namespace App\Http\Controllers;

use OpenAI;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArticleGenerator extends Controller
{
    public function index(Request $input)
    {
        if ($input->title == null ) {
            return;
        }

        $title = $input->title;
        $title2 = $input->title2;

        $client = OpenAI::client(config('app.openai_api_key'));
        
        $result = $client->completions()->create([
            "model" => "text-davinci-003",
            
            'max_tokens' => 100,
            'prompt' => "act as if you were a historical figure replica , now you are $title  , and answer the following question :
                $title2 , also include the figure you pretended to be , long answers are appreciated",
        ]);

        $content = trim($result['choices'][0]['text']);


        return view('write', compact('title', 'content'));
    }
}
