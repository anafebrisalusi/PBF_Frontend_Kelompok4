<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin - Sistem Sidang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      overflow-x: hidden;
      background-color: #e9f0ff; /* Background biru muda */
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .sidebar {
      height: 100vh;
      background-color:rgb(27, 47, 112); /* Biru gelap */
      color: white;
      display: flex;
      flex-direction: column;
      padding-top: 1rem;
      position: sticky;
      top: 0;
      box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    }

    .sidebar h5 {
      font-weight: 700;
      margin-bottom: 1.5rem;
      color: #bfdbfe; /* Biru terang */
      user-select: none;
    }

    .sidebar a {
      color: #dbeafe; /* Biru sangat terang */
      display: block;
      padding: 12px 24px;
      text-decoration: none;
      font-weight: 500;
      transition: background-color 0.3s ease, color 0.3s ease;
      border-radius: 0 25px 25px 0;
      margin: 0 0.5rem 0.5rem 0;
      user-select: none;
    }

    .sidebar a:hover, .sidebar a.active {
      background-color: #3b82f6; /* Biru sedang */
      color: white;
      text-decoration: none;
      box-shadow: 0 0 8px #3b82f6;
    }

    .sidebar a.text-danger {
      margin-top: auto;
      font-weight: 600;
      border-radius: 0 25px 25px 0;
    }

    .sidebar a.text-danger:hover {
      background-color: #dc2626; /* merah */
      color: white;
      box-shadow: 0 0 8px #dc2626;
    }

    .content-area {
      padding: 2rem;
      max-height: 100vh;
      overflow-y: auto;

    }

    .table thead th {
    background-color: #b0d4f1;
    color: #1b2f70;

    text-align: center;
    }
  </style>
</head>
<body>
  <div class="row g-0">
    <nav class="col-md-2 sidebar">
      <h5 class="text-center">🛡️ Admin Panel</h5>
      <a href="/admin/dashboard"><i class="bi bi-house-door me-2"></i> Dashboard</a>
      <a href="/admin/mahasiswa"><i class="bi bi-people me-2"></i> Mahasiswa</a>
      <a href="/admin/dosen"><i class="bi bi-person-badge me-2"></i> Dosen</a>
      <a href="/admin/sidang"><i class="bi bi-calendar-event me-2"></i> Jadwal Sidang</a>
      <a href="/admin/hasil-sidang"><i class="bi bi-clipboard-check me-2"></i> Laporan Hasil Sidang</a>
      <a href="/admin/notifikasi"><i class="bi bi-bell me-2"></i> Notifikasi</a>
      <a href="/logout" class="text-danger"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
    </nav>

    <main class="col-md-10 content-area">
      @yield('content')
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
