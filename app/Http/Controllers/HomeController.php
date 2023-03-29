<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\UploadFile;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;



class HomeController extends Controller
{
    public function index() 
    {
        return view('home.index');
    }
    
    public function saveCookie(Request $request){
				$name = $request ->input('txt_Name');
				Cookie::queue("name_user",$name,3600);
				return redirect()->back();
			}
    public function saveAvatar(Request $request){
				$request -> validate([
                    "avatar"=>'required|image'
                ]);
                $avatarName= time().".".$request->avatar->getClientOriginalExtension() ;
                $request->avatar-> move(public_path('avatars'),$avatarName);
                Auth()->user()->update(['avatar' => $avatarName]);
                return back()->with('sucess','avatar updated');
			}
    public function export() 
            {
                return Excel::download(new UsersExport, 'users.xlsx');
            }
        }