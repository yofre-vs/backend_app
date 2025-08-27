<?php

namespace App\WS\Services; 
use App\WS\Services\WorkspaceInstance\WorkspaceInstanceContext; 
use App\WS\Services\WorkspaceInstance\WorkspaceInstanceContextDto; 

use Illuminate\Support\Facades\Log;
class WorkspaceService
{
    public function __construct(
        protected WorkspaceInstanceContext $instanceContext, 
    ) {}

    public function instance(?string $uuid = null): ?WorkspaceInstanceContextDto
    {
        return $this->instanceContext->getInstance( $uuid  );

    }
    

    public function instanceUpdate($instanceDto)
    {
         return $this->instanceContext->update( $instanceDto  );
    }

    public function vehicle()
    {
        return $this->vehicleContext->getVehicle();
    }
}
