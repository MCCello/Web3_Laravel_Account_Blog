<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    function index()
    {
        $user_data = DB::table('users')->get();
        return view('export_excel')->with('user_data',$user_data);
    }

    function excel()
    {
       return Excel::download(new UsersExport,'users.xlsx');
       
    }

}
