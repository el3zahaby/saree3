<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CrudGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generator {name : Class (singular) for example User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create CRUD operations';

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
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');

        $this->controller($name);
        $this->model($name);
        $this->view($name);

        $routes = "
// " . $name . " Routes --------------------
Route::resource('" . str_plural(strtolower($name)) . "', '" . $name . "Controller');
Route::get('datatable/" . str_plural(strtolower($name)) . "', '" . $name . "Controller@datatable')->name('" . str_plural(strtolower($name)) . ".datatable');
Route::post('" . str_plural(strtolower($name)) . "/updateAll', '" . $name . "Controller@updateAll')->name('" . str_plural(strtolower($name)) . ".updateAll');";

        $sidebar_link = "
<li class=\"br-menu-item\">
    <a data-pjax href=\"{{ route('backend." . str_plural(strtolower($name)) . ".index') }}\" class=\"br-menu-link\">
        <i class=\"menu-item-icon icon ion-ios-folder-outline tx-24\"></i>
        <span class=\"menu-item-label\">@lang('" . ucfirst(str_plural($name)) . "')</span>
    </a>
</li>";

        \File::append(base_path('routes/backend.php'), $routes);
        \File::append(resource_path('views/backend/partials/sidebar_links.blade.php'), $sidebar_link);
    }

    protected function getStub($type)
    {
        return file_get_contents(__Dir__ . "/stubs/$type.stub");
    }

    protected function model($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Model')
        );
        file_put_contents(app_path("Models/{$name}.php"), $modelTemplate);
    }

    protected function controller($name)
    {
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(str_plural($name)),
                strtolower($name)
            ],
            $this->getStub('Controller')
        );
        if (!file_exists($path = app_path('/Http/Controllers/Backend')))
            mkdir($path, 0777, true);

        file_put_contents(app_path("/Http/Controllers/Backend/{$name}Controller.php"), $controllerTemplate);
    }

    protected function request($name)
    {
        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Request')
        );

        if (!file_exists($path = app_path('/Http/Requests')))
            mkdir($path, 0777, true);

        file_put_contents(app_path("/Http/Requests/{$name}Request.php"), $requestTemplate);
    }

    protected function view($name)
    {
        $view = str_replace(
            ['{{modelNamePluralLowerCase}}'],
            [strtolower(str_plural($name))],
            $this->getStub('View')
        );
        $edit = str_replace(
            ['{{modelNamePluralLowerCase}}'],
            [strtolower(str_plural($name))],
            $this->getStub('Edit')
        );
        $fields = str_replace(
            ['{{modelNamePluralLowerCase}}'],
            [strtolower(str_plural($name))],
            $this->getStub('Fields')
        );
        $create = str_replace(
            ['{{modelNamePluralLowerCase}}'],
            [strtolower(str_plural($name))],
            $this->getStub('Create')
        );

        if (!file_exists($path = resource_path('views/backend')))
            mkdir($path, 0777, true);

        if (!file_exists($path = resource_path('views/backend/' . strtolower(str_plural($name)))))
            mkdir($path, 0777, true);

        file_put_contents(resource_path('views/backend/' . strtolower(str_plural($name)) . '.blade.php'), $view);
        file_put_contents(resource_path('views/backend/' . strtolower(str_plural($name)) . '/edit.blade.php'), $edit);
        file_put_contents(resource_path('views/backend/' . strtolower(str_plural($name)) . '/fields.blade.php'), $fields);
        file_put_contents(resource_path('views/backend/' . strtolower(str_plural($name)) . '/create.blade.php'), $create);
    }
}
