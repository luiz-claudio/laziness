<?php
// MyVendor\formulario-contato\src\FormularioContatoServiceProvider.php
namespace lsiqueira\laziness;
use Illuminate\Support\ServiceProvider;
class LazinessServiceProvider extends ServiceProvider 
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
       
       
       // $this->publishes([__DIR__ . '/../config/tournaments.php' => config_path('tournaments.php'),]);

       
        $this->publishes([
          __DIR__.'/resources/assets' => base_path('resources'),
        ]);
    }
    public function register()
    {
    }
}