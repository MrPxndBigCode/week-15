@extends('layout')

@section('title', 'แจ้งเคลมสินค้าชำรุด - Product Claim Form')

@section('content')
    <!-- Import Google Font for Premium Aesthetics -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Global Styles for the Claim Page */
        .claim-container {
            font-family: 'Sarabun', sans-serif;
            max-width: 700px;
            margin: 2rem auto;
        }

        .claim-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.06), 0 5px 15px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(226, 232, 240, 0.8);
            padding: 2.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .claim-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08), 0 8px 20px rgba(0, 0, 0, 0.04);
        }

        .form-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-header h2 {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #1e293b 0%, #475569 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-header p {
            color: #64748b;
            font-size: 0.95rem;
        }

        /* Form Label Styling */
        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .required-star {
            color: #ef4444;
        }

        /* Modern Text Inputs */
        .form-control-custom {
            border-radius: 12px;
            border: 1.5px solid #cbd5e1;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            color: #1e293b;
            background-color: #f8fafc;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-control-custom:focus {
            background-color: #ffffff;
            border-color: #4f46e5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.12);
            outline: none;
        }

        .form-control-custom::placeholder {
            color: #94a3b8;
        }

        /* Inline Validation Error Styling */
        .error-feedback {
            color: #dc2626;
            font-size: 0.85rem;
            font-weight: 500;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            animation: slideDown 0.2s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom Radio Cards for Urgency Level */
        .urgency-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-top: 0.5rem;
        }

        @media (max-width: 576px) {
            .urgency-grid {
                grid-template-columns: 1fr;
            }
        }

        .urgency-card {
            cursor: pointer;
            position: relative;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            padding: 1rem;
            text-align: center;
            transition: all 0.25s ease;
            background: #f8fafc;
        }

        .urgency-card:hover {
            border-color: #cbd5e1;
            background: #f1f5f9;
        }

        /* Hide standard radio inputs */
        .urgency-input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* Selection styling based on level */
        /* Low (ต่ำ) */
        .urgency-input[value="low"]:checked+.urgency-card {
            border-color: #10b981;
            background: #ecfdf5;
            color: #065f46;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15);
        }

        /* Medium (ปานกลาง) */
        .urgency-input[value="medium"]:checked+.urgency-card {
            border-color: #f59e0b;
            background: #fffbeb;
            color: #92400e;
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.15);
        }

        /* High (สูง) */
        .urgency-input[value="high"]:checked+.urgency-card {
            border-color: #ef4444;
            background: #fef2f2;
            color: #991b1b;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.15);
        }

        .urgency-badge {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 6px;
        }

        .bg-low {
            background-color: #10b981;
        }

        .bg-medium {
            background-color: #f59e0b;
        }

        .bg-high {
            background-color: #ef4444;
        }

        /* Submit Button styling */
        .btn-submit {
            background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%);
            border: none;
            color: #ffffff;
            font-weight: 600;
            padding: 0.9rem 2rem;
            border-radius: 12px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
            width: 100%;
            margin-top: 1.5rem;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #4338ca 0%, #2e268f 100%);
            box-shadow: 0 6px 16px rgba(79, 70, 229, 0.3);
            transform: translateY(-1px);
        }

        .btn-submit:active {
            transform: translateY(1px);
            box-shadow: 0 2px 8px rgba(79, 70, 229, 0.2);
        }

        /* Success Result Styling */
        .success-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #bbf7d0;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.05);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .success-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #065f46;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .success-details {
            background-color: #f8fafc;
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid #e2e8f0;
        }

        .detail-item {
            display: flex;
            border-bottom: 1px dashed #e2e8f0;
            padding: 0.75rem 0;
        }

        .detail-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .detail-label {
            font-weight: 600;
            color: #64748b;
            width: 150px;
            flex-shrink: 0;
        }

        .detail-value {
            color: #1e293b;
            word-break: break-word;
        }
    </style>

    <div class="claim-container">

        <!-- Success Message Display -->
        @if (session('success'))
            <div class="success-card">
                <h4 class="success-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('success') }}
                </h4>

                @if (session('claim_data'))
                    <div class="success-details">
                        <h5 class="mb-3 font-semibold text-slate-700">ข้อมูลที่ได้รับการบันทึก:</h5>
                        <div class="detail-item">
                            <div class="detail-label">รหัสสินค้า</div>
                            <div class="detail-value font-monospace">{{ session('claim_data')['serial_number'] }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">อีเมลผู้ติดต่อ</div>
                            <div class="detail-value">{{ session('claim_data')['email'] }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">ระดับความเร่งด่วน</div>
                            <div class="detail-value">
                                @if (session('claim_data')['urgency'] == 'low')
                                    <span class="badge bg-success py-1.5 px-3 rounded-pill">ต่ำ (Low)</span>
                                @elseif (session('claim_data')['urgency'] == 'medium')
                                    <span class="badge bg-warning text-dark py-1.5 px-3 rounded-pill">ปานกลาง
                                        (Medium)</span>
                                @elseif (session('claim_data')['urgency'] == 'high')
                                    <span class="badge bg-danger py-1.5 px-3 rounded-pill">สูง (High)</span>
                                @endif
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">อาการชำรุด</div>
                            <div class="detail-value" style="white-space: pre-line;">
                                {{ session('claim_data')['defect_description'] }}</div>
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <!-- Form Card -->
        <div class="claim-card">
            <div class="form-header">
                <h2>แจ้งเคลมสินค้าชำรุด</h2>
                <p>กรุณากรอกข้อมูลสินค้าและอาการชำรุด เพื่อขอรับบริการตรวจสอบและเคลมสินค้า</p>
            </div>

            <form method="POST" action="{{ route('claim.submit') }}">
                @csrf

                <!-- Serial Number -->
                <div class="mb-4">
                    <label for="serial_number" class="form-label">
                        <span>รหัสสินค้า (Serial Number)</span>
                        <span class="required-star">*</span>
                    </label>
                    <input type="text" id="serial_number" name="serial_number" value="{{ old('serial_number') }}"
                        class="form-control form-control-custom w-100 @error('serial_number') is-invalid @enderror"
                        placeholder="กรอกรหัสตัวอักษรและตัวเลข เช่น SN987654" autocomplete="off">
                    @error('serial_number')
                        <div class="error-feedback">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="form-label">
                        <span>อีเมลผู้ติดต่อ (Email Address)</span>
                        <span class="required-star">*</span>
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="form-control form-control-custom w-100 @error('email') is-invalid @enderror"
                        placeholder="example@domain.com">
                    @error('email')
                        <div class="error-feedback">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Urgency Level -->
                <div class="mb-4">
                    <label class="form-label">
                        <span>ระดับความเร่งด่วน (Urgency Level)</span>
                        <span class="required-star">*</span>
                    </label>

                    <div class="urgency-grid">
                        <div>
                            <input type="radio" id="urgency_low" name="urgency" value="low" class="urgency-input"
                                {{ old('urgency') == 'low' ? 'checked' : '' }}>
                            <label for="urgency_low" class="urgency-card d-block">
                                <span class="urgency-badge bg-low"></span>
                                ต่ำ (Low)
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="urgency_medium" name="urgency" value="medium" class="urgency-input"
                                {{ old('urgency') == 'medium' ? 'checked' : '' }}>
                            <label for="urgency_medium" class="urgency-card d-block">
                                <span class="urgency-badge bg-medium"></span>
                                ปานกลาง (Medium)
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="urgency_high" name="urgency" value="high" class="urgency-input"
                                {{ old('urgency') == 'high' ? 'checked' : '' }}>
                            <label for="urgency_high" class="urgency-card d-block">
                                <span class="urgency-badge bg-high"></span>
                                สูง (High)
                            </label>
                        </div>
                    </div>

                    @error('urgency')
                        <div class="error-feedback">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Defect Description -->
                <div class="mb-4">
                    <label for="defect_description" class="form-label">
                        <span>อาการชำรุด (Defect Symptoms)</span>
                        <span class="required-star">*</span>
                    </label>
                    <textarea id="defect_description" name="defect_description" rows="5"
                        class="form-control form-control-custom w-100 @error('defect_description') is-invalid @enderror"
                        placeholder="อธิบายอาการชำรุด ความเสียหาย หรือความผิดปกติที่เกิดขึ้นของสินค้า (เช่น เปิดเครื่องไม่ติด หน้าจอแตก ไฟไม่เข้า)">{{ old('defect_description') }}</textarea>
                    @error('defect_description')
                        <div class="error-feedback">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-submit">
                    ส่งข้อมูลแจ้งเคลมสินค้า
                </button>
            </form>
        </div>
    </div>
@endsection
