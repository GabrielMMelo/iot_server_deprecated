<?php

/*

 Helped from:
  - https://github.com/amochohan/laravel-make-resource/blob/master/src/Commands/ResourceMakeCommand.php
  - https://github.com/atehnix/laravel-stubs


 */

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Composer;
use Illuminate\Filesystem\Filesystem;

class makeModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {type : Type of module} {id : ID of esp8266}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make all files and changes to a new module. Allowed modules types: tv | ';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $files;
    /**
     * @var Composer
     */
    private $composer;


    /**
     * Create a new command instance.
     *
     * @param Filesystem $files
     * @param Composer $composer
     */
    public function __construct(Filesystem $files, Composer $composer)
    {
        parent::__construct();
        $this->files = $files;
        $this->composer = $composer;
        $this->type = '';

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   

        // uma view, um controller, add to dashboard, add to route(?)

        $type = trim($this->argument('type'));
        $id = trim($this->argument('id'));

        if($type == "tv"){
            
            $name = $this->fileName($type);

            $this->createView($name, $type);
            $this->createController($name, $id, $type);
        }

        else{
            $this->error(' Undefinied entry type! ');
        }
       
       // $this->addToDashboard($name);

    }

    private function createView($name, $type) {
        if($type == 'tv'){
            //$name = $this->ucName($name);
            $stub = $this->files->get(base_path('/resources/stubs/module_tv_view.stub'));
            $stub = str_replace('MODULE_NAME', $this->formatName($name), $stub);
            $filename = $name.".blade.php";
            $this->files->put(base_path('resources/views/').$filename, $stub);
            $this->info('Created view ' . $filename);
            return true;
        }
    }

    // Check if already exists a tv module with the given esp8266 id 
    private function createController($name, $id, $type) {

        if($type == 'tv'){
            //$name = $this->ucName($name);
            $stub = $this->files->get(base_path('/resources/stubs/module_tv_controller.stub'));
            $stub = str_replace('MODULE_NAME', $name, $stub);
            $stub = str_replace('MODULE_VIEW_NAME', $name, $stub);
            $stub = str_replace('MODULE_ID', $id, $stub);
            $filename = $name."Controller.php";
            $this->files->put(base_path('app/Http/Controllers/').$filename, $stub);
            $this->info('Created Controller ' . $filename);
            return true;
        }
    }


     /**
     * Build a formated name from a word (first letter to UPPERCASE).
     *
     * @param string $name
     * @return string
     */
    private function ucName($name)
    {
        return ucfirst($name);
    }

    /**
     * Build a formated name from a word (first letter to UPPERCASE & without '_').
     *
     * @param string $name
     * @return string
     */
    private function formatName($name)
    {
        return str_replace('_', " ", ucfirst($name));
    }

    /**
     * Build a formated name from a word (name with '_' & id like "test_2").
     *
     * @param string $name
     * @return string
     */
    private function fileName($name) {

        for ($i=1; $i < 100 ; $i++) { 
        
            if (!view()->exists($name.'_'.$i)) {
        
                $name = $name.'_'.$i;
                break;
            }
        }

        return $name;
    }


}
