<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelompok 2 - PHP Files</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            margin: 0;
        }
        
        .container {
            max-width: 800px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease;
        }
        
        .header {
            background: linear-gradient(135deg, #3a86ff, #8338ec);
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        
        .content {
            padding: 30px;
        }
        
        .file-links {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .file-card {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .file-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            background: linear-gradient(to bottom right, #ffffff, #f0f4ff);
        }
        
        .file-icon {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3a86ff, #8338ec);
            color: #ffffff;
            font-size: 24px;
            margin-bottom: 15px;
        }
        
        .file-name {
            color: #343a40;
            font-weight: 600;
            font-size: 16px;
            margin-top: 10px;
        }
        
        a {
            text-decoration: none;
            color: inherit;
            display: block;
            width: 100%;
            height: 100%;
        }
        
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            color: #343a40;
            font-size: 14px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 600px) {
            .file-links {
                grid-template-columns: 1fr 1fr;
            }
        }
        
        @media (max-width: 400px) {
            .file-links {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php
    // Define array of group members
    $anggota_kelompok = [
        "Eka Yulianita Widyanti",
        "Ja'far Malik Ibrahim",
        "Puput Galuh Candra Dewi",
        "Rayhan Pradana Putra Nugraha",
        "Rizqy Eka Ramadhan"
    ];
    
    // Icons for each member
    $icons = [
        "fas fa-user-graduate",
        "fas fa-user-tie",
        "fas fa-user-nurse",
        "fas fa-user-astronaut",
        "fas fa-user-ninja"
    ];
    
    // Get the current date and time
    $tanggal = date("d F Y");
    $waktu = date("H:i:s");
    ?>

    <div class="container">
        <div class="header">
            <h1>Kelompok 2</h1>
            <p>File PHP Links</p>
            <div class="date-time">
                <div><i class="far fa-calendar-alt"></i> <?php echo $tanggal; ?></div>
                <div><i class="far fa-clock"></i> <?php echo $waktu; ?></div>
            </div>
        </div>
        
        <div class="content">
            <h2 style="text-align: center; margin-bottom: 30px;">PHP Files</h2>
            
            <div class="file-links">
                <a href="eka.php">
                    <div class="file-card">
                        <div class="file-icon">
                            <i class="fas fa-user-nurse"></i>
                        </div>
                        <div class="file-name">Eka Yulianita Widyanti</div>
                    </div>
                </a>
                
                <a href="index.php">
                    <div class="file-card">
                        <div class="file-icon">
                            <i class="fab fa-php"></i>
                        </div>
                        <div class="file-name">Index</div>
                    </div>
                </a>
                
                <a href="jafar.php">
                    <div class="file-card">
                        <div class="file-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="file-name">Ja'far Malik Ibrahim</div>
                    </div>
                </a>
                
                <a href="puput.php">
                    <div class="file-card">
                        <div class="file-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="file-name">Puput Galuh Candra Dewi</div>
                    </div>
                </a>
                
                <a href="rayhan.php">
                    <div class="file-card">
                        <div class="file-icon">
                            <i class="fas fa-user-astronaut"></i>
                        </div>
                        <div class="file-name">Rayhan Pradana Putra Nugraha</div>
                    </div>
                </a>
                
                <a href="risqy.php">
                    <div class="file-card">
                        <div class="file-icon">
                            <i class="fas fa-user-ninja"></i>
                        </div>
                        <div class="file-name">Rizqy Eka Ramadhan</div>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="footer">
            &copy; 2025 Kelompok 2
        </div>
    </div>
    <script>
        function memberClick(name) {
            alert(`Anda memilih: ${name}`);
        }
        
        // Update time every second
        setInterval(function() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            
            document.querySelector('.date-time div:last-child').innerHTML = 
                `<i class="far fa-clock"></i> ${hours}:${minutes}:${seconds}`;
        }, 1000);
    </script>
</body>
</html>