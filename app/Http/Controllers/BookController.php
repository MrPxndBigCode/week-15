<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    private $books = [
        [
            'id' => 1,
            'title' => 'Laravel เบื้องต้น',
            'author' => 'สมชาย',
            'price' => 350
        ],
        [
            'id' => 2,
            'title' => 'PHP Programming',
            'author' => 'สมหญิง',
            'price' => 420
        ]
    ];

    // แสดงรายการหนังสือ
    public function index()
    {
        $books = $this->books;
        return view('books.index', compact('books'));
    }

    // รับข้อมูลจากฟอร์ม
    public function store(Request $request)
    {
        return redirect('/books')
            ->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }
}