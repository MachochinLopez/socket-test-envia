<?php

namespace App\Http\Controllers;

use App\Events\GuideNotification;
use App\Traits\CountsShipments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShipmentController extends Controller
{
    use CountsShipments;

    /**
     * Carga la vista de home.
     * 
     * @return Vista de home
     */
    public function home()
    {
        // Cuenta la cantidad de shipments.
        $guidesAmount = $this->countShipments();
        // Y genera la vista.
        return view('realtime-counter', compact('guidesAmount'));
    }

    /**
     * Crea un shipment de ejemplo.
     * 
     * @return Response
     */
    public function storeExampleShipment()
    {
        // SHIPMENT DE EJEMPLO.
        $exampleShipment = [
            "origin" => [
                "name" => "oscar mx",
                "company" => "oskys factory",
                "email" => "osgosf8@gmail.com",
                "phone" => "8116300800",
                "street" => "av vasconcelos",
                "number" => "1400",
                "district" => "mirasierra",
                "city" => "Monterrey",
                "state" => "NL",
                "country" => "MX",
                "postalCode" => "66236",
                "reference" => ""
            ],
            "destination" => [
                "name" => "oscar",
                "company" => "empresa",
                "email" => "osgosf8@gmail.com",
                "phone" => "8116300800",
                "street" => "av vasconcelos",
                "number" => "1400",
                "district" => "palo blanco",
                "city" => "monterrey",
                "state" => "NL",
                "country" => "MX",
                "postalCode" => "66240",
                "reference" => ""
            ],
            "packages" => [
                [
                    "content" => "camisetas rojas",
                    "amount" => 1,
                    "type" => "box",
                    "dimensions" => [
                        "length" => 1,
                        "width" => 1,
                        "height" => 1
                    ],
                    "weight" => 1,
                    "insurance" => 100,
                    "declaredValue" => 100,
                    "weightUnit" => "KG",
                    "lengthUnit" => "CM"
                ]
            ],
            "shipment" => [
                "carrier" => "fedex",
                "service" => "express",
                "type" => 1
            ],
            "settings" => [
                "printFormat" => "PDF",
                "printSize" => "STOCK_4X6",
                "comments" => "comentarios de el envío"
            ]
        ];

        // Hace la llamada a la API para crear un nuevo shipment.
        $response = Http::withToken('69d3e474f221bf096869846fd44c531977b9917a3e5421b87c7c739403cf3b4b')
            ->post("https://api-test.envia.com/ship/generate", $exampleShipment);
        // Notifica la generación de un nuevo shipment.
        event(new GuideNotification($response));

        return $response;
    }
}
