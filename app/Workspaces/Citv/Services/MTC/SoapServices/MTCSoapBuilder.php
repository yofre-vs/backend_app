<?php
namespace App\Domains\Citv\Services\MTC\SoapServices;
use App\Domains\Citv\Services\MTC\MTCSoapConector;

class MTCSoapBuilder
{
    protected array $headers;
    public static function build(array $options)
    {   $soapHeader =  self::prepareHeaders( $options["soapAction"] );

        $xmlEnvelope =  self::getXmlSoapEnvelope();
        $xmlHeader =  '<soapenv:Header/>';
        $xmlBody =  self::getXmlSoapBody($options);
        $xmlEnvelope = str_replace("{{xml-header}}",$xmlHeader,  $xmlEnvelope);
        $xmlEnvelope =str_replace("{{xml-body}}",$xmlBody,  $xmlEnvelope);

        $soapBody = $xmlEnvelope;
        

        return  array("soapHeader"=>$soapHeader, "soapBody"=> $xmlEnvelope);
    }
    public static function getXmlSoapEnvelope()
    {
        $xmlstr = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
                            xmlns:tem="http://tempuri.org/"
                            xmlns:mtc="http://schemas.datacontract.org/2004/07/MTC.ServiciosCITV.Dominio.Entidades">
                        {{xml-header}} 
                        {{xml-body}} 
                    </soapenv:Envelope>';
                return  $xmlstr;
    }
    public static function getXmlSoapBody(array $options)
    {   // dd ( $options );
        switch($options['soapService']){
            case "sessionOpen" :    $xmlBody ='<soapenv:Body>
                                                <tem:AutentificaInicioOperacion>
                                                    <tem:entLocalLogin>
                                                        <mtc:CodEntidad>'.$options['CodEntidad'].'</mtc:CodEntidad>
                                                        <mtc:CodIV>'.$options['CodIV'].'</mtc:CodIV>
                                                        <mtc:CodLocal>'.$options['CodLocal'].'</mtc:CodLocal>
                                                    </tem:entLocalLogin>
                                                </tem:AutentificaInicioOperacion>
                                            </soapenv:Body>';
                                    break;
            case "sessionclose" :    $xmlBody ='<soapenv:Body>
                                                <tem:AutentificaInicioOperacion>
                                                    <tem:entLocalLogin>
                                                        <mtc:CodEntidad>'.$options['CodEntidad'].'</mtc:CodEntidad>
                                                        <mtc:CodIV>'.$options['CodIV'].'</mtc:CodIV>
                                                        <mtc:CodLocal>'.$options['CodLocal'].'</mtc:CodLocal>
                                                    </tem:entLocalLogin>
                                                </tem:AutentificaInicioOperacion>
                                            </soapenv:Body>';
                                    break;
            case "registerVehicle" :    
                $xmlBody ='<soapenv:Body>
                        <tem:AutentificaInicioOperacion>
                            <tem:entLocalLogin>
                                <mtc:CodEntidad>'.$options['CodEntidad'].'</mtc:CodEntidad>
                                <mtc:CodIV>'.$options['CodIV'].'</mtc:CodIV>
                                <mtc:CodLocal>'.$options['CodLocal'].'</mtc:CodLocal>
                            </tem:entLocalLogin>
                        </tem:AutentificaInicioOperacion>
                    </soapenv:Body>';
            break;

        }
        return $xmlBody;
    }

    public static function prepareHeaders( string $soapAction ){
        return [
            'Content-type: text/xml; charset=utf-8',
            'Accept: text/xml',
            'Cache-Control: no-cache',
            'Pragma: no-cache',
            'SOAPAction: "' . $soapAction . '"'
        ];
         
    }
}
