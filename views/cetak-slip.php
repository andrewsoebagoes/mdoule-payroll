<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji</title>
    <style>
        /* Gaya umum untuk halaman */
        body {
            font-family: Arial, sans-serif;
        }

        /* Gaya untuk slip gaji */
        .slip-gaji {
            border: 1px solid #000;
            padding: 10px;
            margin: 20px;
            width: 40%;
        }

        /* Gaya untuk bagian-bagian slip gaji */
        .section {
            margin-bottom: 10px;
        }

        /* Gaya untuk halaman cetak */
        @media print {

            /* Atur margin nol untuk mencetak dengan benar */
            @page {
                margin: 0.5cm;
            }

            /* target the first page only */
           

            .slip-gaji {
                border: 1px solid black;
                width: 90%;
            }

            /* Atur ukuran slip gaji agar pas pada halaman cetak */

        }
    </style>
</head>

<body>

    <?php foreach ($data as $data) : ?>
        <div class="row col-md-12">
            <div class="col-md-6">

                <div class="slip-gaji">
                    <h2>Slip Gaji - <?= $data->period_name; ?></h2>
                    <div class="section">
                        <strong>Nama Karyawan:</strong> <?= $data->user_name; ?><br>
                    </div>

                    <div class="section">
                        <strong>Gaji Pokok:</strong> <?= $data->salary; ?><br>
                        <strong>Total Gaji:</strong> <?= $data->salary; ?>
                    </div>

                    <div class="section">
                        <strong>Catatan:</strong> <?= $data->note; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>


    <script>
        window.print();
    </script>
</body>

</html>