<!-- resources/views/invalid-phone.blade.php -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رقم هاتف غير صالح</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-danger">
                    <div class="card-header bg-danger text-white">
                        <h3 class="card-title mb-0 text-start">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            Error
                        </h3>
                    </div>


                    <div class="card-body text-center">
                        <div class="alert alert-danger mb-4">
                            <h4 class="alert-heading">Phone number is invalid</h4>
                            <p class="mb-0">Please check it and try again</p>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('inquiries.create') }}" class="btn btn-primary">
                                <i class="bi bi-arrow-left-circle"></i>
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
