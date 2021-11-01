<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Account;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Support\Str;
use PDO;

class Sidebar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:sidebar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $models   = $this->getAvailableModels();
        $stub = null;
        foreach ($models as $model) {
            $route_name = Str::of(Str::of($model)->after('\\App\Models\\'))->lower();
            $name = Str::of(Str::of($model)->after('\\App\Models\\'));
            $title = Str::of(Str::of($model)->after('\\App\Models\\'))->plural();
            $controller = Str::of(Str::of($model)->after('\\App\Models\\')) . 'Controller::class';
            $stub = $stub . $this->getSidebar($route_name, $name, $title, $controller);
        }
        $contents = file_get_contents(base_path('stubs/own/sidebar.stub'));
        $stub = str_replace(array('sidebar_x'), array($stub), $contents);
        $sidebar_path = base_path('resources/views/generated/' . 'sidebar.blade.php');
        if (!File::exists(base_path('resources/views/generated'))) {
            File::makeDirectory(base_path('resources/views/generated'));
            File::put($sidebar_path, $stub);

        } else {
            File::put($sidebar_path, $stub);

        }
        return 0;
    }
    public function getSidebar($route_name, $name, $title, $controller)
    {
        $contents = file_get_contents(base_path('stubs/own/sidebarItem.stub'));
        $stub = str_replace(array('route_x', 'name_x', 'title_x', 'controller_x'), array($route_name, $name, $title, $controller), $contents);
        return $stub;
    }
    public  function getAvailableModels()
    {

        $models = [];
        $modelsPath = app_path('Models');
        $modelFiles = File::allFiles($modelsPath);
        foreach ($modelFiles as $modelFile) {
            $models[] = '\App\\Models\\' . $modelFile->getFilenameWithoutExtension();
        }

        return $models;
    }
}
