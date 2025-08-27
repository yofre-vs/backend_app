<?php
namespace App\Dtos;
class InvoiceCitvDto
{
    public ?string $invoice_id ;
 
    public ?string $facility_id ;
    public ?string $facility_name = null;
    public ?string $facility_ruc = null;
    
    public ?string $facility_serialcode = null;
    
    //public ?string $plant_address = null;

    public ?string $client_id = null;
    public ?string $client_document_type = null;
    public ?string $client_document_number = null;
    public ?string $client_name = null;
    //public ?string $client_address = null;

    public ?string $inspection_id = null;
    public ?string $inspection_certificate = null;
    public ?string $inspection_service = null;
    public ?string $inspection_class = null;
    //public ?string $inspection_price = null;

    public ?string $invoice_items_id = null;
    public ?string $invoice_items = null;
    public ?string $invoice_amount_total = null;
    public ?string $invoice_amount_subtotal = null;
    public ?string $invoice_amount_igv = null;
    public ?string $invoice_type = null;
    public ?string $invoice_sunat_number = null;
    public ?string $invoice_sunat_response = null;
    public ?string $invoice_sunat_xml = null;
    public ?string $invoice_creditnote_id = null;
    public ?string $invoice_reinvoce_id = null;
    public ?string $invoice_metadata = null;
    public ?string $invoice_status = null;
    public ?string $invoice_created = null;
    public ?string $invoice_emited = null;
    public ?string $invoice_responded = null;
    

    public function __construct(array|object $data = [])
    {
        $this->fill($data);
    }

    public function fill(array|object $data): void
    {
        $dataArray = is_object($data) ? get_object_vars($data) : $data;

        foreach ($dataArray as $key => $value) {
            if (property_exists($this, $key) && $value !== null) {
                $this->{$key} = $value;
            }
        }
    }
    public function getArray(){
        return   get_object_vars($this);
    }
}
