<?php
namespace App\Http\Controllers\Citv;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inspection;

class InspectionsController extends Controller
{
    public function index()
    {   $inspections = Inspection::all();
        return view('citv/inspections/inspection-list', ['inspections'=> $inspections]);
    }
    public function creditnoteform( $inspection_id )
    {   
        $inspection = Inspection::where('inspection_id',  $inspection_id )->first(); 
        $invoice = Inspection::where('invoice_id',  $inspection['invoice_id'] )->first(); 
        return view('citv/inspections/partials/creditnote_form', ['inspection'=> $inspection,  'invoice'=>  $invoice]);
    }
    public function creditnotegenerate( $inspection_id )
    {   
        $inspection = Inspection::where('inspection_id', $request->input('inspection_id'))->first(); 
        $invoice = InvoiceCitvDto::where('invoice_id', $inspection->invoice_id)->first(); 
        if ($invoice->invoice_id) {

            
            $creditnote = CreditNote::create($data = [
                'inspection_id'   => $request->input('license_plate'),
                'invoice_id'   => $request->input('make'),
                'invoice_sunat_number'  => $request->input('model'),

                'creditnote_sunat_type'   => $request->input('type'),
                'creditnote_sunat_reason'   => $request->input('year'),
                'creditnote_sunat_number'   => $request->input('seat_count'),
                'creditnote_sunat_response'   => $request->input('driver_dni'),
                'creditnote_sunat_xml'   => $request->input('license_category'), 
                'creditnote_metadata'   => $request->input('license_number'),
                'creditnote_created'   => $request->input('driver_name'), 
                'creditnote_xml_sended'   => $request->input('inspection_class')
                
                
            ]);
            $invoice->save();
            
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
