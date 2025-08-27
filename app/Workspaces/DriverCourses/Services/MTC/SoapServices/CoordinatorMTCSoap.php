<?php

namespace App\Domains\Citv\Services\MTC\SoapServices;
/*
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Domains\Citv\Models\InspectionMdl;
use App\Domains\Core\Models\CoreModuleSettings;
use App\Domains\Core\Libraries\FacilityDomainOptions\FacilityDomainOptionsService;
use App\Domains\Citv\Services\MTC\SoapServices\MTCSoapInit;
use App\Domains\Citv\Services\MTC\MTCSoapReader;
use App\Providers\AppServiceInvoicer\AppServiceInvoicer;
use App\Models\Invoice;
use App\Dtos\InvoiceCitvDto;*/
/**/
class CoordinatorMTCSoap
{   
    public static function refreshToken( $creds){
        $Arrayresponse = MTCSoapInit::request([     "CodEntidad"=>$creds['codEntidad'],
                                                    "CodIV"=>$creds['codIV'],
                                                    "CodLocal"=>$creds['codLocal'],
                                                    "soapService"=>"sessionOpen"
                                                ]);
        return $Arrayresponse ; 
    }
    public static function  registerVehicle( $parms, $creds ){
        //dd($creds);
        $Arrayresponse = MTCSoapInit::request([     "CIOD_CITV"=>   $creds['code'],
                                                    "PLACA"=>       $parms['vehiclePlate'],
                                                    "CATEGORIA"=>   $parms['vehicleCategory'],
                                                    "TIPSERVICIO"=> $parms['vehicleServiceType'],
                                                    "TIPAMBITO"=>   $parms['vehicleServiceArea'],                                               
                                                    "TIPINSPECCION"=>$parms['class'],
                                                    "soapService"=> "registerVehicle"
                                                ]);
        return $Arrayresponse ;                                   
    }
    public static function  registerPolicy( $parms){
        $Arrayresponse = MTCSoapInit::request([     "CIOD_CITV"=>$parms['codEntidad'],
                                                    "NUM_FICHA"=>$parms['codIV'],
                                                    "PLACA"=>$parms['codLocal'],
                                                    "TPPOLIZA"=>"sessionOpen",
                                                    "NUMPOLIZA"=>"sessionOpen",                                                    
                                                    "FECINIPOLIZA"=>"sessionOpen",
                                                    "FECFINPOLIZA"=>"sessionOpen",                                                    
                                                    "ASEGURADORA"=>"sessionOpen",
                                                    "soapService"=>"registraPoliza"
                                                ]);
        
        return $Arrayresponse ;  
    }public static function updatePolicy( $parms){
        $Arrayresponse = MTCSoapInit::request([     "CIOD_CITV"=>$parms['codEntidad'],
                                                    "NUM_FICHA"=>$parms['codIV'],
                                                    "PLACA"=>$parms['codLocal'],
                                                    "TPPOLIZA"=>"sessionOpen",
                                                    "NUMPOLIZA"=>"sessionOpen",                                                    
                                                    "FECINIPOLIZA"=>"sessionOpen",
                                                    "FECFINPOLIZA"=>"sessionOpen",                                                    
                                                    "ASEGURADORA"=>"sessionOpen",
                                                    "soapService"=>"actualizarPoliza"
                                                ]);

                                                
        return $Arrayresponse ;  
    }
    public static function Certificate( $parms){
        $Arrayresponse = MTCSoapInit::request([     "CIOD_CITV"=>$parms['codEntidad'],
                                                    "NUM_FICHA"=>$parms['codIV'],
                                                    "PLACA"=>$parms['codLocal'],
                                                    "ESTADOREV"=>"sessionOpen",
                                                    "FECINICITV"=>"sessionOpen",                                                    
                                                    "FECFINCITV"=>"sessionOpen",
                                                    "OBSERVACIONES"=>"sessionOpen", 
                                                    "soapService"=>"valRevisionAprobada"
                                                ]);
        
        return $Arrayresponse ;                                          
    }
    public static function unsetCertificate( $parms){
        $Arrayresponse = MTCSoapInit::request([     "CIOD_CITV"=>$parms['codEntidad'],
                                                    "NUM_FICHA"=>$parms['codIV'], 
                                                    "NUMDOC"=>"sessionOpen",
                                                    "MOTANU"=>"sessionOpen",                                                    
                                                    "SOLNUM"=>"sessionOpen", 
                                                    "soapService"=>"anulaCITV"
                                                ]);

        return $Arrayresponse ;    
    }
    public static function closeToken( $parms){
        $Arrayresponse = MTCSoapInit::request([     "CIOD_CITV"=>$parms['codEntidad'],
                                                    "soapService"=>"cierreOperaciones"
                                                ]);

        return $Arrayresponse ;    
    }


    
   public static function isValidToken(array $params): bool
    {   return false;
        if (!array_key_exists('date', $params) || empty(trim($params['date']))) {
            return false;
        }
 
        if (!array_key_exists('code', $params) || empty(trim($params['code']))) {
            return false;
        }

        try { 
            $fechaStr = explode(' ', $params['date'] )[0];  
 
            $fechaToken = \Carbon\Carbon::createFromFormat('d-m-Y', $fechaStr)->format('Ymd');
 
            $fechaHoy = \Carbon\Carbon::now('America/Guayaquil')->format('Ymd');
        //dd ($fechaToken.":".$fechaHoy);
            return $fechaToken === $fechaHoy;
        } catch (\Exception $e) { 
            return false;
        }
    }


     
}