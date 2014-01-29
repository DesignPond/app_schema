<?php namespace Schema\Repositories;

use Illuminate\Support\ServiceProvider;
use Projet as P;

class ProjetServiceProvider extends ServiceProvider {

	public function register()
	{	
		$this->registerProjetService();
		$this->registerSchemaService();		
	}
		    
    protected function registerProjetService(){
    
		$this->app->bind('Schema\Repositories\Projet\ProjetInterface', function()
		{
			return new DbProjet( new P );
		});        
    }

    protected function registerSchemaService(){
    
		$this->app->bind('Schema\Repositories\Projet\SchemaValidator', function()
		{
			return new DbProjet( new P );
		});
    }
        
}