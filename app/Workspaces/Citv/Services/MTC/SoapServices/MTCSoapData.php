<?php
namespace  App\Domains\Citv\Services\MTC\SoapServices;

class MTCSoapData
{   
    // Registro de tipos de datos y sus métodos correspondientes
    protected static array $registeredTypes = [ 
        'policy' => 'policies', 
        'cancellations' => 'cancellations',
        'inspectionTypes' => 'inspectionTypes', 
        'vehicleCategories' => 'vehicleCategories', 
        'vehicleServiceAreas' => 'vehicleCategories', 
        'vehicleServiceTypes' => 'vehicleCategories', 
        'insurers' => 'insurers', 
        'responses' => 'responses'
    ];

  
    public static function get(string $dataType, string $key = null)
    {   
        if (array_key_exists($dataType, self::$registeredTypes)) {
            // Llamada dinámica al método correspondiente

            $array = include ("dataMTCSoap.php");
            //$method = self::$registeredTypes[$dataType];
            //$array = self::$method(); // Invoca el método correspondiente

            // Verifica si la clave existe en el array
            if ($key!=null && isset($array[$dataType][$key])) { 
                return $array[$dataType][$key];
            } else if($key!=null && !isset($array[$dataType][$key])){
               // dd("no hay key y no hay el modulo");
                return null;
            }else{
                // Si no existe la clave, devuelve un valor por defecto
                return $array[$dataType];
            }
        }

        // Si no existe el tipo de dato, devuelve null o un valor por defecto
        return null;
    }

    
}

