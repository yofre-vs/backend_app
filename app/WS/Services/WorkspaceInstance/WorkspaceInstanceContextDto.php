<?php
namespace App\WS\Services\WorkspaceInstance;

class WorkspaceInstanceContextDto
{
    public string $id = '';
    public string $uuid = '';
    public string $ws = '';
    public string $ws_id = '';
    public array $options = [];
    public array $users = [];
    public array $company = [];
    public array $facility = [];
    public array $subscription = [];
    public string $status = '';
    public string $updated = '';
    public string $created = '';
    public string $company_id = '';
    public string $facility_id = ''; 

    public function __construct(array $instanceDB)
    {
        $this->id = $instanceDB["workspace_id"] ?? '';
        $this->uuid = $instanceDB["workspace_uuid"] ?? '';
        $this->ws = $instanceDB["workspace_ws"] ?? '';
        $this->ws_id = $instanceDB["workspace_ws_id"] ?? ''; 
        $this->options = $this->decodeOptions($instanceDB["workspace_options"] ?? null) ;
        $this->options["dinamics"] = $this->decodeOptions($instanceDB["workspace_options_dinamics"] ?? null) ;
                           
                             
        $this->users = $this->decodeUsers($instanceDB["workspace_users"] ?? null);

        $this->company = json_decode($instanceDB["workspace_company"] ?? '{}', true) ?: [];
        $this->facility = json_decode($instanceDB["workspace_facility"] ?? '{}', true) ?: [];
        $this->subscription = json_decode($instanceDB["workspace_subscription"] ?? '{}', true) ?: [];

        $this->status = $instanceDB["workspace_status"] ?? '';
        $this->updated = $instanceDB["workspace_updated"] ?? '';
        $this->created = $instanceDB["workspace_created"] ?? '';
        $this->companyId = $instanceDB["company_id"] ?? '';
        $this->facilityId = $instanceDB["facility_id"] ?? ''; 
    }

    private function decodeOptions(?string $json): array
    {  
        if (!$json) return [];
        $data = json_decode($json, true);
  
        
        
        
        if (!is_array($data)) return [];

        uasort($data, function ($a, $b) {
            return strcmp($a['slug'] ?? '', $b['slug'] ?? '');
        });
 
        return $data ;

    }

    private function decodeUsers(?string $json): array
    {
        if (!$json) return [];
        $data = json_decode($json, true);
        if (!is_array($data)) return [];

        if ($this->isAssoc($data)) {
            ksort($data, SORT_STRING);
        } else {
            usort($data, function ($a, $b) {
                return strcmp($a['id'] ?? '', $b['id'] ?? '');
            });
        }

        return $data;
    }

    private function isAssoc(array $arr): bool
    {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    } 

}
