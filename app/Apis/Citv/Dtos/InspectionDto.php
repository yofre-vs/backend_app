<?php
namespace App\Domains\Citv\Dtos;
class InspectionDto
{

    public ?string $id ; 
    public ?string $class = null;
    public ?string $subclass = null; 
    public ?string $notes = null;
    public ?string $certificade = null;
    public ?string $status = null;
    public ?string $metadata = null;
    public ?string $date = null; 
    public ?string $created = null;
    public ?string $updated = null;
    public ?string $vehicleId = null;
    public ?string $vehiclePlate = null;
    public ?string $vehicleCategory = null;
    public ?string $vehicleMake = null;
    public ?string $vehicleModel = null;
    public ?string $vehicleServiceType ;
    public ?string $vehicleServiceArea ;
    
    public ?string $driverId = null;
    public ?string $facilityId = null;
    public ?string $invoiceId = null;
    public ?string $userId = null; 
    

    public function __construct(array|object $data = [])
    {
        $this->fill($data);
    }

    public function fill(array|object $data): void
    {
        
        $dataArray = is_object($data) ? get_object_vars($data) : $data;

        foreach ($dataArray as $key => $value) {
           // echo $key." : ".$value;
            if (property_exists($this, $key) && $value !== null) {
                $this->{$key} = $value;
            }
        }
    }
    public function toArray(){
        
        return   get_object_vars($this);
    }
}
