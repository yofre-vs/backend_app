<?php

namespace App\Domains\Citv\Controllers;

use Illuminate\Http\Request;
use App\Domains\Citv\Dtos\InspectionDto;
use App\Domains\citv\Services\MTC\SoapServices\MTCSoapData;
use App\Domains\citv\Services\MTC\SoapServices\CoordinatorMTCSoap;


/*use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Domains\Citv\Models\InspectionMdl;
use App\Domains\Citv\Helpers\MTCTokenHelper;
use App\Domains\Core\Models\CoreModuleSettings;
use App\Domains\Core\Libraries\FacilityDomainOptions\FacilityDomainOptionsService;
use App\Domains\citv\Services\MTC\SoapServices\MTCSoapInit;
use App\Domains\Core\Helpers\CoreDateHelper;

use App\Providers\AppServiceInvoicer\AppServiceInvoicer;
use App\Models\Invoice;
use App\Dtos\InvoiceCitvDto; */
class  InspectionActionsCtr {

    public static function saveInspectionStep1( Request $request )
    {   
        $metadata = ['inspection'=>[    'vehicleCategory' => MTCsoapData::get('vehicleCategories',$request->input('inpsCategory')),
                                        'vehicleServiceType' => MTCsoapData::get('vehicleServiceTypes', $request->input('inspType')),
                                        'vehicleServiceArea' => MTCsoapData::get('vehicleServiceAreas',$request->input('inspScope')),
                                        'class' => MTCsoapData::get('inspectionTypes',$request->input('inspClass')),
                                        'subclass' => MTCsoapData::get('inspectionTypes',$request->input('inspSub')),  ]];
        $inspection = new InspectionDto([
                                        'vehiclePlate' => $request->input('inspVehiclePlate'),
                                        'vehicleCategory' => $request->input('inpsCategory'), 
                                        'vehicleServiceType' => $request->input('inspType'),  
                                        'vehicleServiceArea' => $request->input('inspScope'),  
                                        'class' => $request->input('inspClass'),
                                        'subclass' => $request->input('inspSub'), 
                                        'metadata' => json_encode($metadata), 
                                    ]);
        $instace = \workspace::instance();                             
        $response = CoordinatorMTCSoap::registerVehicle( 
                                            $inspection->toArray(),  
                                            $instace->options["dinamics"]["serviceCITVLastOpen"]
                                        );    
        
 /*       Client::create([
            'name' => $dto->name,
            'email' => $dto->email,
        ]);
        */
        dd($_POST,  $inspection );
        Inspection::where('id')->update(['status' => 'active']);

        $inspection = Inspection::where('inspection_id', $request->input('id'))->first(); 
        if ($inspection->inspection_id) {
                $inspection->inspection_date = $request->input('inspection_date');
                $inspection->inspection_status = $request->input('inspection_status');
                $inspection->inspection_notes = $request->input('inspection_notes');
                $inspection->inspection_certification = $request->input('inspection_certificate');
                $inspection->vehicle_license_plate = $request->input('license_plate');
                $inspection->vehicle_make = $request->input('make');
                $inspection->vehicle_model = $request->input('inspection_date');
                $inspection->vehicle_type = $request->input('inspection_type');

                //$inspection->driver_dni = $request->input('inspection_date');
                $inspection->driver_license_number = $request->input('license_numero');
                $inspection->driver_fullname = $request->input('driver_name');
                
                $inspection->driver_license_category = $request->input('license_category');

            $inspection->save();
        }
         return response()->json([
                'inspectionId'  => $inspection->inspection_id,
                'status'  => 'success',
                'message' => 'Inspección actualizada correctamente.',
                'data'    => true,
                'ok'    => true,
                
                'id' => $inspection->inspection_id,
                'license_plate' =>  $inspection->driver_license_number ,
                'make' =>  $inspection->vehicle_license_plate ,
                'model' => $inspection->vehicle_model,
                'driver_name' => $inspection->driver_fullname
            ]); // 201 = Created
    }

    public function invoice($inspection_id)
    {   $inspection = Inspection::where('inspection_id', $inspection_id)->first(); 
        if( trim ( $inspection->invoice_status ) == ''){
            return  view('citv/inspection_center/partials/invoice_form', ['inspection'=> $inspection]);
        }else{
            return view('citv/inspection_center/partials/invoice_view', ['inspection'=> $inspection]);
        }
    }
    public function invoicegenerate( Request $request )
    {
    //adrres
       $inspection = Inspection::where('inspection_id', $request->input('inspection_id'))->first(); 
        if ($inspection->inspection_id) {
            //$company_branch = InvoiceCitvDto::where('invoice_id', $inspection->invoice_id)->first(); 
            $facility = new \stdClass();
            $facility->facility_id = 21;
            $facility->facility_name = 21;
            $facility->facility_ruc = 20610850830;
            $facility->next_F = date("YMd");
            $facility->next_B = date("YMd");
            $facility->next_CN = date("YMd"); 
            $facility->facility_serialcode = "F002";
            
            //invoice:
            $invoice_dto = new InvoiceCitvDto([
                //data to model
                'facility_id'   => $facility->facility_id,
                'facility_name' => $facility->facility_name,
                'facility_ruc'  => $facility->facility_ruc,
                'facility_serialcode'  => $facility->facility_serialcode,
                

                'client_id'   => $request->input('client_document_number'),
                'client_document_type'   => $request->input('client_name'),
                'client_document_number'   => $request->input('inspection_certification'),
                'client_name'   => $request->input('inspection_servicio'), 
                'client_address'   => $request->input('inspection_class'),

                'inspection_id'   => $request->input('inspection_cost')-( ($request->input('inspection_cost'))*0.18 ), 
                'inspection_certificate'   => $request->input('inspection_certification'),
                'inspection_service'   => $request->input('inspection_cost'),
                'inspection_class'   => $request->input('invoice_type'),
                'inspection_price'   => $request->input('license_category'), 

                'invoice_items_id'   => $request->input('license_number'),
                'invoice_items'   => $request->input('driver_name'), 
                'invoice_amount_total'   => $request->input('inspection_cost'),
                'invoice_amount_subtotal'   => $request->input('inspection_cost')-( ($request->input('inspection_cost'))*0.18 ),
                'invoice_amount_igv'   =>( ($request->input('inspection_cost'))*0.18 ),
                'invoice_type'   => 'F', 
                'invoice_sunat_number'   => "00".date("Hi"),
                
                //'invoice_sunat_number'   => $facility->facility_ruc."-01-F".$facility->facility_serialcode."-".$facility->next_F = date("YMd"); 
                'invoice_sunat_response'   => $request->input('inspection_class'),
                'invoice_sunat_xml'   => $request->input('license_number'),
                'invoice_creditnote_id'   => $request->input('driver_name'), 
                'invoice_reinvoce_id'   => $request->input('inspection_class'),
                'invoice_status'   => $request->input('license_number'),
                'invoice_created'   => $request->input('driver_name'), 
                'invoice_emited'   => $request->input('inspection_class'),
                'invoice_responded'   =>$request->input('inspection_class'),


                //Metadata
                'invoice_metadata'   =>  json_encode([   
                                            'facility_address' =>  'Jr Casi llegas 155',
                                            'client_address' =>  $request->input('client_address') 
                                            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),



            ]);
            $invoice = invoice::create($invoice_dto->getArray()); 
            
            $inspection->invoice_amount_total = $request->input('inspection_cost');
            $inspection->invoice_status = 'created';
            $inspection->invoice_type = $request->input('invoice_type');
            $inspection->invoice_number = $request->input('invoice_number');
            $inspection->invoice_id = $invoice->invoice_id;
            $inspection->save();

            AppServiceInvoicer::generateXML( $invoice_dto->getArray() );
            

            return response()->json([    
                'status'  => 'success',
                'message' => 'comprobante creado.',
                'data'    => true,
                'ok'    => false,
                'inspection_id' => $inspection->inspection_id,
                'invoice_id' =>  $invoice->invoice_id 
            ]);
             
            
        }
    }
}