<?php
/**
 * Created by Irfan Mahfudz Guntur <mytuta.com>
 * TutaComp Facade
 */
 namespace App\Facades;

 use Illuminate\Support\Facades\Facade;

 class TutaCompFacade extends Facade
 {

 	/**
 	* Get the registered name of the component.
 	*
 	* @return string
 	*/
 	protected static function getFacadeAccessor()
 	{
 		return 'tutacomp';
 	}

 }
