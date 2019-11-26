<?php
namespace App\Core\RequestDispatcher;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

class JsonResponse extends Response 
{   
    protected $contentType = 'application/json';

    private $encoder;

    
    public function setContent($responseContent)
    {
        $encoder = $this->getEncoder();

        return parent::setContent($encoder->encode($responseContent, JsonEncoder::FORMAT));
    }

    /**
     * Lazy initialization (initialize only on request)
     */
    private function getEncoder(): JsonEncoder
    {
        if (!$this->encoder) {
            $this->encoder = new JsonEncoder();
        }

        return $this->encoder;
    }
}
