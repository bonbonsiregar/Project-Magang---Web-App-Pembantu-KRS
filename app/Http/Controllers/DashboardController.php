<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        if (Auth::user()->hasRole('mahasiswa')){
            $mk = DB::table('mk')->select('mk.id', 'mk.semester_id', 'kode_semester.nama_semester', 'mk.k_mk', 'mk.mk', 'mk.sks', 'mk.semester', 'mk.available_seats')
            ->join('kode_semester', 'mk.semester_id', '=', 'kode_semester.id')->get();
            return view('dashboard_mahasiswa',['mk'=> $mk]);
        }
        else if (Auth::user()->hasRole('dosen')){
            $dosen = DB::table('lr2')->get();
            return view('dashboard_dosen', compact('dosen'));
        }
        else if(Auth::user()->hasRole('admin')){
            $lr = DB::table('lr2')->get()->unique('k_mk');
            return view('dashboard', compact('lr'));
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

    public function requestpermahasiswa(){
        $getmahasiswa = DB::table('lr2')->select('lr2.id_mhs', 'users.name', 'lr2.mk')->join('users', 'lr2.id_mhs', '=', 'users.id')->get()->unique('id_mhs');
//        dd($getmahasiswa);
        return view('requestpermahasiswa', compact('getmahasiswa'));
    }

    public function requestkrs($id){
        $req = DB::table('mk')->find($id);
        return view('requestkrs', compact('req'));

    }

    public function request(Request $request){
        $check = DB::table('lr2')->where('k_mk', $request->kode_mk)->where('id_mhs', $request->user_id)->exists();
        //$check2 = DB::table('lr2')->where('k_mk', $request->kode_mk)->where('id_mhs', $request->user_id)->where('created at', '<', Carbon::now())->exists();
        if(!$check){
        DB::table('lr2')->insert([
            'id_mhs' => $request->user_id,
            'k_mk' => $request->kode_mk,
            'mk' => $request->mk,
            'request_seats' => $request->r_seats,
            'status_request' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect()->back()->with('alert', 'Request telah dikirim');
        }
        else{
            return redirect()->back()->with('message', 'Data existed in DB!');
        }
//        if ($check2){
//
//        }
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

    public function mkasrequest($k_mk){
        $getmahasiswa2 = DB::table('lr2')->select('lr2.id', 'lr2.id_mhs', 'users.name', 'lr2.mk', 'lr2.k_mk', 'lr2.status_request')->join('users', 'lr2.id_mhs', '=', 'users.id')->get();
        $req = $getmahasiswa2->where('k_mk', '=', $k_mk)->all();
//        dd($getmahasiswa2, $req);
        return view('mkasrequest', compact('req'));
    }
    public function requestagain($id){
        $req = DB::table('lr2')->find($id);
        return view('requestagain', compact('req'));
    }
    public function request2(Request $request, $id){
        $check = DB::table('lr2')->where('k_mk', $request->kode_mk)->where('id_mhs', $request->user_id)->exists();
        if($check){
            DB::table('lr2')->where('id', $id)->update([
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'status_request' => '0'
             ]);
            return redirect()->back()->with('message', "Request telah dikirim kembali");
        }
        else if(!$check){
        return redirect()->back()->with('message', "Request gagal");
        }
    }
}
