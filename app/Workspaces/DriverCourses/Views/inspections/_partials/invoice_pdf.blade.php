<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Comprobante de Pago</title>
    <style>
        @page {         margin: 0; /* Esto elimina márgenes en todas las páginas */    }

    html, body {
        margin: 5px;
        padding: 0;
        font-family: Arial, sans-serif;
        font-size: 11px;
    }
        .center { text-align: center;  }
        .left { text-align: left;  }
        .right { text-align: right;  }
        .row {  margin-bottom: 20px; }
        p { margin:0;}
        h1 { font-size: 13px; text-align: center; margin:0px}
        h2 { font-size: 17px; text-align: center; margin:0px; font-weight: lighter;}
        h3 { font-size: 15px; text-align: center; margin:0px}
         
    </style>
</head>
<body>
    <div class="row"></br></br>
        <h1>CITV EL GORDO FELIZ </h2>
        <p class="center">Jr Casi Llegas Nro 999 - Cono Este, Lima</p>
    </div>
    <div class="row">
        <h2>FACTURA ELECTRONICA</h2>
        <div>
          <p><strong>Direccion Fiscal:</strong>Jr Casi Llegas Nro 999 - Cono Este, Lima<p>
          <p><strong>Razon Social:</strong>CENTRO DE REVISIONES TECNICAS EL GORDO FELIZ <p>
          <strong>RUC:</strong>20101414141
        </div>
    </div>

    <div class="row"> 
        <div>
          <p><strong>Fecha:</strong><?php  echo $stored["inspection_date"]?><p>
          <p> <?php  echo $stored["invoice_number"]?> <p> 
        </div>
    </div>

    <div class="row"> 
        <div>
          <h3>CLIENTE</h3>
          <p><strong>Apellidos y Nombres / Denominación o Razón Comercial:</strong><p>
          <p> <?php  echo $stored["invoice_client_name"]?><p> 
            
          <p><strong>Dirección:</strong>   <p>
            
          <p><strong>Tipo de Documento:</strong> <?php  echo $stored["invoice_client_document_type"]?><p>
            
          <p><strong>N° Documento:</strong><?php  echo $stored["invoice_client_document_number"]?><p>
        </div>
    </div>

   <div class="row"> 
        <div>
          <h3>VEHICULO</h3>
          <p><strong>Placa:</strong>  <?php  echo $stored["vehicle_license_plate"]?><p> 
          <p><strong>Marca:</strong> <?php  echo $stored["vehicle_make"]?><p>
            
          <p><strong>Modelo:</strong> <?php  echo $stored["vehicle_model"]?><p>
          <p><strong>Tipo:</strong> <?php  echo $stored["vehicle_type"]?><p>
             
        </div>
    </div>
  
    <div class="row"> 
        <div>
          <h3>REVISION TECNICA</h3>
          <p><strong>Clase:</strong>  <?php  echo $stored["invoice_class"]?><p> 
          <p><strong>Servicio:</strong> <?php  echo $stored["invoice_service"]?><p>
          <p><strong>Certificado:</strong> <?php  echo $stored["invoice_certification"]?><p>
        </div>
    </div>

    <div class="row"> 
        <div>
          <h3>VALOR DE VENTA</h3>
          <p><strong>Base Imponible S/:</strong>  <?php  echo $stored["invoice_amount_base"]?><p> 
          <p><strong>SerI.G.V (18%) S/:</strong> <?php  echo $stored["invoice_amount_igv"]?><p>
          <p><strong>Importe Total:</strong> 7<?php  echo $stored["invoice_amount_total"]?><p>
        </div>
    </div>
    <div class="row"> 
        <p class="left"><strong>SON:</strong>  Setenta con 00/100 soles.<p> 
        <p class="right"><strong>USUARIO</strong> <p>
          
    </div>
    <div class="row"> 
        <p class=" center"><br/><br/><br/><i>/* espacio para el código QR */</i><br/><br/><br/><br/><p> 
        <p class="right"><strong>Representacion impresa de la boleta electronica. Consulte con su... </strong> <p>
          
    </div>
</body>
</html>