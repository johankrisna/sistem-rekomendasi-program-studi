<?php

class countController extends Controller {
  public function countSAW($id) {

    // Get Data From Database
    $db_prodi   = $this->model('Prodi')->all();
    $db_jurusan = $this->model('Jurusan')->all();
    $db_minat   = $this->model('Minat')->all();
    $db_ekonomi = $this->model('Ekonomi')->all();
    $db_nilai   = $this->model('Nilai')->all();

    // Convert to Specific Format

    // Prodi
    foreach ($db_prodi as $value) {
      $prodi[] = $value->nama;
    }

    // Jurusan
    foreach ($db_jurusan as $value) {
      $newJurusan[] = array_values((array) $value);
    }
    foreach ($newJurusan as $value) {
      array_splice($value, 0, 2);
      $wJurusan[] = $value;
    }

    // Minat
    foreach ($db_minat as $value) {
      $newMinat[] = array_values((array) $value);
    }
    foreach ($newMinat as $value) {
      array_splice($value, 0, 2);
      $wMinat[] = $value;
    }

    // Ekonomi
    foreach ($db_ekonomi as $value) {
      $newEkonomi[] = array_values((array) $value);
    }
    foreach ($newEkonomi as $value) {
      array_splice($value, 0, 2);
      $wEkonomi[] = $value;
    }

    // Nilai
    foreach ($db_nilai as $value) {
      $newNilai[] = array_values((array) $value);
    }
    foreach ($newNilai as $value) {
      array_splice($value, 0, 2);
      $wNilai[] = $value;
    }

    // Get Data Siswa
    $siswa = $this->model('Siswa')->select()->where("id", $id)->execute();
    if (empty($siswa)) die("Data Siswa Tidak Ditemukan");

    $nama    = $siswa->nama;
    $jurusan = $siswa->jurusan;
    $minat   = $siswa->minat;
    $ekonomi = $siswa->ekonomi;

    // Convert Siswa Scores to Array
    $arraySiswa = (array) $siswa;
    array_splice($arraySiswa, 0, 5);
    foreach ($arraySiswa as $value) {
      $nilai[] = $value;
    }

    // ------ Input End --- Processing :

    $wTotal = [ 0.2, 0.3, 0.4, 0.1 ];

    // Normalisasi Nilai
    foreach ($nilai as $item) {
      $nilaiNormal[] = (max($nilai) != 0) ? $item / max($nilai) : 0;
    }

    // Hitung Nilai Mata Pelajaran Setiap Prodi
    foreach ($prodi as $i => $p) {
      $nilaiSAW = 0;
      foreach ($nilaiNormal as $j => $item) {
        $nilaiSAW += $item * $wNilai[$i][$j];
      }
      $nilaiProdi[] = $nilaiSAW;
    }

    // Hitung Point Total Setiap Prodi dan Berikan Alasan
    foreach ($prodi as $i => $p) {
      $jurusanProdi[] = $wJurusan[$i][$jurusan];
      $minatProdi[]   = $wMinat[$i][$minat];
      $ekonomiProdi[] = $wEkonomi[$i][$ekonomi];

      $countSAW = 0;
      $countSAW += $nilaiProdi[$i]   * $wTotal[0];
      $countSAW += $jurusanProdi[$i] * $wTotal[1];
      $countSAW += $minatProdi[$i]   * $wTotal[2];
      $countSAW += $ekonomiProdi[$i] * $wTotal[3];

      // Penjelasan Alasan Pemilihan
      $reason = "Dipilih berdasarkan kontribusi terbesar dari ";
      $criteria = [
        'nilai' => $nilaiProdi[$i],
        'jurusan' => $jurusanProdi[$i],
        'minat' => $minatProdi[$i],
        'ekonomi' => $ekonomiProdi[$i]
      ];

      $maxCriteria = array_keys($criteria, max($criteria));
      if (in_array('nilai', $maxCriteria)) {
        $reason .= "prestasi akademik.";
      } elseif (in_array('jurusan', $maxCriteria)) {
        $reason .= "kesesuaian dengan jurusan sebelumnya.";
      } elseif (in_array('minat', $maxCriteria)) {
        $reason .= "minat siswa.";
      } elseif (in_array('ekonomi', $maxCriteria)) {
        $reason .= "kondisi ekonomi yang mendukung.";
      }

      $totalProdi[$p] = [
        'score' => $countSAW,
        'reason' => $reason
      ];
    }

    arsort($totalProdi);

    return $this->view('result', [
      'datas' => $totalProdi,
      'siswa' => $siswa
    ]);
  }
}
