<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\blog;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function blogs()
    {
        $blogs= blog::paginate(5);
        return view('blogs',compact('blogs'));
    }
    
    function abouts()
    {
            $name = "Tanakorn";
            $date = "6 ก.ค. 2569";
            return view("abouts" ,compact('name','date'));
    }

    function form(){
        return view("form");
    }

    function create(){
        return view("form");
    }

    function insert(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'content' => 'required'
        ],[
            'title.required' => 'กรุณากรอกชื่อบทความ',
            'title.max' => 'ชื่อบทความไม่เกิน50ตัว',
            'content.required' => 'กรุณากรอกเนื้อหาบทความ'
        ]);
        $data=[
            'title'=> $request->title,
            'content'=> $request->content
        ];
        blog::insert($data);
        return redirect()->route('blogs');
    }

    function delete($id){
        blog::find($id)->delete(); 
        return redirect()->back();
    }
    function change($id){
        $blog = blog::find($id);
        $data=[
            'status' => $blog->status
        ];
        if($data['status']==1){
            $data['status']=0;
        }else{
            $data['status']=1;
        }
        
        blog::find($id)->update($data);
        return redirect()->back();
    }
    function edit($id)
    {
        $blog =blog::find($id);
        return view('edit', compact('blog'));
    }
    function update(Request $request,$id){

        $request->validate([
            'title' => 'required|max:50',
            'content' => 'required'
        ],[
            'title.required' => 'กรุณากรอกชื่อบทความ',
            'title.max' => 'ชื่อบทความไม่เกิน50ตัว',
            'content.required' => 'กรุณากรอกเนื้อหาบทความ'
        ]);

        $data=['title'=> $request->title,'content'=> $request->content];
        
        blog::find($id)->update($data);
        return redirect()->route('blogs');
    }

}
