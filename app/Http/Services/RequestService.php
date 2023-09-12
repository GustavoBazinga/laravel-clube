<?php

namespace App\Http\Services;

use App\Models\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Requests\UpdateRequestRequest;
use Illuminate\Http\Request as RequestHttp;
use App\Http\Middleware\CodeBookConversor as CodeBook;

class RequestService  {
    
        private static $months = [
            '01' => ['jan', 'janeiro'],
            '02' => ['fev', 'fevereiro'],
            '03' => ['mar', 'março'],
            '04' => ['abr', 'abril'],
            '05' => ['mai', 'maio'],
            '06' => ['jun', 'junho'],
            '07' => ['jul', 'julho'],
            '08' => ['ago', 'agosto'],
            '09' => ['set', 'setembro'],
            '10' => ['out', 'outubro'],
            '11' => ['nov', 'novembro'],
            '12' => ['dez', 'dezembro'],
        ];
    
        public static function indexDashboard($form, $timeStart = "", $timeEnd = "") {
            $requests = Request::where('form_id', $form)->get();
            
            if ($form == '1') $data = self::dashboardSolicitacao($requests, $timeStart, $timeEnd);


            return $data;
        }

        private static function dashboardSolicitacao($requests, $timeStart = "", $timeEnd = ""){
            $total = $requests->count();
            $totalOpen = $requests->where('status', CodeBook::Aberto)->count();
            $totalDone = $requests->where('status', CodeBook::Finalizado)->count();
            $totalInProgress = $requests->where('status', CodeBook::EmAndamento)->count();

            $requestsByPeriod = $requests->whereBetween('created_at', [$timeStart, $timeEnd]);
            $totalByPeriod = $requestsByPeriod->count();
            $totalDoneByPeriod = $requestsByPeriod->where('status', CodeBook::Finalizado)->where('finalized_at', '<>', null);
            $totalDoneByPeriod = $totalDoneByPeriod->whereBetween('finalized_at', [$timeStart, $timeEnd])->count();

            //By area
            $requestsByArea = $requestsByPeriod->groupBy('area');

            $totalByArea = [];
            foreach ($requestsByArea as $key => $value) {
                $totalByArea[$key] = $value->count();
            }

            //By type
            $requestsByType = $requestsByPeriod->groupBy('type');

            $totalByType = [];
            foreach ($requestsByType as $key => $value) {
                $totalByType[$key] = $value->count();
            }

            
            $months = self::get_last_month_list();

            $totalByMonth = [];

            foreach ($months as $month) {
                $totalByMonth[self::$months[explode("-", $month)[1]][1]] = $requests->whereBetween('created_at', [$month . '-01', $month . '-31'])->count();
                // $totalByMonth[$month] = $requests->whereBetween('created_at', [$month . '-01', $month . '-31'])->count();
            }

            return [
                'total' => $total,
                'totalOpen' => $totalOpen,
                'totalDone' => $totalDone,
                'totalInProgress' => $totalInProgress,
                'totalByPeriod' => $totalByPeriod,
                'totalDoneByPeriod' => $totalDoneByPeriod,
                'totalByMonth' => $totalByMonth,
                'totalByArea' => $totalByArea,
                'totalByType' => $totalByType,
            ];
        }

        private static function get_last_month_list() {
            $meses = [];
            for ($i = 0; $i < 6; $i++) {
              $meses[] = date('Y-m', strtotime('-' . $i . ' months'));
            }
            //Reverse array
            $meses = array_reverse($meses);
            return $meses;
        }
}