<!DOCTYPE html>
<html>
<head>
    <title>Login Admin | Perpustakaan</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #1d3557, #457b9d);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 380px;
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="card login-card shadow-lg">
    <div class="card-body p-4">
        <h4 class="text-center mb-4">
            <i class="bi bi-book"></i> Login Admin
        </h4>

        <form method="post" action="proses_login.php">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="username" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>

            <button class="btn btn-primary w-100 mt-3">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </button>
        </form>

        <p class="text-center mt-3 text-muted">
            Sistem Informasi Perpustakaan
        </p>
    </div>
</div>

</body>
</html>
