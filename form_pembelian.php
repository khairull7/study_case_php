<!DOCTYPE html>
<html>
<head>
    <title>Form Pembelian Bahan Bakar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            background-color: #f4f4f4;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            display: inline-block;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
        background-color: maroon; 
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }   

        input[type="submit"]:hover {
        background-color: darkred; 
        }


        .output-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            margin-top: 20px;
            display: <?php echo $showForm ? 'none' : 'block'; ?>;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $showForm = true;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $jumlahLiter = $_POST['jumlahLiter'];
            $tipeBahanBakar = $_POST['tipeBahanBakar'];

            // Harga bahan bakar
            $hargaShellSuper = 15420.00;
            $hargaShellVPower = 16130.00;
            $hargaShellVPowerDiesel = 18310.00;
            $hargaShellVPowerNitro = 16510.00;

            // Hitung total harga
            $totalHarga = 0;

            switch ($tipeBahanBakar) {
                case 'Shell Super':
                    $totalHarga = $hargaShellSuper * $jumlahLiter;
                    break;
                case 'Shell V-Power':
                    $totalHarga = $hargaShellVPower * $jumlahLiter;
                    break;
                case 'Shell V-Power Diesel':
                    $totalHarga = $hargaShellVPowerDiesel * $jumlahLiter;
                    break;
                case 'Shell V-Power Nitro':
                    $totalHarga = $hargaShellVPowerNitro * $jumlahLiter;
                    break;
                default:
                    echo "Tipe bahan bakar tidak valid";
                    exit;
            }

            // Hitung PPN
            $ppn = 10;
            $ppnAmount = ($ppn / 100) * $totalHarga;
            $showForm = false;
        }

        if ($showForm) {
        ?>
        <h1>Form Pembelian Bahan Bakar</h1>
        <form action="" method="POST">
            <label for="jumlahLiter">Masukkan Jumlah Liter:</label>
            <input type="text" name="jumlahLiter" id="jumlahLiter" required>
            <br><br>
            <label for="tipeBahanBakar">Pilih Tipe Bahan Bakar:</label>
            <select name="tipeBahanBakar" id="tipeBahanBakar" required>
                <option value="Shell Super">Shell Super</option>
                <option value="Shell V-Power">Shell V-Power</option>
                <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
            </select>
            <br><br>
            <input type="submit" value="Beli">
        </form>
        <?php
        } else {
        ?>
        <div class="output-container">
            <h1>Hasil Pembelian Bahan Bakar</h1>
            <p>-------------------------------------------------</p>
            <p>Anda membeli bahan bakar minyak tipe <?php echo $tipeBahanBakar; ?></p>
            <p>Dengan jumlah: <?php echo $jumlahLiter; ?> Liter</p>
            <p>Total yang harus anda bayar Rp. <?php echo number_format($totalHarga + $ppnAmount, 2); ?></p>
            <p>-------------------------------------------------</p>
        </div>
        <h1>Form Pembelian Bahan Bakar</h1>
        <form action="" method="POST">
            <label for="jumlahLiter">Masukkan Jumlah Liter:</label>
            <input type="text" name="jumlahLiter" id="jumlahLiter" required>
            <br><br>
            <label for="tipeBahanBakar">Pilih Tipe Bahan Bakar:</label>
            <select name="tipeBahanBakar" id="tipeBahanBakar" required>
                <option value="Shell Super">Shell Super</option>
                <option value="Shell V-Power">Shell V-Power</option>
                <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
            </select>
            <br><br>
            <input type="submit" value="Beli">
        </form>
        <?php
        }
        ?>
    </div>
</body>
</html>
