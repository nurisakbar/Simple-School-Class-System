<style>
    table, td, th {
      border: 1px solid black;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    </style>
<table>
    <tr>
        <td colspan="2">Kwitansi Pembayaran</td>
    </tr>
    <tr>
        <td width="100">Tanggal</td>
        <td> : {{date('d - m -Y')}}</td>
    </tr>
    <tr>
        <td>Terima Dari</td>
        <td> : {{$payment->name==null?$payment->student->name:$payment->name}}</td>
    </tr>
    <tr>
        <td>Terbilang</td>
        <td> : {{$payment->amount}}</td>
    </tr>
    <tr>
        <td>Untuk Pembayaran</td>
        <td> : {{$payment->payment_type}}</td>
    </tr>
</table>



<p>Diterima Oleh</p>
<br><br><br>



<p>Bagian Keuangan</p>