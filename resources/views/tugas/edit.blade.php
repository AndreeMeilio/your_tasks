@extends('layouts/main')


@section('content')
<form method="POST" action="{{ route('tugasUpdate', ['idMatapelajaran' => $idMatapelajaran, 'idTugas' => $tugas->id]) }}">
    @csrf
    <div class="mb-3">
        <label for="namaTugas" class="form-label">Nama Tugas</label>
        <input type="text" name="namaTugas" class="form-control" id="namaTugas" value="{{ $tugas->namaTugas }}">
    </div>
    <div class="mb-3">
        <label for="tanggaldiberiTugas" class="form-label">Tanggal Diberi Tugas</label>
        <input type="text" name="tanggaldiberiTugas" class="form-control" id="tanggaldiberiTugas" value="{{ $tugas->tanggaldiberiTugas }}" data-field="date" readonly>
    </div>
    <div class="mb-3">
        <label for="tanggaldeadlineTugas" class="form-label">tanggaldeadlineTugas</label>
        <input type="text" name="tanggaldeadlineTugas" class="form-control" id="tanggaldeadlineTugas" value="{{ $tugas->tanggaldeadlineTugas }}" data-field="date" readonly>
    </div>
    {{-- Div Untuk Date Picker --}}
    <div id="dateBox"></div>

    <div class="mb-3">
        <label for="tempatpengumpulanTugas" class="form-label">Tempat Pengumpulan Tugas (Optional)</label>
        <input type="text" name="tempatpengumpulanTugas" class="form-control" id="tempatpengumpulanTugas" value="{{ $tugas->tempatpengumpulanTugas }}">
    </div>
    <div class="mb-3">
        <label for="guruBersangkutan" class="form-label">Guru Yang Bersangkutan (Optional)</label>
        <input type="text" name="guruBersangkutan" class="form-control" id="guruBersangkutan" value="{{ $tugas->guruBersangkutan }}">
    </div>
    <div class="mb-3">
        <label for="deskripsiTugas" class="form-label">Deskripsi Tugas (Optional)</label>
        <div class="form-floating">
            <textarea name="deskripsiTugas" class="form-control" placeholder="Deskripsi Mata Pelajaran" id="floatingTextarea2"
                style="height: 100px">{{ $tugas->deskripsiTugas }}</textarea>
            <label for="floatingTextarea2">Deskripsi Tugas</label>
        </div>
    </div>

    <a class="btn btn-secondary" href="{{ route('tugas', ['idMatapelajaran' => $idMatapelajaran]) }}">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

@section('javascript')
    <script>
        $(document).ready(function(){
            $("#dateBox").DateTimePicker();
        });
    </script>
@endsection