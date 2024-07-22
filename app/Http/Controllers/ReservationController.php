<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        $Reservation = Reservation::create($request->merge([])->toArray());

        return response()->json($Reservation);
    }

    public function read($id = null)
    {
        if ($id) {
            $Reservation = Reservation::where('id', $id)->first();
        } else {
            $Reservation = Reservation::paginate(5);
        }

        return response()->json($Reservation);
    }

    public function update(Request $request, $id)
    {
        $Reservation = Reservation::where('id', $id)->update($request->toArray());

        return response()->json($Reservation);
    }

    public function delete ($id){
        Reservation::where('id' , $id)->delete();

        return response()->json('Reservation deleted successfully!');
    }
}
