<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data Negara</title>
    <style>
        fieldset { margin-bottom: 20px; }
        .box { margin-bottom: 10px; padding: 10px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h2>Form Input Data Negara, Provinsi, dan Kota</h2>
    <form action="send.php" method="post">
        <fieldset>
            <legend>Data Negara</legend>
            <label>Nama Negara:</label><br>
            <input type="text" name="name_negara" required><br><br>

            <label>Nama Presiden:</label><br>
            <input type="text" name="name_presiden" required><br><br>
        </fieldset>

        <div id="provinsi-container">
            <h3>Provinsi dan Kota</h3>
            <!-- Di sini elemen dinamis akan ditambahkan -->
        </div>

        <button type="button" onclick="tambahProvinsi()">+ Tambah Provinsi dan Kota</button>
        <br><br>

        <input type="submit" value="Kirim Semua Data">
    </form>

    <script>
        let count = 0;

        function tambahProvinsi() {
            count++;
            const container = document.getElementById("provinsi-container");

            const box = document.createElement("div");
            box.className = "box";

            box.innerHTML = `
                <fieldset>
                    <legend>Provinsi dan Kota ke-${count}</legend>

                    <label>Nama Provinsi:</label><br>
                    <input type="text" name="name_provinsi[]" required><br><br>

                    <label>Nama Gubernur:</label><br>
                    <input type="text" name="name_gubernur[]" required><br><br>

                    <label>Nama Kota:</label><br>
                    <input type="text" name="name_kota[]" required><br><br>

                    <label>Nama Bupati:</label><br>
                    <input type="text" name="name_bupati[]" required><br><br>
                </fieldset>
            `;

            container.appendChild(box);
        }
    </script>
</body>
</html>
