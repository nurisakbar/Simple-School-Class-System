<style>
    table, td, th {
      border: 1px solid black;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    </style>
<hr>
<div class="container">
    <div class="half" style="float: left;margin-right:20px;">
        <img width="50" src="https://2.bp.blogspot.com/-DOIsRcSUX5E/VxuPo9iYEyI/AAAAAAAAW_Q/x6_cRKiKG80gOIQ6-3rLFtTcaGyTiYXEwCLcB/s1600/Logo%2BOSIS%2BSD.png">
    </div>
    <div class="half" style="text-align: center">
        KARTU UJIAN MASUK SEKOLAH<br>
        SDN 2 Muhammadiyah<br>
        Kota Bandung
    </div>
</div>
<hr>

<div class="container">
    <div class="image"></div>
    <div class="biodata">
        <table>
            <tr>
                <td width="120">Nama</td>
                <td> : {{$pmb->name}}</td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td> : {{$pmb->birth_place}}, {{$pmb->birth_date}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{$pmb->gender=='m'?'Laki Laki':'Perempuan'}}</td>
            </tr>
        </table>
    </div>
</div>