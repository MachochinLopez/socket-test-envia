<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait CountsShipments
{
    /**
     * Hace una petición para traer los envíos hechos en el mes
     * del año actual y devuelve la cantidad total.
     * 
     * @return int
     */
    protected function countShipments()
    {
        // Toma el mes y año actual.
        $date = date('m/Y', time());

        // Hace la llamada de API para traer los shipments hechos este mes.
        $shipments = Http::withToken(env('ENVIA_API_TOKEN'))
            ->get("https://queries-test.envia.com/guide/$date");

        return count($shipments->json(['data']));
    }
}
