@extends('layouts.admin')

@section('content')

<div class="card">
<div class="card-header">
Tambah Masyarakat
</div>

<div class="card-body">

<form
action="{{ route('admin.masyarakat.store') }}"
method="POST">

@csrf

<div class="mb-3">
<label>NIK</label>
<input type="text" name="nik" class="form-control">
</div>

<div class="mb-3">
<label>Nama</label>
<input type="text" name="nama" class="form-control">
</div>

<div class="mb-3">
<label>Alamat</label>
<textarea name="alamat"
class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Pekerjaan</label>
<input type="text"
name="pekerjaan"
class="form-control">
</div>

<div class="mb-3">
<label>Gaji</label>
<input type="number"
name="gaji"
class="form-control">
</div>

<div class="mb-3">
<label>Total Harta</label>
<input type="number"
name="total_harta"
class="form-control">
</div>

<div class="mb-3">
<label>Kendaraan</label>
<input type="number"
name="kendaraan"
class="form-control">
</div>

<div class="mb-3">
<label>Status Rumah</label>

<select
name="status_rumah"
class="form-control">

<option>Kontrak</option>
<option>Milik Sendiri</option>
<option>Menumpang</option>

</select>

</div>

<button class="btn btn-success">
Simpan
</button>

</form>

</div>
</div>

@endsection