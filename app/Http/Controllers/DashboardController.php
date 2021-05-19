<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        if (Auth::user()->hasRole('mahasiswa')){
            $mk = DB::table('mk')->get();
            return view('dashboard_mahasiswa',['mk'=> $mk]);
        }
        else if (Auth::user()->hasRole('dosen')){
            $lr = DB::table('lr2')->get();
            return view('dashboard_dosen', compact('lr'));
        }
        else if(Auth::user()->hasRole('admin')){
            $lr = DB::table('lr2')->get();
            $notifications = DB::table('lr2')->distinct()->count('id_mhs');
            $getmahasiswa = DB::table('lr2')->select('lr2.id_mhs', 'users.name', 'lr2.mk')
            ->join('users', 'lr2.id_mhs', '=', 'users.id')->get();
            $getmahasiswa2 = DB::table('lr2')->select('lr2.id_mhs', 'users.name', 'lr2.mk')
            ->join('users', 'lr2.id_mhs', '=', 'users.id')->get();
            //$get = $getmahasiswa2->groupBy('name')->all();
            //dd($lr, $notifications, $getmahasiswa, $get);
            return view('dashboard', compact('lr', 'notifications', 'getmahasiswa', 'getmahasiswa2'));
        }
    }
    public function liverequest(){
        $userid = Auth::id();
        $lr = DB::table('lr2')->where('id_mhs', $userid)->get();
        return view('liverequest',['lr2'=> $lr]);
    }

    public function createliverequest(){
        $getallsemester = DB::table('kode_semester')->get();
        $getsemester = DB::table('mk')->distinct()->select('mk.semester_id', 'kode_semester.semester')
            ->join('kode_semester', 'mk.semester_id', '=', 'kode_semester.id')->get();
        //dd($getallsemester);
        return view('createliverequest', ['semester' => $getsemester, 'allsemester' => $getallsemester]);
    }

    public function requestkrs($id){
        $req = DB::table('mk')->find($id);
        return view('requestkrs', compact('req'));

    }

    public function request(Request $request){
        $check = DB::table('lr2')->where('mk', $request->mk)->first();
        $checkStatus = DB::table('lr2')->where('status_request',$request->s_request = null);
        if($checkStatus){
        DB::table('lr2')->insert([
            'id_mhs' => $request->user_id,
            'k_mk' => $request->kode_mk,
            'mk' => $request->mk,
            'request_seats' => $request->r_seats,
            'status_request' => '0'
        ]);
        return redirect()->back()->with('message', 'Request telah dikirim');
        }
        else if(!$checkStatus){
        DB::table('lr2')->insert([
                'status_request' => '1'
            ]);
        return redirect()->back()->withErrors('Data existed in DB');
        dd();
        }
    }

    public function store(Request $request){
        DB::table('mk')->insert([
            'k_mk' => $request->k_mk,
            'semester_id' => $request->semester_id,
            'mk' => $request->mk,
            'sks' => $request->sks,
            'semester' => $request->semester,
            'available_seats' => $request->a_seats
        ]);

        return redirect()->back()->with('message', 'Data telah disimpan');
    }

    public function approve($id){
        DB::table('lr2')->where('id', $id)->update(['status_request' => '1']);
        return redirect()->back()->with('message', 'approved');
    }

    public function reject($id){
        DB::table('lr2')->where('id', $id)->update(['status_request' => '2']);
        return redirect()->back()->with('message', 'rejected');
    }

    public function cancel($id){
        DB::table('lr2')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function nameasrequest($id){
        $req = DB::table('lr2')->where('id_mhs', $id)->get();
        return view('nameasrequest', compact('req'));
    }

    public function mkasrequest($id){
        $getmahasiswa2 = DB::table('lr2')->select('lr2.id', 'lr2.id_mhs', 'users.name', 'lr2.mk', 'lr2.k_mk', 'lr2.status_request')->join('users', 'lr2.id_mhs', '=', 'users.id')->get();
        $req = $getmahasiswa2->where('id', '=', $id)->all();
        return view('mkasrequest', compact('req'));
    }
}
