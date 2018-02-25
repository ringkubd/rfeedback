<?php
namespace Anwar\Rfeedback\Facades;

/**
 * @Author: anwar
 * @Date:   2018-02-19 16:28:00
 * @Last Modified by:   anwar
 * @Last Modified time: 2018-02-25 12:25:58
 */
use Illuminate\Support\Facades\Facade;

class RfeedbackFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() {
		return 'Rfeedback';
	}
}