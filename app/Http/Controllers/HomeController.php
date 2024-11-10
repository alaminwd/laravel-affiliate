<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $monthVisitor = Visitor::whereMonth('updated_at', $currentMonth)
                           ->whereYear('updated_at', $currentYear)
                           ->get();

        $visitors = Visitor::groupBy('ip_address')->get();
        
        
        return view('pages.dashboard.dashboard',[
            'visitors'=>$visitors,
            'monthVisitor'=>$monthVisitor,
        ]);
    }

    
    function delete_visitor($id){
        // Delete the visitor by id and return the number of rows affected
        // return Visitor::where('id', $id)->delete();
        Visitor::where('id', $id)->delete();
        return back();
    }
    
    function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
