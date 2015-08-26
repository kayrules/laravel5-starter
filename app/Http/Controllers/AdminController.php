<?php namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Theme;
use Helper;

class AdminController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function GET_index()
    {
        $theme = Theme::uses('notebook')->layout('default');
		$theme->setMenu('admin.index');

		$theme->asset()->usePath()->add('bootstrap-calendar', 'js/calendar/bootstrap_calendar.css');
		
		$theme->asset()->container('post-scripts')->usePath()->add('laravel1', 'js/app.plugin.js');
		$theme->asset()->container('post-scripts')->usePath()->add('laravel2', 'js/charts/easypiechart/jquery.easy-pie-chart.js');
		$theme->asset()->container('post-scripts')->usePath()->add('laravel3', 'js/charts/sparkline/jquery.sparkline.min.js');
		$theme->asset()->container('post-scripts')->usePath()->add('laravel4', 'js/charts/flot/jquery.flot.min.js');
		$theme->asset()->container('post-scripts')->usePath()->add('laravel5', 'js/charts/flot/jquery.flot.tooltip.min.js');
		$theme->asset()->container('post-scripts')->usePath()->add('laravel6', 'js/charts/flot/jquery.flot.resize.js');
		$theme->asset()->container('post-scripts')->usePath()->add('laravel7', 'js/charts/flot/jquery.flot.grow.js');
		$theme->asset()->container('post-scripts')->usePath()->add('laravel8', 'js/charts/flot/demo.js');
		$theme->asset()->container('post-scripts')->usePath()->add('laravel9', 'js/calendar/bootstrap_calendar.js');
		$theme->asset()->container('post-scripts')->usePath()->add('laravel10', 'js/calendar/demo.js');
		$theme->asset()->container('post-scripts')->usePath()->add('laravel11', 'js/sortable/jquery.sortable.js');

		$params = array();
		return $theme->scope('admin.index', $params)->render();
    }
}