<?php
namespace App\WS\Services\WorkspaceLayout;
use Illuminate\Support\Facades\File;


class WSLayoutManager
{

    private static $instance = null;
    protected array $option = [];
    //protected array $optionDinamics = [];

    protected string $optionFile = 'WSLayoutManagerOptions.php';
    public function __construct(){
        $this->option = $this->loadOption();
    }

    public function __clone(){    }
    public function __wakeup(){   }

    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
            
        }

        return self::$instance;
    }

    
    protected function loadOption(): array
    {    
       /*$options = include $this->optionFile
        //if ( !isset($this->option['module_active'])  && request()->segments()) {
            $this->option ['module_active'] = collect(request()->segments())->last();
        //}else{
         ///    $this->option ['module_active'] = 'default';
        //}*/

        return include $this->optionFile;
        /*dd( $config );
        $this->optionFile = base_path('app/Services/WSLayout/').$this->optionFile;

    //dd(File::exists($this->optionFile));
        //$optionContent = File::get( $this->optionFile);
        
        if (File::exists($this->optionFile)) {
            $optionContent = File::get($this->optionFile);
            dd( $optionContent );
            $option = json_decode($optionContent, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                dd("loades");
                return $option;
            }
        }
        dd("no loades");

        return $this->defaultOptions();*/
    }

    
    protected function defaultOptions(): array
    {
        return [
            'title'     => 'Mi Aplicación',
            'theme'     => 'light',
            'namespace' => 'wslayout::',
            'sidebar'   => true,
            'path'      => $this->resolveLayoutPath(),
        ];
    }

    
    protected function resolveLayoutPath(): string
    {
        return app()->environment('local')
            ? //base_path('project2/appresources/views/layouts/workspace')
            '/app.oasiperu.com/resources/views/layouts/workspace'
            : resource_path('views/layouts/workspace');
    }

    public function get(string $key, $default = null)
    {
        return $this->option[$key] ?? $default;
    }

    public function set(string $key, $value): void
    {
        $this->option[$key] = $value;
    }

    public function all(): array
    {
        return $this->option;
    }

    public function namespace(): string
    {
        return $this->get('namespace');
    }

    public function root(): string
    {
        return $this->namespace();
    }

    public function path(string $view = ''): string
    {
        return $this->namespace() . $view;
    }

    public function viewPath(): string
    {
        return $this->get('path');
    }
}
