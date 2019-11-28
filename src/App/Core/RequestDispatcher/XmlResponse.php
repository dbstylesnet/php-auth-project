<?php
namespace App\Core\RequestDispatcher;

use Symfony\Component\Serializer\Encoder\XmlEncoder;

class XmlResponse extends Response 
{   
    protected $contentType = 'xml/text';

    /**
     * Lazy 
     */
    private $encoder;

    public function setContent($responseContent)
    {
        $encoder = $this->getEncoder();

        return parent::setContent($encoder->encode($responseContent, XmlEncoder::FORMAT));
    }

    /**
     * Lazy initialization (initialize only on request)
     */
    private function getEncoder(): XmlEncoder
    {
        if (!$this->encoder) {
            $this->encoder = new XmlEncoder();
        }

        return $this->encoder;
    }
}
