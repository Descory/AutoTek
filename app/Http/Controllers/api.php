<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class api extends Controller
{
    ///////////////////////////////////////
    //// Gidai
    ///////////////////////////////////////

    function giduList()
    {
        $obj = [
            'id' => 1,
            'simptomai' => 'Neuzsiveda',
            'modelis' => 'Audi A3',
            'problema' => 'Sugedusi uzdegimo zvake',
            'sprendimas' => 'Uzdegimo zvakes pakeitimas'
        ];
        $obj2 = [
            'id' => 2,
            'simptomai' => 'Barskejimas po sedyne',
            'modelis' => 'Ford Mondeo mk1',
            'problema' => 'Atsilaisvines sedynes varzas',
            'sprendimas' => 'Varzto priverzimas'
        ];

        $body = [
            $obj,
            $obj2
        ];
        return response()->json($body, 200);
    }

    function addGidas(Request $request)
    {
        if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
            return response()->json([
                'message' => 'The request is not a valid JSON.',
            ], 400);
        }
        $body = [
            'id' => 3,
            'simptomai' => $request->simptomai,
            'modelis' => 'Ford Mondeo mk1',
            'problema' => 'Atsilaisvines sedynes varzas',
            'sprendimas' => 'Varzto priverzimas'
        ];
        return response()->json($body, 201);
    }

    function getGidas(Request $request, $gido_id)
    {
        if ($gido_id != 1)
            return response()->json([
                'message' => 'No "gidas" with id = ' . $gido_id
            ], 404);

        $body = [
            'id' => 1,
            'simptomai' => 'Neuzsiveda',
            'modelis' => 'Audi A3',
            'problema' => 'Sugedusi uzdegimo zvake',
            'sprendimas' => 'Uzdegimo zvakes pakeitimas'
        ];


        return response()->json($body, 200);
    }

    function updateGidas(Request $request, $gido_id)
    {
        if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
            return response()->json([
                'message' => 'The request is not a valid JSON.',
            ], 400);
        }
        if ($gido_id != 1)
            return response()->json([
                'message' => 'No "gidas" with id = ' . $gido_id
            ], 404);

        $body = [
            'id' => 1,
            'simptomai' => $request->simptomai,
            'modelis' => 'Audi A3',
            'problema' => 'Sugedusi uzdegimo zvake',
            'sprendimas' => 'Uzdegimo zvakes pakeitimas'
        ];
        return response()->json($body, 200);
    }

    function deleteGidas(Request $request, $gido_id)
    {
        if ($gido_id != 1)
            return response()->json([
                'message' => 'No "gidas" with id = ' . $gido_id,
            ], 404);

        return response()->json('', 204);
    }

    ///////////////////////////////////////
    //// Automobiliai
    ///////////////////////////////////////

    function automobiliuList()
    {
        $obj = [
            'id' => 1,
            'modelis' => 'Audi A3'
        ];
        $obj2 = [
            'id' => 2,
            'modelis' => 'Ford Mondeo mk1'
        ];

        $body = [
            $obj,
            $obj2
        ];
        return response()->json($body, 200);
    }

    function addAutomobilis(Request $request)
    {
        if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
            return response()->json([
                'message' => 'The request is not a valid JSON.',
            ], 400);
        }
        $body = [
            'id' => 3,
            'modelis' => $request->modelis
        ];
        return response()->json($body, 201);
    }

    function getAutomobilis(Request $request, $automobilio_id)
    {
        if ($automobilio_id != 1)
            return response()->json([
                'message' => 'No "automobilis" with id = ' . $automobilio_id
            ], 404);

        $body = [
            'id' => 1,
            'modelis' => 'Audi A3',
        ];


        return response()->json($body, 200);
    }

    function updateAutomobilis(Request $request, $automobilio_id)
    {
        if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
            return response()->json([
                'message' => 'The request is not a valid JSON.',
            ], 400);
        }
        if ($automobilio_id != 1)
            return response()->json([
                'message' => 'No "automobilis" with id = ' . $automobilio_id
            ], 404);

        $body = [
            'id' => 1,
            'modelis' =>  $request->modelis,
        ];
        return response()->json($body, 200);
    }

    function deleteAutomobilis(Request $request, $automobilio_id)
    {
        if ($automobilio_id != 1)
            return response()->json([
                'message' => 'No "automobilis" with id = ' . $automobilio_id,
            ], 404);

        return response()->json('', 204);
    }

    ///////////////////////////////////////
    //// Mechanikai
    ///////////////////////////////////////

    function mechanikuList()
    {
        $obj = [
            'id' => 1,
            'vardas' => 'Mantas'
        ];
        $obj2 = [
            'id' => 2,
            'vardas' => 'Jeremajus'
        ];

        $body = [
            $obj,
            $obj2
        ];
        return response()->json($body, 200);
    }

    function addMechanikas(Request $request)
    {
        if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
            return response()->json([
                'message' => 'The request is not a valid JSON.',
            ], 400);
        }
        $body = [
            'id' => 3,
            'vardas' => $request->vardas
        ];
        return response()->json($body, 201);
    }

    function getMechanikas(Request $request, $mechaniko_id)
    {
        if ($mechaniko_id != 1)
            return response()->json([
                'message' => 'No "mechanikas" with id = ' . $mechaniko_id
            ], 404);

        $body = [
            'id' => 1,
            'vardas' => 'Mantas',
        ];


        return response()->json($body, 200);
    }

    function updateMechanikas(Request $request, $mechaniko_id)
    {
        if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
            return response()->json([
                'message' => 'The request is not a valid JSON.',
            ], 400);
        }
        if ($mechaniko_id != 1)
            return response()->json([
                'message' => 'No "mechanikas" with id = ' . $mechaniko_id
            ], 404);

        $body = [
            'id' => 1,
            'vardas' =>  $request->vardas,
        ];
        return response()->json($body, 200);
    }

    function deleteMechanikas(Request $request, $mechaniko_id)
    {
        if ($mechaniko_id != 1)
            return response()->json([
                'message' => 'No "mechanikas" with id = ' . $mechaniko_id,
            ], 404);

        return response()->json('', 204);
    }

    function getMechanikasGidai(Request $request, $mechaniko_id)
    {
        if ($mechaniko_id != 1)
            return response()->json([
                'message' => 'No "mechanikas" with id = ' . $mechaniko_id
            ], 404);

        $body = [
            'id' => 1,
            'simptomai' => 'Neuzsiveda',
            'modelis' => 'Audi A3',
            'problema' => 'Sugedusi uzdegimo zvake',
            'sprendimas' => 'Uzdegimo zvakes pakeitimas'
        ];


        return response()->json($body, 200);
    }

    function checkIfJsonValid(Request $request)
    {
        if (empty($request->json()->all())) {
            return false;
        }
        return true;
    }
}
