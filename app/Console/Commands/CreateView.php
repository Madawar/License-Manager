<?php

namespace App\Console\Commands;

use App\Models\Account;
use Illuminate\Console\Command;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use PDO;

class CreateView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view';

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
        $model = $this->choice(
            'What model do you want to generate?',
            $models,
        );
        $ModelObject = new $model;
        $column_names = Schema::getColumnListing($ModelObject->getTable());
        $column_names = array_combine($column_names, $column_names);
        $column_names = Arr::except($column_names, ['updated_at','created_at','deleted_at','id']);
        $table_stub =  $this->createTable($column_names, $model);
        $form_stub =  $this->createForm($column_names, $model);
        $model_singular = Str::of(Str::of($model)->after('\\App\Models\\'))->lower();
        $model_plural = Str::of(Str::of($model)->after('\\App\Models\\'))->lower()->plural();
        $form_path = base_path('resources/views/generated/' . 'create_' . $model_singular . '.blade.php');
        $table_path = base_path('resources/views/generated/' . 'view_' . $model_plural . '.blade.php');
        if (!File::exists(base_path('resources/views/generated'))) {
            File::makeDirectory(base_path('resources/views/generated'));
            File::put($form_path, $form_stub);
            File::put($table_path, $table_stub);
        } else {
            File::put($form_path, $form_stub);
            File::put($table_path, $table_stub);
        }
        return 0;
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

    public function createTable($attributes, $model)
    {
        $stub_content = null;
        $stub_header = null;
        $model = Str::of($model)->after('\\App\Models\\');
        foreach ($attributes as $input) {
            /*
            $choice = $this->choice(
                'Transformation for this Field :' . $input,
                ['Normal', 'Number', 'Choice', 'Date'],
                1
            );

            */
            $choice = 0;
            if ($this->confirm('Do you want to generate field :' . $input, true)) {
                $stub =   $this->getField($input, $model, $choice);
                $stub_content  = $stub[0] . $stub_content;
                $stub_header  = $stub[1] . $stub_header;
            }
        }
        $headers = Str::of($model)->lower()->plural();
        $header = Str::of($model)->lower();
        $table = file_get_contents(base_path('stubs/own/forms/table.stub'));
        $stub = str_replace(array('table_header', 'headers_x', 'header_x', 'table_content_x'), array($stub_header, $headers, $header, $stub_content), $table);
        return $stub;
    }

    public function getField($input, $model, $type)
    {
        $header = base_path('stubs/own/forms/table_header.stub');
        $table_header = file_get_contents($header);
        $content = base_path('stubs/own/forms/table_content.stub');
        $table_content = file_get_contents($content);
        $model = Str::of($model)->lower();
        $stub = str_replace(array('model_x', 'header_x'), array($model, $input), $table_content);
        $stub_header = str_replace(array('header_x'), array(Str::title(str_replace('_', ' ', $input))), $table_header);
        return [$stub, $stub_header];
    }

    public function createForm($attributes, $model)
    {
        $form_stub = null;
        $model = Str::of($model)->after('\\App\Models\\');
        foreach ($attributes as $input) {
            $choice = $this->choice(
                'What Kind of Form Element is ' . $input,
                ['input', 'select', 'radio', 'textarea', 'password', 'checkbox'],
            );
            $label =  $this->anticipate('Label For : ' . $input, [Str::title(str_replace('_', ' ', $input))]);
            $placeholder =  $this->anticipate('Placeholder For : ' . $input, [Str::title(str_replace('_', ' ', $input))]);

            $form_stub =  $form_stub . $this->getForm($label, $placeholder, $input, $model, [], $choice);
        }
        $file = base_path('stubs/own/create.stub');
        $contents = file_get_contents($file);
        $model_variable = Str::of($model)->after('\\App\Models\\')->lower();
        $stub = str_replace(array('footer_x', 'form_x', 'header_x', 'model_x', 'model_v'), array('My Footer', $form_stub, 'My Header', $model, $model_variable), $contents);
        return $stub;
    }
    public function getForm($label = 'Label', $placeholder = 'Placeholder', $name = 'Name', $model = 'Model', $options = [], $type = 'input')
    {
        $file_choice = 'stubs/own/forms/' . $type . '.stub';
        $file = base_path($file_choice);
        $contents = file_get_contents($file);
        $model_variable = Str::of($model)->after('\\App\Models\\')->lower();
        $stub = str_replace(array('label_x', 'placeholder_x', 'name_x', 'model_x'), array($label, $placeholder, $name, $model_variable, $options), $contents);
        return $stub;
    }
}
