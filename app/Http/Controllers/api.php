<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gidas;
use App\Models\Automobilis;
use App\Models\Problema;
use App\Models\Simptomas;
use App\Models\User;
use PHPUnit\Framework\Constraint\Count;

class api extends Controller
{
    ///////////////////////////////////////
    //// Gidai
    ///////////////////////////////////////

    function giduList()
    {
        $gidai = Gidas::all();
        return response()->json($gidai, 200);
    }

    function addGidas(Request $request)
    {
        if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
            return response()->json([
                'message' => 'The request is not a valid JSON.',
            ], 400);
        }
        $id = response()->json(auth()->user()->id);
        $id = json_decode($id->getContent(), true);
        $request['mechanikas_id'] = $id;
        Gidas::create($request->all());
        return response()->json($request, 201);
    }

    function getGidas(Request $request, $gido_id)
    {
        $gidas = Gidas::Where('id', $gido_id)->get();
        if ($gidas->count() == 0)
            return response()->json([
                'message' => 'No "gidas" with id = ' . $gido_id
            ], 404);
        return response()->json($gidas, 200);
    }

    function updateGidas(Request $request, $gido_id)
    {
        $gidas = Gidas::Where('id', $gido_id)->value('mechanikas_id');
        $id = response()->json(auth()->user()->id);
        $id = json_decode($id->getContent(), true);
        if($this->checkIfAdmin() or $id == $gidas){
            if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
                return response()->json([
                    'message' => 'The request is not a valid JSON.',
                ], 400);
            }
            $gidas = Gidas::Where('id', $gido_id)->get();
            if ($gidas->count() == 0)
                return response()->json([
                    'message' => 'No "gidas" with id = ' . $gido_id
                ], 404);
            Gidas::Where('id', $gido_id)->update($request->all());
            $gidas = Gidas::Where('id', $gido_id)->get();
            return response()->json($gidas, 200);
        }
        else{
            return response()->json([
                'message' => 'Access forbidden.',
            ], 403);
        }
    }

    function deleteGidas(Request $request, $gido_id)
    {
        $gidas = Gidas::Where('id', $gido_id)->value('mechanikas_id');
        $id = response()->json(auth()->user()->id);
        $id = json_decode($id->getContent(), true);
        if($this->checkIfAdmin() or $id == $gidas){
            $gidas = Gidas::Where('id', $gido_id)->get();
            if ($gidas->count() == 0)
                return response()->json([
                    'message' => 'No "gidas" with id = ' . $gido_id
                ], 404);
            Gidas::Where('id', $gido_id)->delete();
            return response()->json('', 204);
        }
        else{
            return response()->json([
                'message' => 'Access forbidden.',
            ], 403);
        }
    }

    ///////////////////////////////////////
    //// Automobiliai
    ///////////////////////////////////////

    function automobiliuList()
    {
        $automobilis = Automobilis::all();
        return response()->json($automobilis, 200);
    }

    function addAutomobilis(Request $request)
    {
        if($this->checkIfAdmin()){
            if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
                return response()->json([
                    'message' => 'The request is not a valid JSON.',
                ], 400);
            }
            Automobilis::create($request->all());
            return response()->json($request, 201);
        }
        else{
            return response()->json([
                'message' => 'Access forbidden.',
            ], 403);
        }
    }

    function getAutomobilis(Request $request, $automobilio_id)
    {
        $auto = Automobilis::Where('id', $automobilio_id)->get();
        if ($auto->count() == 0)
            return response()->json([
                'message' => 'No "automobilis" with id = ' . $automobilio_id
            ], 404);
        return response()->json($auto, 200);
    }

    function updateAutomobilis(Request $request, $automobilio_id)
    {
        if($this->checkIfAdmin()){
            if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
                return response()->json([
                    'message' => 'The request is not a valid JSON.',
                ], 400);
            }
            $auto = Automobilis::Where('id', $automobilio_id)->get();
            if ($auto->count() == 0)
                return response()->json([
                    'message' => 'No "automobilis" with id = ' . $automobilio_id
                ], 404);
            Automobilis::Where('id', $automobilio_id)->update($request->all());
            $auto = Automobilis::Where('id', $automobilio_id)->get();
            return response()->json($auto, 200);
        }
        else{
            return response()->json([
                'message' => 'Access forbidden.',
            ], 403);
        }
    }

    function deleteAutomobilis(Request $request, $automobilio_id)
    {
        if($this->checkIfAdmin()){
            $auto = Automobilis::Where('id', $automobilio_id)->get();
            if ($auto->count() == 0)
                return response()->json([
                    'message' => 'No "automobilis" with id = ' . $automobilio_id
                ], 404);
            Automobilis::Where('id', $automobilio_id)->delete();
            return response()->json('', 204);
        }
        else{
            return response()->json([
                'message' => 'Access forbidden.',
            ], 403);
        }
    }

    ///////////////////////////////////////
    //// Mechanikai
    ///////////////////////////////////////

    function mechanikuList()
    {
        $user = User::all();
        return response()->json($user, 200);
    }

    function addMechanikas(Request $request)
    {
        if($this->checkIfAdmin()){
            if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
                return response()->json([
                    'message' => 'The request is not a valid JSON.',
                ], 400);
            }
            User::create($request->all());
            return response()->json($request, 201);
        }
        else{
            return response()->json([
                'message' => 'Access forbidden.',
            ], 403);
        }
    }

    function getMechanikas(Request $request, $mechaniko_id)
    {
        $user = User::Where('id', $mechaniko_id)->get();
        if ($user->count() == 0)
            return response()->json([
                'message' => 'No "mechanikas" with id = ' . $mechaniko_id
            ], 404);
        return response()->json($user, 200);
    }

    function updateMechanikas(Request $request, $mechaniko_id)
    {
        $id = response()->json(auth()->user()->id);
        $id = json_decode($id->getContent(), true);
        if($this->checkIfAdmin() or $id == $mechaniko_id){
            if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
                return response()->json([
                    'message' => 'The request is not a valid JSON.',
                ], 400);
            }
            $user = User::Where('id', $mechaniko_id)->get();
            if ($user->count() == 0)
                return response()->json([
                    'message' => 'No "mechanikas" with id = ' . $mechaniko_id
                ], 404);
            User::Where('id', $mechaniko_id)->update($request->all());
            $user = User::Where('id', $mechaniko_id)->get();
            return response()->json($user, 200);
        }
        else{
            return response()->json([
                'message' => 'Access forbidden.',
            ], 403);
        }
    }

    function deleteMechanikas(Request $request, $mechaniko_id)
    {
        $id = response()->json(auth()->user()->id);
        $id = json_decode($id->getContent(), true);
        if($this->checkIfAdmin() or $id == $mechaniko_id){
            $user = User::Where('id', $mechaniko_id)->get();
            if ($user->count() == 0)
                return response()->json([
                    'message' => 'No "mechanikas" with id = ' . $mechaniko_id
                ], 404);
            User::Where('id', $mechaniko_id)->delete();
            return response()->json('', 204);
        }
        else{
            return response()->json([
                'message' => 'Access forbidden.',
            ], 403);
        }
    }

    function getMechanikasGidai(Request $request, $mechaniko_id)
    {
        $gidas = Gidas::Where('mechanikas_id', $mechaniko_id)->get();
        if ($gidas->count() == 0)
            return response()->json([
                'message' => 'No "gidai" found for mechanikas with id = ' . $mechaniko_id
            ], 404);
        return response()->json($gidas, 200);
    }

    /////////////////////////////////////
    /// Problemos
    /////////////////////////////////////

    function problemuList()
    {
        $prb = Problema::all();
        return response()->json($prb, 200);
    }

    function addProblema(Request $request)
    {

        if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
            return response()->json([
                'message' => 'The request is not a valid JSON.',
            ], 400);
        }
        Problema::create($request->all());
        return response()->json($request, 201);

    }

    function getProblema(Request $request, $problemos_id)
    {
        $prb = Problema::Where('id', $problemos_id)->get();
        if ($prb->count() == 0)
            return response()->json([
                'message' => 'No "problema" with id = ' . $problemos_id
            ], 404);
        return response()->json($prb, 200);
    }

    function updateProblema(Request $request, $problemos_id)
    {
        if($this->checkIfAdmin()){
            if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
                return response()->json([
                    'message' => 'The request is not a valid JSON.',
                ], 400);
            }
            $prb = User::Where('id', $problemos_id)->get();
            if ($prb->count() == 0)
                return response()->json([
                    'message' => 'No "problema" with id = ' . $problemos_id
                ], 404);
            Problema::Where('id', $problemos_id)->update($request->all());
            $prb = Problema::Where('id', $problemos_id)->get();
            return response()->json($prb, 200);
        }
        else{
            return response()->json([
                'message' => 'Access forbidden.',
            ], 403);
        }
    }

    function deleteProblema(Request $request, $problemos_id)
    {
        if($this->checkIfAdmin()){
            $prb = Problema::Where('id', $problemos_id)->get();
            if ($prb->count() == 0)
                return response()->json([
                    'message' => 'No "problema" with id = ' . $problemos_id
                ], 404);
                Problema::Where('id', $problemos_id)->delete();
            return response()->json('', 204);
        }
        else{
            return response()->json([
                'message' => 'Access forbidden.',
            ], 403);
        }
    }

    /////////////////////////////////////
    /// Simptomai
    /////////////////////////////////////

    function simoptomuList()
    {
        $smp = Simptomas::all();
        return response()->json($smp, 200);
    }

    function addSimptomas(Request $request)
    {

        if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
            return response()->json([
                'message' => 'The request is not a valid JSON.',
            ], 400);
        }
        Simptomas::create($request->all());
        return response()->json($request, 201);

    }

    function getSimptomas(Request $request, $simptomo_id)
    {
        $smp = Simptomas::Where('id', $simptomo_id)->get();
        if ($smp->count() == 0)
            return response()->json([
                'message' => 'No "simptomas" with id = ' . $simptomo_id
            ], 404);
        return response()->json($smp, 200);
    }

    function updateSimptomas(Request $request, $simptomo_id)
    {
        if($this->checkIfAdmin()){
            if (!$this->checkIfJsonValid($request) || $request->getContentType() != "json") {
                return response()->json([
                    'message' => 'The request is not a valid JSON.',
                ], 400);
            }
            $smp = User::Where('id', $simptomo_id)->get();
            if ($smp->count() == 0)
                return response()->json([
                    'message' => 'No "simptomas" with id = ' . $simptomo_id
                ], 404);
            Simptomas::Where('id', $simptomo_id)->update($request->all());
            $smp = Simptomas::Where('id', $simptomo_id)->get();
            return response()->json($smp, 200);
        }
        else{
            return response()->json([
                'message' => 'Access forbidden.',
            ], 403);
        }
    }

    function deleteSimptomas(Request $request, $simptomo_id)
    {
        if($this->checkIfAdmin()){
            $smp = Simptomas::Where('id', $simptomo_id)->get();
            if ($smp->count() == 0)
                return response()->json([
                    'message' => 'No "simptomas" with id = ' . $simptomo_id
                ], 404);
                Simptomas::Where('id', $simptomo_id)->delete();
            return response()->json('', 204);
        }
        else{
            return response()->json([
                'message' => 'Access forbidden.',
            ], 403);
        }
    }

    function checkIfJsonValid(Request $request)
    {
        if (empty($request->json()->all())) {
            return false;
        }
        return true;
    }
    function checkIfAdmin()
    {
        $role = response()->json(auth()->user()->administratorius);
        $role = json_decode($role->getContent(), true);
        if ($role == 1) {
            return true;
        }
        return false;
    }
}
