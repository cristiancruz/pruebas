<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company_social_reason;
use App\Developments;

use App\Http\Requests;
use App\Combos;

class BudgetController extends Controller
{
    public function index()
    {
        $company = Company_social_reason::lists('companyReason','id');
        $developments = Developments::lists('name','id');
        $desarrollo = 1 ;
        return view('admin.budgets.index',compact('company','developments','desarrollo'));
    }
    public function getDevelopments(Request $request,$id){
        if($request->ajax()){
            $developments = Combos::developments($id);
            
            return response()->json($developments);
        }
    }
}
