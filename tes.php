<?php 

    session_start();
    include "koneksi.php";

    if(empty($_SESSION['id_bilik_sess'])){
        header("location:bilik_login.php");
    }else{?>

    <?php
        $sql = "SELECT * FROM paslon WHERE id_paslon != 1";
        $eksekusi = mysqli_query($konek, $sql);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <script>
        window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Persentase banyak suara yang didapatkan setaip calon"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: [

                    <?php 
                        $sql_kelas          = "select * from kelas";
                        $jalankan_sql_kelas = mysqli_query($konek,$sql_kelas);
                        while($array_kelas = mysqli_fetch_array($jalankan_sql_kelas))
                        {   
                            $id_kelas = $array_kelas['id_kelas'];
                            while($data = mysqli_fetch_array($eksekusi))
                            {
                                $id_paslon = $data['id_paslon']; 
                                $sql2          = "select * from perolehan where id_paslon = $id_paslon";
                                $jalankan_sql2 = mysqli_query($konek,$sql2);
                                $jumlah        = mysqli_num_rows($jalankan_sql2);

                                $sql3          = "select * from perolehan inner join dpt on dpt.id_dpt = perolehan.id_dpt WHERE dpt.id_kelas = '$id_paslon' ";
                                $jalankan_sql3 = mysqli_query($konek,$sql3);
                                $jumlah_data_all        = mysqli_num_rows($jalankan_sql3);

                                $presentase = $jumlah / $jumlah_data_all * 100;
                                ?>
                                {y: <?php echo $presentase;?>, label: "<?php echo $data['nm_paslon']; ?>"},
                                <?php }?>
                       <?php } ?>
                        
                    

                        
                ]
            }]
        });
        chart.render();

        }
    </script>
    </head>
    <body>
    <div id="chartContainer" style="height: 100%; width: 100%;"></div>

    <!-- Canvas -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </body>
    </html>
<?php } ?>