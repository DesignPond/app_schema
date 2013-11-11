<?php namespace Schema\Repositories;

use Illuminate\Support\ServiceProvider;

class ProjetServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('Schema\Repositories\Projet\ProjetInterface', function()
		{
			return new DbProjet( new Projet );
		});
	}
}