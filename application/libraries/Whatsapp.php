<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whatsapp{
    
    public function send($number,$message){
        require 'vendor/autoload.php';

		$token = 'd3C5H4RudHj6ZdRO1gGqNxRLmbmnvHaGVy02badpxA9l3+TED6NIiqEcLBePSz83zoWWeZwzUNGnw62d1kj4Nw==';

        // $refresh_token = "def502006fbf670c418701777b0246773ea9ae2cee95aa4a39ec32d782260a6e5ad61f5ae3ab7d16c4736776257691b4bc05cdc9893b9068403b1f68a4583c8f00663eb5e24ac2358a45371cfb28ef7dccdd360f65f0b1f9d7fddf59912d01a6a96fc0dcaaeda3476966d4e7d1d2f2f109a171501d8207dc54e72834f24727e8a0e90add4ad18bb932c6146469f5797215f144d36f00bd583806d7a1c62a0470196f8d2dda16f08df733d8312282bec420011f15d5ca504fc8884c385a794b48c75cbd4a861bd2fde0d789baa9dd37e49f5b59c581e8a0d9e6afa1151ad7b078c601aaa6094bff00534a3333b95d1425c00afdee50056fb0152ab5132ae6007b5f94d94aa9329b1849f5a2f9a405623c69a46ef20dafb935e896a8c89af4c7363fbbea69e390981c2e599e0071e076897d32929c05150423a00388d52010475bf0fcdbedd2b806271a6bc1233df93d92cf0964038c0021f3b206ecf64aed6688a1a2";

        $client = new \GuzzleHttp\Client(['base_uri' => 'https://app.lenna.ai/app/public/api/']);

        $response = $client->request(
            'POST', 
            'PdR6qd/send-hsm',
            [
                'json' => [
                    "integrationId" => 174,
                    "token" => $token,
                    "channel" => "whatsapp",
                    "type" => "broadcast",
                    "category" => "hsm",
                    "templateName" => "info_nama_pasien",
                    "messageTitle" => "title",
                    "phone" => [$number],
                    "templateParams" => $message
                ]
            ]
        );
        
        return $response->getBody();
	}


}