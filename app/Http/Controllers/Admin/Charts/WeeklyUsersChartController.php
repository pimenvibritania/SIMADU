<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class WeeklyUsersChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read CrudPanel $crud
 */
class WeeklyUsersChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels([
            'Today',
        ]);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/weekly-users'));

        // OPTIONAL
         $this->chart->minimalist(false);
         $this->chart->displayLegend(true);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return void
     */
     public function data()
     {
         $users_created_today = User::whereDate('created_at', today())->count();

         $this->chart->dataset('Users Created', 'bar', [
                     $users_created_today,
                 ])
             ->color('rgba(205, 32, 31, 1)')
             ->backgroundColor('rgba(205, 32, 31, 0.4)');
     }
}
