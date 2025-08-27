<?php


namespace App\Domains\Citv\Services\MTC\SoapServices;

class MTCSoapConector
{
    

    public static function connect( array $options ): array
    {  
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $options["soapEndpoint"]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $options["soapBody"]);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $options["soapHeader"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new \Exception('SOAP Error: ' . curl_error($ch));
        }
        $options["soapResponse"] = $response;
        //self:: debugXml($options, $response);
        curl_close($ch);
        return $options;
    }
    public static function  debugXml(  $request,   $response){

        echo "<pre id=\"xml-dump1\" class=\"hidden\" style=\"background:#eee; padding:10px; overflow:auto;\"><strong>Endpoint</strong>
                ".htmlentities( $request["soapEndpoint"]). "
            </pre>";
        echo "<pre id=\"xml-dump2\" class=\"hidden\" style=\"background:#eee; padding:10px; overflow:auto;\"><strong>header</strong>
                ".htmlentities( implode("\n",  $request["soapHeader"] ) ). "
            </pre>";
        echo "<pre id=\"xml-dump3\" class=\"hidden\" style=\"background:#eee; padding:10px; overflow:auto;\"><strong>xml request</strong>
                ".htmlentities( $request["soapResponse"]). "
            </pre>";

            $dom = new \DOMDocument();
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            $dom->loadXML( $response ); 
        echo "<pre id=\"xml-dump4\" class=\"hidden\" style=\"background:#eee; padding:10px; overflow:auto;\"><strong>xml response</strong>
                ".htmlentities( $dom->saveXML() ). "
            </pre>";

    }
}
