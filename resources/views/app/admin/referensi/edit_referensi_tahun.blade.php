<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Referensi Tahun</title>
</head>

<body>
    <form action="/update-referensi-tahun/{{ $refTahun->id }}" method="post">
        @csrf
        <label for="">Tahun</label>
        <input type="number" name="ref_tahun" value="{{ $refTahun->ref_tahun }}">
        <button>Submit</button>
    </form>
</body>

</html>
