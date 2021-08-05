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
        <img width="50" src="{{URL::to('/logo.jpeg')}}">
    </div>
    <div class="half" style="text-align: center">
        
        KARTU UJIAN MASUK SEKOLAH<br>
        SDIT PERSIS CIGANITRI <br>Jl. Ciganitri No.2, Cipagalo, Kec. Bojongsoang, Bandung<br>
    </div>
</div>
<hr>

<div class="container">
    <div class="image"></div>
    <div class="biodata">
        <table>
            <tr>
                <td rowspan="7">
                    <img style="text-align: center;" src="{{URL::to('/pmb/'.$pmb->photo)}}" width="150">
                </td>
                <td width="80">Nama</td>
                <td> : {{$pmb->name}}</td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td> : {{$pmb->birth_place}}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: {{$pmb->birth_date}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{$pmb->gender=='m'?'Laki Laki':'Perempuan'}}</td>
            </tr>
            <tr>
                <td>Tanggal Ujian</td>
                <td>: {{substr($pmb->test_schedule,0,10)}}</td>
            </tr>
            <tr>
                <td>Jam Ujian</td>
                <td>: {{substr($pmb->test_schedule,10,6)}}</td>
            </tr>
            <tr>
                <td>Ruangan</td>
                <td>: {{$pmb->room->name}}</td>
            </tr>
        </table>
    </div>
</div>