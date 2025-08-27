 @extends('themes.default.main')

@section('title', 'Bienvenido')

@section('content')
    <h2>Inspecciones</h2> 
    
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Placa</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      
      <th scope="col">Conductor</th>
      <th scope="col">Fecha</th>
      <th scope="col">Estado</th>
      <th scope="col">Certicado</th>
      <th scope="col">Comprobante</th>
      <th scope="col">Respuesta Sunat</th>
      <th scope="col"> <a href="#"> Enviar a la sunat en Lote </a>  </th>
    </tr>
  </thead>
  <tbody>

    
      <?php  foreach($inspections as $inspection){?>
      <tr>
      <th scope="row"><?php echo $inspection["inspection_id"]?></th>
      <td><a href="#"> <?php echo $inspection["vehicle_license_plate"]?></a></td>
      <td><?php echo $inspection["vehicle_make"]?></td>
      <td><?php echo $inspection["vehicle_model"]?></td>
      <td><?php echo $inspection["driver_full_name"]?></td>
      <td><?php echo $inspection["inspection_date"]?></td>
      <td scope="col">1025333</td>
      <td>En Espera </td>
      <td><a href="#"> F<?php echo $inspection["invoice_id"]?></a>    
          <a href="#">  xml </a> <a href="#"> Pdf </a></td>
      <td><i>Factura pendiente de envío</i></td>
      
      <td>
        <button type="button"
                class="btn-send"
                data-toggle="modal"
                data-target="#modalAjax" 
                data-url="/citv/inspections/sendinvoice/"
                 >
                Enviar Sunat
              </button> |  
        <button type="button"
                class="btn-credite-note"
                data-toggle="modal"
                data-target="#modalAjax" 
                data-url="/citv/inspections/creditnoteform/<?php echo $inspection["inspection_id"]?>"
                 >
                Generar Nota Credito
              </button> |  
        <button type="button"
                class="btn-credite-note"
                data-toggle="modal"
                data-target="#modalAjax" 
                data-url="/citv/inspections/invoiceform/<?php echo $inspection["inspection_id"]?>"
                 >Nuevo Comprobante</td>
    </tr>

      <?php }?>
  </tbody>
</table>
 
     
 @endsection