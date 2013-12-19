<?php namespace Schema;

use Illuminate\Support\ServiceProvider;
use Projet as P;


class SchemaServiceProvider extends ServiceProvider {

    public function register()
    {     
       	// Admin
    	$this->registerCategorieService();
    	$this->registerThemeService();	
    	$this->registerUserService();	
    	$this->registerProjetService();	
    			
    }
    
    protected function registerCategorieService(){
    
	    $this->app->bind('Schema\Repositories\Categorie\CategorieInterface', function()
        {
            return new \Schema\Repositories\Categorie\DbCategorie();
        });
        
    }
    
    protected function registerThemeService(){
    
	    $this->app->bind('Schema\Repositories\Theme\ThemeInterface', function()
        {
            return new \Schema\Repositories\Theme\DbTheme();
        });
        
    }

    protected function registerUserService(){
    
	    $this->app->bind('Schema\Repositories\User\UserInterface', function()
        {
            return new \Schema\Repositories\User\DbUser();
        });
        
    }
    
    protected function registerProjetService(){
    
	    $this->app->bind('Schema\Repositories\Projet\ProjetInterface', function()
        {
            return new \Schema\Repositories\Projet\DbProjet( new P );
        });
        
    }

}