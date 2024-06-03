<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Process\Process;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function pull()
    {
        $command = new Process("git pull");
        $command->setWorkingDirectory(base_path());
        $command->run();

        $response = [];

        if ($command->isSuccessful()) {
            $response['pull'] = 'ok';
        } else {
            $response['pull'] = 'Erro';
        }

        $migrate = new Process("/usr/local/bin/ea-php74 artisan migrate");
        $migrate->setWorkingDirectory(base_path());
        $migrate->run();

        if ($migrate->isSuccessful()) {
            $response['migrate'] = 'ok';
        } else {
            $response['migrate'] = 'Erro';
        }

        dd($response);
    }

    

    public function formatMoney($value)
    {
        $value = str_replace(".", "", $value);
        $value = str_replace(",", ".", $value);

        return $value;
    }


    
}
