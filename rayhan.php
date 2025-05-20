<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fungsi untuk menyimpan data ke dalam file JSON
function saveData($data) {
    file_put_contents('books.json', json_encode($data, JSON_PRETTY_PRINT));
}

// Fungsi untuk memuat data dari file JSON
function loadData() {
    if (file_exists('books.json')) {
        $jsonContent = file_get_contents('books.json');
        return json_decode($jsonContent, true) ?: [];
    }
    return [];
}

// Inisialisasi data jika file tidak ada
$books = loadData();

// Pesan notifikasi
$notification = '';

// Handle actions (CRUD operations)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create Operation
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        $id = uniqid();
        $title = htmlspecialchars($_POST['title']);
        $author = htmlspecialchars($_POST['author']);
        $year = (int)$_POST['year'];
        $publisher = htmlspecialchars($_POST['publisher']);
        
        $books[$id] = [
            'id' => $id,
            'title' => $title,
            'author' => $author,
            'year' => $year,
            'publisher' => $publisher
        ];
        
        saveData($books);
        $notification = "Buku berhasil ditambahkan!";
    }
    
    // Update Operation
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $id = $_POST['id'];
        $title = htmlspecialchars($_POST['title']);
        $author = htmlspecialchars($_POST['author']);
        $year = (int)$_POST['year'];
        $publisher = htmlspecialchars($_POST['publisher']);
        
        if (isset($books[$id])) {
            $books[$id] = [
                'id' => $id,
                'title' => $title,
                'author' => $author,
                'year' => $year,
                'publisher' => $publisher
            ];
            
            saveData($books);
            $notification = "Buku berhasil diperbarui!";
        }
    }
    
    // Delete Operation
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $id = $_POST['id'];
        
        if (isset($books[$id])) {
            unset($books[$id]);
            saveData($books);
            $notification = "Buku berhasil dihapus!";
        }
    }
    
    // Redirect to prevent form resubmission
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Edit mode (Read specific book for update)
$editMode = false;
$editBook = null;

if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($books[$id])) {
        $editMode = true;
        $editBook = $books[$id];
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Rayhan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #4a4a4a;
        }
        .form-container {
            margin-bottom: 30px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        .edit-btn {
            background-color: #2196F3;
        }
        .edit-btn:hover {
            background-color: #0b7dda;
        }
        .delete-btn {
            background-color: #f44336;
        }
        .delete-btn:hover {
            background-color: #d32f2f;
        }
        .notification {
            padding: 10px;
            margin-bottom: 20px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 4px;
            display: <?php echo !empty($notification) ? 'block' : 'none'; ?>;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $editMode ? 'Edit Buku' : 'Manajemen Buku Perpustakaan'; ?></h1>
        
        <!-- Notification -->
        <div class="notification" id="notification">
            <?php echo $notification; ?>
        </div>
        
        <!-- Form for Create and Update -->
        <div class="form-container">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="action" value="<?php echo $editMode ? 'update' : 'create'; ?>">
                <?php if ($editMode): ?>
                    <input type="hidden" name="id" value="<?php echo $editBook['id']; ?>">
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="title">Judul Buku:</label>
                    <input type="text" id="title" name="title" required 
                           value="<?php echo $editMode ? $editBook['title'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="author">Pengarang:</label>
                    <input type="text" id="author" name="author" required 
                           value="<?php echo $editMode ? $editBook['author'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="year">Tahun Terbit:</label>
                    <input type="number" id="year" name="year" required 
                           value="<?php echo $editMode ? $editBook['year'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="publisher">Penerbit:</label>
                    <input type="text" id="publisher" name="publisher" required 
                           value="<?php echo $editMode ? $editBook['publisher'] : ''; ?>">
                </div>
                
                <button type="submit">
                    <?php echo $editMode ? 'Update Buku' : 'Tambah Buku'; ?>
                </button>
                
                <?php if ($editMode): ?>
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-left: 10px; text-decoration: none;">
                        <button type="button" style="background-color: #6c757d;">Batal</button>
                    </a>
                <?php endif; ?>
            </form>
        </div>
        
        <!-- Display Books (Read Operation) -->
        <h2>Daftar Buku</h2>
        <?php if (empty($books)): ?>
            <p>Belum ada buku yang ditambahkan.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Tahun</th>
                        <th>Penerbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $number = 1; ?>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td><?php echo $number++; ?></td>
                            <td><?php echo htmlspecialchars($book['title']); ?></td>
                            <td><?php echo htmlspecialchars($book['author']); ?></td>
                            <td><?php echo $book['year']; ?></td>
                            <td><?php echo htmlspecialchars($book['publisher']); ?></td>
                            <td class="action-buttons">
                                <a href="<?php echo $_SERVER['PHP_SELF'].'?action=edit&id='.$book['id']; ?>">
                                    <button type="button" class="edit-btn">Edit</button>
                                </a>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: inline;" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                                    <button type="submit" class="delete-btn">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    
    <script>
        // Otomatis sembunyikan notifikasi setelah 3 detik
        if (document.getElementById('notification').style.display !== 'none') {
            setTimeout(function() {
                document.getElementById('notification').style.display = 'none';
            }, 3000);
        }
    </script>
</body>
</html>