<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TargetArea;
use Illuminate\Support\Facades\DB;


class TargetAreaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 50;

        if (!empty($keyword)) {
            $areas = TargetArea::select(
                'id', 'number', 'county', 'sub_county', 'ward','village'
            )->where('county', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")
            ->orderBy('number', 'asc')
            ->paginate($perPage);
        } else {
            $areas = TargetArea::select(
                'id', 'number', 'county', 'sub_county', 'ward','village'
            )->orderBy('number', 'asc')->paginate($perPage);
        }

        return view('admin.targetarea', compact('areas'));
    }
}
