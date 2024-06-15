<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class AiController extends Controller
{
    public function sendChatMessage(Request $request)
    {
        if(!Auth::check()){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userMessage = $request->input('message');

        // Construct payload
        $payload = [
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $userMessage,
                ],
                [
                    'role' => 'system',
                    'content' => 'Sei un bot che risponde a tutto quello che faccio, rispondi sempre iniziando con Ciao! Allora ecc ecc',
                ]
            ],
            'max_tokens' => 800,
            'temperature' => 0.7,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
            'top_p' => 0.95,
            'stop' => null,
        ];
        $api_key = env('AZURE_API_KEY');
        $model=env('AZURE_ENDPOINT');
        // Make request to OpenAI API
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'api-key' => $api_key, // Replace with your actual API key
        ])->post($model, $payload);

        // Get bot response
        $botResponse = $response->json('choices.0.message.content');

        return response()->json(['botResponse' => $botResponse]);
    }
    public function markAllAsDeleted(Request $request)
    {
        if(!Auth::check()){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Mark all messages as deleted
        return response()->json(['message' => 'All messages marked as deleted']);
    }
}



