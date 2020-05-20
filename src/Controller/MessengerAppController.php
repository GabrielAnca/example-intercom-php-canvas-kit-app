<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MessengerAppController extends AbstractController
{
    /**
     * @Route("/messenger_app/initialize", methods={"POST"}, name="messenger_app_initialize")
     */
    public function initialize()
    {
        return $this->json([
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
        ]);
    }

    /**
     * @Route("/messenger_app/submit", methods={"POST"}, name="messenger_app_submit")
     */
    public function submit(Request $request)
    {
        $requestBody = json_decode($request->getContent());
        $componentId = $requestBody->component_id;

        return $this->json([
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
        ]);
    }
}
