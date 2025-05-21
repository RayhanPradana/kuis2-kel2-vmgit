<?php
session_start();

// Inisialisasi data dummy
if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = [
        ['id' => 1, 'nama' => 'Agus', 'hp' => '08111122333', 'email' => 'agus@gmail.com'],
        ['id' => 2, 'nama' => 'Nanda Kumara', 'hp' => '081999444521', 'email' => 'kumara@gmail.com'],
        ['id' => 3, 'nama' => 'Mahindra', 'hp' => '081999999111', 'email' => 'mahindra@gmail.com']
    ];
}

// Hapus data
if (isset($_GET['delete'])) {
    $_SESSION['data'] = array_filter($_SESSION['data'], fn($d) => $d['id'] != $_GET['delete']);
    $_SESSION['data'] = array_values($_SESSION['data']);
    header("Location: jafar.php");
    exit;
}

// Simpan data (tambah/edit)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new = [
        'id' => $_POST['id'] ?: time(),
        'nama' => $_POST['nama'],
        'hp' => $_POST['hp'],
        'email' => $_POST['email']
    ];

    if ($_POST['id']) {
        foreach ($_SESSION['data'] as &$d) {
            if ($d['id'] == $_POST['id']) {
                $d = $new;
                break;
            }
        }
    } else {
        $_SESSION['data'][] = $new;
    }

    header("Location: jafar.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Pegawai Jafar Malik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h3 class="mb-4">Data Pegawai Jafar Malik</h3>

    <!-- Button Tambah -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah Data</button>

    <!-- Tabel -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Email</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['data'] as $i => $d): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= htmlspecialchars($d['nama']) ?></td>
                <td><?= htmlspecialchars($d['hp']) ?></td>
                <td><?= htmlspecialchars($d['email']) ?></td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick='editData(<?= json_encode($d) ?>)'>Edit</button>
                    <a href="?delete=<?= $d['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah/Edit -->
<div class="modal fade" id="modalTambah" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalTitle">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="form-id">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" id="form-nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No. Telepon</label>
            <input type="text" name="hp" id="form-hp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" id="form-email" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" type="submit">Simpan</button>
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function editData(data) {
    document.getElementById('form-id').value = data.id;
    document.getElementById('form-nama').value = data.nama;
    document.getElementById('form-hp').value = data.hp;
    document.getElementById('form-email').value = data.email;
    document.getElementById('modalTitle').textContent = "Edit Data";
    new bootstrap.Modal(document.getElementById('modalTambah')).show();
}
</script>
</body>
</html>
