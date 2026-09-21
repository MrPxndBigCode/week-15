<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <!-- Header -->
        <div class="card shadow-lg border-0 mb-4">
            <div class="card-body text-center bg-primary text-white rounded">
                <h2><i class="bi bi-book-half"></i> ระบบจัดการร้านหนังสือ</h2>
                <p class="mb-0">Book Management System</p>
            </div>
        </div>

        <!-- Alert -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">

            <!-- Form -->
            <div class="col-md-4">

                <div class="card shadow border-0">

                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-plus-circle"></i>
                            เพิ่มข้อมูลหนังสือ
                        </h5>
                    </div>

                    <div class="card-body">

                        <form action="/books" method="POST">

                            @csrf

                            <div class="mb-3">
                                <label class="form-label">
                                    ชื่อหนังสือ
                                </label>

                                <input type="text" name="title" class="form-control" placeholder="กรอกชื่อหนังสือ">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    ผู้แต่ง
                                </label>

                                <input type="text" name="author" class="form-control" placeholder="กรอกชื่อผู้แต่ง">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    ราคา
                                </label>

                                <input type="number" name="price" class="form-control" placeholder="0">
                            </div>

                            <button class="btn btn-success w-100">
                                <i class="bi bi-save"></i>
                                บันทึกข้อมูล
                            </button>

                        </form>

                    </div>

                </div>

            </div>

            <!-- Table -->
            <div class="col-md-8">

                <div class="card shadow border-0">

                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-table"></i>
                            รายการหนังสือ
                        </h5>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-hover table-striped align-middle">

                            <thead class="table-primary text-center">
                                <tr>
                                    <th width="10%">ID</th>
                                    <th>ชื่อหนังสือ</th>
                                    <th>ผู้แต่ง</th>
                                    <th width="20%">ราคา</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($books as $book)
                                    <tr>
                                        <td class="text-center">
                                            {{ $book['id'] }}
                                        </td>

                                        <td>
                                            <i class="bi bi-book text-primary"></i>
                                            {{ $book['title'] }}
                                        </td>

                                        <td>{{ $book['author'] }}</td>

                                        <td class="text-end text-success fw-bold">
                                            {{ number_format($book['price']) }} บาท
                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            ยังไม่มีข้อมูลหนังสือ
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
