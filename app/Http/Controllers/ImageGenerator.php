<?php

namespace App\Http\Controllers;

use OpenAI;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ImageGenerator extends Controller
{
    //

    public function index(Request $input)
    {
        if ($input->title == null) {
            return;
        }

        $title = $input->title;
        

        $client = OpenAI::client(config('app.openai_api_key'));
        
        $result = $client->images()->create([
            'prompt' => $title,
            'size' => '1024x1024',
            'n' => 1,
           
        ]);
        // ($content = ($result));
        // ddd($content = ($result));
        $result->created; // 1589478378

        foreach ($result->data as $data) {
            $data->url; // 'https://oaidalleapiprodscus.blob.core.windows.net/private/...'
            $data->b64_json; // null
          
        }
        
      $content =   $data->url;

        return view('draw', compact('title', 'content'));
    }
}
