<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - Sistem Sidang TA</title>
  
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
    a.text-primary:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
  <div class="card p-4 shadow" style="width: 24rem;">
    <h3 class="text-center mb-4 fw-bold text-primary">Register Akun</h3>

    {{-- Error handling --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="/register">
      @csrf

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
          <input type="text" id="username" name="username" class="form-control" required placeholder="Masukkan username" />
        </div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
          <input type="email" id="email" name="email" class="form-control" required placeholder="Masukkan email" />
        </div>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          <input type="password" id="password" name="password" class="form-control" required placeholder="Masukkan password" />
        </div>
      </div>

      <div class="mb-4">
        <label for="role" class="form-label">Role</label>
        <select id="role" name="role" class="form-select" required>
          <option value="" selected>-- Pilih Role --</option>
          <option value="admin">Admin</option>
          <option value="mahasiswa">Mahasiswa</option>
          <option value="dosen">Dosen</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Daftar</button>

      <div class="mt-4 text-center">
        <small>Sudah punya akun? <a href="/" class="text-primary fw-semibold">Login</a></small>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
