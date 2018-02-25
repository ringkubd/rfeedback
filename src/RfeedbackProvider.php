<?php

namespace Anwar\Rfeedback;

use Illuminate\Support\ServiceProvider;
use Rfeedback;

class RfeedbackProvider extends ServiceProvider {
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		
		$data = Rfeedback::view_content();
		view()->share('rfeedback', $data);

		$this->loadRoutesFrom(__DIR__ . '/routes.php');
		$this->loadMigrationsFrom(__DIR__ . '/Database');

		$this->publishes([
			__DIR__ . '/config/rfeedback.php' => config_path('rfeedback.php'),
		]);

		$this->publishes([
			__DIR__ . '/assets' => public_path('vendor/rfeedback'),
		], 'public');
	}

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {

		$this->publishes([
			__DIR__ . '/Database' => database_path('migrations'),
		], 'migrations');

		$this->app->make('Anwar\Rfeedback\RfeedbackController');
		$this->app->bind('Rfeedback', function () {
			return new RfeedbackController;
		});
	}
}
