<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClaimController extends Controller
{
    /**
     * Show the product claim form.
     */
    public function showForm()
    {
        return view('claim');
    }

    /**
     * Handle the product claim form submission.
     */
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'serial_number' => 'required|alpha_num|min:5|max:20',
            'email' => 'required|email',
            'defect_description' => 'required|string|min:10',
            'urgency' => 'required|in:low,medium,high',
        ], [
            'serial_number.required' => 'กรุณากรอกรหัสสินค้า (Serial Number)',
            'serial_number.alpha_num' => 'รหัสสินค้าต้องประกอบด้วยตัวอักษรภาษาอังกฤษหรือตัวเลขเท่านั้น',
            'serial_number.min' => 'รหัสสินค้าต้องมีความยาวอย่างน้อย 5 ตัวอักษร',
            'serial_number.max' => 'รหัสสินค้าต้องมีความยาวไม่เกิน 20 ตัวอักษร',
            'email.required' => 'กรุณากรอกอีเมลผู้ติดต่อ',
            'email.email' => 'กรุณากรอกรูปแบบอีเมลที่ถูกต้อง (เช่น user@example.com)',
            'defect_description.required' => 'กรุณากรอกอาการชำรุดของสินค้า',
            'defect_description.min' => 'กรุณากรอกอาการชำรุดอย่างน้อย 10 ตัวอักษร',
            'urgency.required' => 'กรุณาเลือกระดับความเร่งด่วน',
            'urgency.in' => 'กรุณาเลือกระดับความเร่งด่วนที่ถูกต้อง (ต่ำ, ปานกลาง, สูง)',
        ]);

        // In a real application, we would save to database here.
        // For this task, we will redirect back with a success message and the submitted data.
        return redirect()->route('claim.form')
            ->with('success', 'ส่งข้อมูลแจ้งเคลมสินค้าชำรุดเรียบร้อยแล้ว!')
            ->with('claim_data', $validatedData);
    }
}
