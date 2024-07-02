<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $blogs = Blog::paginate(4);

        // $blogs = DB::table('blogs')->paginate(4);
        return view('blog', compact('blogs'));
    }



    public function create()
    {
        return view('form');
    }

    public function insert(Request $request)
    {
        //เป็นการตรวจาอบว่าค่าที่ส่งมาตรงตามเงื่อนไขืี่กำหนดไหม
        $request->validate(
            [
                'title' => 'required|max:50', //กำหนดตัวอักษรห้ามเกิน 50 ตัวอักษร
                'content' => 'required' // กำหนดให้กรอกข้อมูลห้ามค่าว่าง
            ],

            [
                //วิธีการปรับปรุงการตรวจสอบของ $request->validate() ของเรา
                'title.required' => 'กรุณาป้อนชื่อ',
                'title.max' => 'ชื่อบทความไม่ควรเกิน 50 ตัวอักษร',
                'content.required' => 'กรุณากรอกเนื้อหา'
            ]


        );


        $data = [
            'title' => $request->title,
            'content' => $request->content

        ];
        Blog::insert($data);
        // DB::table('blogs')->insert($data);
        return redirect('/author/blog');
    }

    public function delete($id)
    {
        Blog::find($id)->delete();
        // DB::table('blogs')->where('id', $id)->delete();
        // return redirect('/blog');
        return redirect()->back();
    }

    public function change($id)
    {
        $blog = Blog::find($id);
        // $blog = DB::table('blogs')->where('id', $id)->first();
        $data = [
            'status' => !$blog->status
        ];
        $blog = Blog::find($id)->update($data);
        //$blog = DB::table('blogs')->where('id', $id)->update($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $blog = Blog::find($id);

        // $blog = DB::table('blogs')->where('id', $id)->first();
        return view('edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required|max:50',
                'content' => 'required'
            ],

            [

                'title.required' => 'กรุณาป้อนชื่อ',
                'title.max' => 'ชื่อบทความไม่ควรเกิน 50 ตัวอักษร',
                'content.required' => 'กรุณากรอกเนื้อหา'
            ]


        );
        $data = [
            'title' => $request->title,
            'content' => $request->content

        ];
        Blog::find($id)->update($data);
        // DB::table('blogs')->where('id', $id)->update($data);
        return redirect('/author/blog');
    }
}
