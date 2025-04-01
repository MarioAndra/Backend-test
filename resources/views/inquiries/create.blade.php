
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تقديم استفسار</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f5f9;
        }

        .card-header {
            background: #2b5876;
            background: linear-gradient(to right, #4e4376, #2b5876);
        }

        .btn-primary {
            background: #ff6b6b;
            border: none;
        }

        .btn-primary:hover {
            background: #ff5252;
        }

        .form-control:focus {
            border-color: #4e4376;
            box-shadow: 0 0 0 0.2rem rgba(78, 67, 118, 0.25);
        }

        .invalid-feedback {
            color: #dc3545;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header text-white">
                        <h1 class="h4 mb-0"> تقديم استفسار</h1>
                    </div>

                    <div class="card-body bg-light">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="POST" action="{{ route('inquiries.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">الاسم الكامل</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">رقم الهاتف</label>
                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">الرسالة</label>
                                <textarea name="message" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">الشركة</label>
                                <select name="company_id" class="form-select" required>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    إرسال الاستفسار
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
