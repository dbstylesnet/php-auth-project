<?php

namespace App\Core\RequestDispatcher;

class JsonResponse extends Response 
{   
    protected $contentType = 'application/json'; 


    public function setContent($responseContent)
    {
        parent::setContent(json_encode($responseContent));
    }
}