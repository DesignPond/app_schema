<?php namespace Schema;

use Illuminate\Support\ServiceProvider;

use Schema\Compose\Entities\Projet as Projet;
use Schema\Categories\Entities\Categorie as Categorie;
use Schema\Themes\Entities\Theme as Theme;
use Schema\Subthemes\Entities\Subtheme as Subtheme;
use Schema\User\Entities\User as User;

class SchemaServiceProvider extends ServiceProvider {

    public function register()
    {

    	$this->registerCategorieService();
    	$this->registerThemeService();	
    	$this->registerSubthemeService();	
    	$this->registerUserService();	
    	$this->registerProjetService();
    			
    }
    
    protected function registerCategorieService(){
    
	    $this->app->bind('Schema\Categories\Repo\CategorieInterface', function()
        {
            return new \Schema\Categories\Repo\DbCategorie(new Categorie);
        });
        
    }
    
    protected function registerThemeService(){
    
	    $this->app->bind('Schema\Themes\Repo\ThemeInterface', function()
        {
            return new \Schema\Themes\Repo\DbTheme(new Theme);
        });
        
    }
    
    protected function registerSubthemeService(){
    
	    $this->app->bind('Schema\Subthemes\Repo\SubthemeInterface', function()
        {
            return new \Schema\Subthemes\Repo\DbSubtheme(new Subtheme);
        });
        
    }
    
    protected function registerUserService(){
    
	    $this->app->bind('Schema\User\Repo\UserInterface', function()
        {
            return new \Schema\User\Repo\DbUser(new User);
        });
        
    }
    
    protected function registerProjetService(){
    
	    $this->app->bind('Schema\Compose\Repo\ProjetInterface', function()
        {
            return new \Schema\Compose\Repo\DbProjet( new Projet );
        });
        
    }

}