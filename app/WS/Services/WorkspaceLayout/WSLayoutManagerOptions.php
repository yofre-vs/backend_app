<?php
 
return [
    'title'     => 'Mi Aplicación',
    'theme'     => 'light',
    'namespace' => 'WSlayout::',
    'sidebar'   => true,
    'path'      => 'D:\Sandbox\Projects\CITVproject\webapp\frontend\app\WS\Views\Layouts',
    'main'      => 'single',
    'modules'   =>[ //{slug} => ['name' => '{name}','icon' => '{icon}']
                    /*'dashboard' => 
                            ['name' => 'Inicio','icon' => 'bx bx-tachometer'],*/

                    
                     
                    'driver-courses' =>   ['name' => 'Conductores Inscritos','icon' => 'bx  bx-clipboard-check'],
                    'driver-courses-completed' =>['name' => 'Conductores Certificados','icon' => 'bx bx-wallet-alt'], 
                    'driver-courses-promotor' =>      ['name' => 'Promotores','icon' => 'bx bx-truck'], 
                    'driver-courses-invoices' =>          ['name' => 'Facturacion','icon' => 'bx bx-user'], 
                    'driver-courses-purchase' =>          ['name' => 'Ventas','icon' => 'bx bx-user'],     
                    //'settings' =>       ['name' => 'Configuracion','icon' => 'bx bx-slider']


      
    ]
];
