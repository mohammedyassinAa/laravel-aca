<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
                $avatarName= time().".".$request->avatar->getClientOrinalExtension ;
                $request -> avatar -> move(public_path('avatar'),avatarName);
                Auth()->user()->update(['avatar' => $avatarName]);
                return back()->with('sucess','avatar updated');
			}
        }