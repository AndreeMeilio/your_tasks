@extends('layouts/main')


@section('content')

<form method="POST" action="{{ route('matapelajaranUpdate', ['idMatapelajaran' => $mata_pelajaran->id]); }}">
    @csrf
    <div class="mb-3">
        <label for="namaMataPelajaran" class="form-label">Nama Mata Pelajaran</label>
        <input type="text" value="{{ $mata_pelajaran->namaMatapelajaran }}" name="namaMataPelajaran" class="form-control" id="namaMataPelajaran" aria-describedby="IPA, IPS, .....">
    </div>
    <div class="mb-3">
        <label for="deskripsiMataPelajaran" class="form-label">Deskripsi</label>
        <div class="form-floating">
            <textarea name="deskripsiMataPelajaran" class="form-control" placeholder="Deskripsi Mata Pelajaran" id="floatingTextarea2"
                style="height: 100px">{{ $mata_pelajaran->deskripsiMatapelajaran }}</textarea>
            <label for="floatingTextarea2">Deskripsi Mata Pelajaran</label>
        </div>
    </div>

    <a class="btn btn-secondary" href="{{ route('matapelajaran'); }}">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection