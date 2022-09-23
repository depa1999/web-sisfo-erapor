<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Akademik</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
</head>

<body>
    <?php
    require "fungsi.php";
    require "headguru.html";
    $nis = $_GET['kode'];
    $sql = "select * from siswa, guru, thn_ajar where nis='$nis'";
    $qry = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($qry);
    ?>
    <div class="utama">
        <h2 class="mb-3 text-center" style="margin-top: 2cm;">INPUT NILAI</h2>
        <div class="row">
            <div class="col-sm-9">
                <form enctype="multipart/form-data" method="post" action="updateRapot.php">
                    <div class="form-group">
                        <label for="nis">NIS:</label>
                        <input class="form-control" type="text" name="nis" id="nis" value="<?php echo $row['nis'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input class="form-control" type="text" name="nama_siswa" id="nama_siswa" value="<?php echo $row['nama_siswa'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <input class="form-control" type="text" name="kelas" id="kelas" value="<?php echo $row['kelas'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nip">Wali Kelas:</label>
                        <select class="form-control" name="nip" id="nip" readonly>
                            <?php
                            $sql = "select nip, nama_guru from guru where jabatan='Wali Kelas 2' order by nama_guru";
                            $qry = mysqli_query($koneksi, $sql);
                            while ($hsl = mysqli_fetch_row($qry)) {
                                echo "<option value='" . $hsl[0] . "'>" . $hsl[1];
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="thn_ajar">Tahun Ajaran:</label>
                        <select class="form-control" name="thn_ajar" id="thn_ajar" readonly>
                            <?php
                            $sql = "select * from thn_ajar";
                            $qry = mysqli_query($koneksi, $sql);
                            while ($hsl = mysqli_fetch_row($qry)) {
                                echo "<option value='" . $hsl[0] . "'>" . $hsl[1];
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester:</label>
                        <select class="form-control" name="semester" id="semester" require>
					        <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>	
				        </select>
                    </div>
                    <div class="form-group">
                        <label for="n_bindo">Nilai B.Indonesia:</label>
                        <input class="form-control" type="number" name="n_bindo" id="n_bindo" require>
                    </div>
                    <div class="form-group">
                        <label for="n_agama">Nilai Agama:</label>
                        <input class="form-control" type="number" name="n_agama" id="n_agama" require>
                    </div>
                    <div class="form-group">
                        <label for="n_pkn">Nilai PKN:</label>
                        <input class="form-control" type="number" name="n_pkn" id="n_pkn" require>
                    </div>
                    <div class="form-group">
                        <label for="n_mtk">Nilai Matematika:</label>
                        <input class="form-control" type="number" name="n_mtk" id="n_mtk" require>
                    </div>
                    <div class="form-group">
                        <label for="n_pjok">Nilai PJOK:</label>
                        <input class="form-control" type="number" name="n_pjok" id="n_pjok" require>
                    </div>
                    <div class="form-group">
                        <label for="n_sbdp">Nilai SBDP:</label>
                        <input class="form-control" type="number" name="n_sbdp" id="n_sbdp" require>
                    </div>
                    <div class="form-group">
                        <label for="n_bjawa">Nilai B.Jawa:</label>
                        <input class="form-control" type="number" name="n_bjawa" id="n_bjawa" require>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit" id="submit">Simpan</button>
                    </div>
                    <input type="hidden" name="jml_nilai" id="jml_nilai">
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#submit').on('click', function() {
            var nis = $('#nis').val();
            var nip = $('#nip').val();
            var thn_ajar = $('#thn_ajar').val();
            var semester = $('#semester').val();
            var n_bindo = $('#n_bindo').val();
            var n_agama = $('#n_agama').val();
            var n_pkn = $('#n_pkn').val();
            var n_mtk = $('#n_mtk').val();
            var n_pjok = $('#n_pjok').val();
            var n_sbdp = $('#n_sbdp').val();
            var n_bjawa = $('#n_bjawa').val();
            var jml_nilai = $('#jml_nilai').val();
            $.ajax({
                method: "POST",
                url: "sv_addRapot.php",
                data: {
                    nis: nis,
                    nip: nip,
                    thn_ajar:thn_ajar,
                    semester: semester,
                    n_bindo: n_bindo,
                    n_agama: n_agama,
                    n_pkn: n_pkn,
                    n_mtk: n_mtk,
                    n_pjok: n_pjok,
                    n_sbdp: n_sbdp,
                    n_bjawa: n_bjawa,
                    jml_nilai: jml_nilai
                }
            });
        });
    </script>
</body>

</html>