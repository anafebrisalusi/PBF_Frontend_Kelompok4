<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - Sistem Sidang TA</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  
  <style>
    body {
      background: #f8f9fa;
    }
    .card {
      border-radius: 1rem;
    }
    .form-control:focus {
      box-shadow: 0 0 5px #0d6efd;
      border-color: #0d6efd;
    }
    .input-group-text {
      background-color: #0d6efd;
      color: white;
      border: none;
      border-radius: 0.375rem 0 0 0.375rem;
    }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
  <div class="card p-4 shadow" style="width: 24rem;">
    <h3 class="text-center mb-4 fw-bold text-primary">Sistem Sidang TA</h3>

    {{-- Tampilkan error jika ada --}}
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="/login">
      @csrf
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
          <input type="text" id="username" name="username" class="form-control" required autofocus placeholder="Masukkan username" />
        </div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          <input type="password" id="password" name="password" class="form-control" required placeholder="Masukkan password" />
        </div>
      </div>

      <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Login</button>

      <div class="mt-4 text-center">
        <small>Belum punya akun? <a href="/register" class="text-primary fw-semibold">Daftar</a></small>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
