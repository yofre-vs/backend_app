<?php

namespace App\WS\Services\WorkspaceInstance;

use Illuminate\Support\Facades\DB;
use App\WS\Services\WorkspaceInstance\WorkspaceInstanceMdl;
use App\WS\Services\WorkspaceInstance\WorkspaceInstanceContextDto;

class WorkspaceInstanceContext
{
    protected ?WorkspaceInstanceContextDto $instance = null;
    protected ?string $loadedUuid = null;

    
    public function getInstance(?string $uuid = null): ?WorkspaceInstanceContextDto
    {
        if ($uuid !== null) {
            if ($uuid !== $this->loadedUuid) {
                $this->load($uuid);
                $this->loadedUuid = $uuid;
            }
            return $this->instance;
        }

        if ($this->instance !== null) {
            return $this->instance;
        }
        $uuidFromRequest = $this->getUuidFromRequest();
        if (!$uuidFromRequest) {
            abort(404, 'Instance UUID not found');
        }

        $this->load($uuidFromRequest);
        $this->loadedUuid = $uuidFromRequest;
        return $this->instance;
    }

    protected function load(string $uuid): void
    {
 
        $wsInstanceMdl = WorkspaceInstanceMdl::where('workspace_uuid', $uuid)->first();
        if (!$wsInstanceMdl) {
            abort(404, 'Instancia no encontrada...');
        }

        $instanceDB = $wsInstanceMdl->getAttributes();
        $this->instance = new WorkspaceInstanceContextDto($instanceDB);
    }

    protected function getUuidFromRequest(): ?string
    {
        return request()->route('uuid');
    }
    public function update(WorkspaceInstanceContextDto  $dto)
    {
        //dd($dto->options['dinamics']);
       // $dataUpDB= []
        $options_dinamics = json_encode ($dto->options['dinamics']);
        
        WorkspaceInstanceMdl::where('instance_id', $dto->id )
                               ->update(    ['instance_options_dinamics'=>$options_dinamics ] ); 
                                 
        
    }
}
