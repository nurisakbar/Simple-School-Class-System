
<style>
    table, td, th {
      border: 1px solid black;
      padding:3px;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    </style>
<p style="text-align: center">RAPOR DAN PROFIL PESERTA DIDIK</p>
<table>
    <tr>
        <td>Nama Siswa</td>
        <td>:</td>
        <td>{{$student->name}}</td>
        <td>Kelas</td>
        <td>:</td>
        <td>II (Dua)</td>
    </tr>
    <tr>
        <td>NIS</td>
        <td>:</td>
        <td>{{$student->student_id}}</td>
        <td>Semester</td>
        <td>:</td>
        <td>Ganjil</td>
    </tr>
    <tr>
        <td>Nama Sekolah</td>
        <td>:</td>
        <td>SD ISLAM TERPADU PERSIS</td>
        <td>Tahun Pelajaran</td>
        <td>:</td>
        <td>2020/2021</td>
    </tr>
    <tr>
        <td>Alamat Sekolah</td>
        <td>:</td>
        <td>Jln. Ciganitri No. 2 Desa Cipagalo, Kec
            Bojongsoang, Kab Bandung</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

<p>A. Kompetensi Sikap</p>
<table>
    <tr>
        <td colspan="3">Deskripsi</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Sikap Spiritual</td>
        <td>{{$examResult->spiritual_attitude}}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Sikap Sosial</td>
        <td>{{$examResult->social_attitude}}</td>
    </tr>
</table>
<p>B. Kompetensi Pengetahuan dan Keterampilan</p>
<table>
    <tr>
        <td rowspan="2" width="15">No</td>
        <td rowspan="2" width="200">Muatan Pelajaran</td>
        <td colspan="3">Pengetahuan</td>
        <td colspan="3">Keterampilan</td>
    </tr>
    <tr>
        <td>Nilai</td>
        <td>Predikat</td>
        <td>Deskripsi</td>
        <td>Nilai</td>
        <td>Predikat</td>
        <td>Deskripsi</td>
    </tr>
    @foreach($testScores as $test)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{$test->schedule->course->name}}</td>
        <td>{{$test->knowledge_value}}</td>
        <td>{{$test->knowledge_predicate}}</td>
        <td>{{$test->knowledge_description}}</td>
        <td>{{$test->skill_value}}</td>
        <td>{{$test->skill_predicate}}</td>
        <td>{{$test->skill_description}}</td>
    </tr>
    @endforeach
</table>

<p>C. Ekstra Kurikuler</p>
<table class="table table-bordered">
    <tr>
        <td>No</td>
        <td>Kegiatan Ekstra Kurikuler</td>
        <td>Keterangan</td>
    </tr>
    @foreach($extraCuriculer as $extra)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{$extra}}</td>
        <td>{{$examResult->extra_curiculer[$loop->iteration-1]}}</td>
    </tr>
    @endforeach
</table>



<p>D. Saran - saran</p>
<table>
    <tr>
        <td><p>{{$examResult->suggestion}}</p></td>
    </tr>
</table>
<p>E. Tinggi dan Berat Badan</p>
<table>
    <tr>
        <td width="15">No</td>
        <td>Aspek yang dinilai</td>
        <td>Semester {{ $_GET['semester']}}</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Tinggi Badan</td>
        <td>{{$examResult->height}}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Berat Badan</td>
        <td>{{$examResult->weight}}</td>
    </tr>
</table>
<p>F. Ketidakhadiran</p>
<table>
    <tr>
        <td>1</td>
        <td>Sakit</td>
        <td>{{countAttedance($student->id, 'SAKIT')}}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Izin</td>
        <td>{{countAttedance($student->id, 'IZIN')}}</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Tanpa Keterangan</td>
        <td>{{countAttedance($student->id, 'ALPA')}}</td>
    </tr>
</table>
<div style="margin-top:40px;"></div>

<div style="width:40%">
    Mengetahui<br>
Orang Tua/ Wali
<br><br><br><br><br><br><br><br>
.............................
</div>
<div style="width:40%;float:right;margin-top:-300px">
Bandung, {{date('d  M Y')}}<br>
Guru Kelas
<br><br><br><br><br><br><br><br>
{{$student->class->teacher->name}}
</div>