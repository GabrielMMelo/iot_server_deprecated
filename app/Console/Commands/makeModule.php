<?php

/*

 Helped from:
  - https://github.com/amochohan/laravel-make-resource/blob/master/src/Commands/ResourceMakeCommand.php
  - https://github.com/atehnix/laravel-stubs


 */

namespace App\Console\Commands;

use App\Tv;

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
    protected $signature = 'make:module {type : Type of module} {id? : ID of esp8266} {owner? : Module\'s owner} {--M|model=SAMSUNG : Tv model. Allowed models SAMSUNG | LG} {--C|counter= : Module counter identifier} {--D|delete : Delete a module.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make all files and changes to a new module. Allowed modules types: node | tv';

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
        $this->count = 1;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {   

        $this->type = trim($this->argument('type'));
        

        if($this->type == "tv") {

            if($this->option('delete')){
                if(!is_null($this->option('counter'))){
                    $this->deleteDB($this->option('counter'));
                }
                else 
                    $this->error(' Module counter identifier was not specified! Use -C COUNTER to set your module COUNTER ');
            }

            else {
                $id = trim($this->argument('id'));
                $owner = trim($this->argument('owner'));
                $name = $this->fileName($this->type);

                $this->createView($name);
                $this->insertDB($id, $owner, $this->option('model'));
            }

        }

        else if($this->type == "node"){


        }

        else if($this->type == "delete"){

            $this->deleteDB();

        }

        else {
            $this->error(' Undefinied entry type! ');
        }
       
       // $this->addToDashboard($name);

    }

    private function createView($name) {
        if($this->type == 'tv'){
            $stub = $this->files->get(base_path('/resources/stubs/module_tv_view.stub'));
            $stub = str_replace('MODULE_NAME', $this->formatName($name), $stub);
            $filename = $name.".blade.php";
            $this->files->put(base_path('resources/views/').$filename, $stub);
            $this->info('Created view ' . $filename);
            return true;
        }

        else if($this->type == 'node'){
            $stub = $this->files->get(base_path('/resources/stubs/module_node_view.stub'));
            $stub = str_replace('MODULE_NAME', $this->formatName($name), $stub);
            $filename = $name.".blade.php";
            $this->files->put(base_path('resources/views/').$filename, $stub);
            $this->info('Created view ' . $filename);
            return true;

        }
    }

    private function insertDB($id, $owner, $model){
        if($this->type == 'tv'){
            $tv = new Tv;
            $tv->count = $this->count;
            $tv->id_esp = $id;
            $tv->owner = $owner;
            $tv->model = $model;
            $tv->save();
        }

        else if($this->type == 'node'){

            
        }
    }

    // Implement to destroy all modules, not only tvs
    private function deleteDB(...$args){
        $count = count($args);
        if(!$count){
            for ($i=1; $i < count(Tv::all()) + 1 ; $i++) { 
                $this->files->delete(base_path('resources/views/tv_'.$i.'.blade.php'));
                $this->info('Deleted view tv_'.$i.'.blade.php');
            }
            Tv::where('count','>',0)->delete();
        }
        if($count == 1){
            $this->files->delete(base_path('resources/views/tv_'.$args[0].'.blade.php'));
            $this->info('Deleted view tv_'.$args[0].'.blade.php');
            Tv::where('count','=',$args[0])->delete();
        }

    }

    // Check if already exists a tv module with the given esp8266 id 
    /*private function createController($name, $id, $type) {

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
    */

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
                $this->count = $i;
                break;
            }
        }

        return $name;
    }


}
