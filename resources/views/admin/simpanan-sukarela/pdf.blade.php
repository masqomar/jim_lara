<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <center>
        <h5>{{$title}}</h4>
            <h5>{{$date}}</h4>
                <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a>
            </h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Pekerjaan</th>
                <th>Pekerjaan</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($simpananAnggota as $p)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$p->user_id}}</td>
                <td>{{$p->produk_id}}</td>
                <td>{{$p->jumlah}}</td>
                <td>{{$p->periode_bulan}}</td>
                <td>{{$p->periode_tahun}}</td>
                <td>{{$p->tanggal_setor}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>