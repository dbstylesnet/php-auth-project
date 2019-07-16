<?php

namespace App\Core\RequestDispatcher;

class XMLResponse extends Response 
{    
    public function setContent($responseContent)
    {
        parent::setContent(xmlrpc_encode_request($responseContent)); //array of args as 2nd parameter?
    }
}