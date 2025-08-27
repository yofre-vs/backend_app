<?php


namespace App\Domains\Citv\Services\MTC\SoapServices;
use App\Domains\Citv\Services\MTC\SoapServices\MTCSoapBuilder;
class MTCSoapInit
{   
    private  static array  $soapServices = [ "sessionOpen"=>"AutentificaInicioOperacion",
                                            "registerVehicle"=>"valVehiculoPoliza",
                                            "sessionsss"=>"AutentificaInicioOperacion"  ];
    public static function request(array $options)
    {    
        $soapOptions = self::prepare($options);
        $response = self::connect($soapOptions);
       
        //dd($response);
        $dataResponse =MTCSoapReader::read( $response["soapResponse"],$response["soapService"]);
        //self::debugXml(   $options, $response );
        return $dataResponse;
    }
    public static function debugXml($options, $response)
{ dd($response);
    // Si hay opciones, las imprimimos primero
    if (!empty($options)) {
        echo "<pre><strong>Opciones:</strong>\n";
        print_r($options);
        echo "</pre>";
    }
}
    public static function prepare(array $options)
    {
        $options["soapEndpoint"] = "https://wscitv.mtc.gob.pe/WSInterOperabilidadCITV.svc";
        $options["soapAction"]  =   "http://tempuri.org/ICITV_TM_Servicios/" . self::$soapServices[ $options["soapService"] ]          ;
        $buildOptions =  $options;

        $prepared = MTCSoapBuilder::build( $buildOptions);
        return array_merge($options, $prepared);
    }
    public static function connect(array $options)
    {
        return MTCSoapConector::connect( $options );
    }
    public static function readResponse(array $options)
    {
        return MTCSoapReader::get( $options );
    }
}
