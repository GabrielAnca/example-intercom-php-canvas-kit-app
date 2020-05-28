<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MessengerAppController
{
    /**
     * @Route("/messenger_app/initialize", methods={"POST"}, name="messenger_app_initialize")
     */
    public function initialize()
    {
        $response = [
            'canvas' => [
                'content' => [
                    'components' => [
                        [
                            "type" => "text",
                            "id" => "text-1",
                            "text" => "Hello world! (from initialize action)",
                            "style" => "header"
                        ],
                        [
                            "type" => "button",
                            "id" => "submit-initialize",
                            "label" => "Submit this canvas!",
                            "action" => [
                                "type" => "submit"
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return new JsonResponse($response);
    }

    /**
     * @Route("/messenger_app/submit", methods={"POST"}, name="messenger_app_submit")
     */
    public function submit(Request $request)
    {
        $requestBody = json_decode($request->getContent());
        $componentId = $requestBody->component_id;
        $time = date('H:i:s');

        $response = [
            'canvas' => [
                'content' => [
                    'components' => [
                        [
                            "type" => "text",
                            "id" => "text-1",
                            "text" => "Hello world! (from submit action)",
                            "style" => "header"
                        ],
                        [
                            "type" => "text",
                            "id" => "text-2",
                            "text" => sprintf("The '%s' component was clicked", $componentId),
                        ],
                        [
                            "type" => "text",
                            "id" => "text-3",
                            "text" => sprintf("It is %s now", $time),
                        ],
                        [
                            "type" => "button",
                            "id" => "submit-submit",
                            "label" => "Submit this canvas again!",
                            "action" => [
                                "type" => "submit"
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return new JsonResponse($response);
    }
}
