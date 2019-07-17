<?php

namespace App\Core\RequestDispatcher;

use \DomDocument;

class XmlResponseDom extends Response 
{   
    protected $contentType = 'xml/text'; 


    public function setContent($responseContent)
    {
        $xmlResponse = new DomDocument('1.0');
        $responseElement = $xmlResponse->createElement('response');
        $responseText = $xmlResponse->createTextNode($responseContent);
        $responseElement = $xmlResponse->appendChild($responseText);

        parent::setContent($xmlResponse->saveXML());
    }
}