<!DOCTYPE html>
<html>
<head>
    <title>Pemberitahuan Pesanan</title>
</head>
<body>
    <h1>Halo!</h1>
    <p>Pesanan anda sudah diambil oleh {{ $nama }}.</p>
    <p>Foto Teknisi : </p>
    <img src="{{ $message->embed($gambar) }}" alt="" srcset="" width="10%">
</body>
</html>