@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-xs" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Act
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a class="dropdown-item edit editKelompok " type="button" href="{{ $id }}" data-original-title="Edit" data-bs-toggle="modal" data-bs-target="#edit{{ $id }}" data-bs-whatever="@fat"><i class="mdi mdi-grease-pencil "></i> edit</a>
        <form action="{{ route('kota.destroy', $id) }}" method="POST">
        @csrf
        @method('delete')
             <a class="dropdown-item deleteKelompok" type="submit" name="submit" onclick="return confirm('Apa Anda yakin menghapus data ini?')" data-original-title="Delete"><i class="mdi mdi-delete-forever "></i> hapus</a>
        </form>
    </div>
    </div>
</div> --}}

<a class="btn waves-effect waves-light btn-warning btn-sm" type="button" href="{{ $id }}" data-original-title="Edit" data-bs-toggle="modal" data-bs-target="#edit{{ $id }}" data-bs-whatever="@fat"><i class="mdi mdi-grease-pencil "></i> </a> 
{{-- <a href="{{ route('kecamatan.edit', base64_encode($id)) }}" class="btn waves-effect waves-light btn-warning btn-sm"><i class="mdi mdi-grease-pencil"></i></a> --}}
<form action="{{ route('lokkota.destroy', $id) }}" method="post" style="display:inline">
    @csrf
    @method('delete')
        <button type="submit" name="submit" class="btn waves-effect waves-light btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="mdi mdi-delete-forever"></i></button>
    </form>

    

<!-- Edit Data -->
<div class="modal fade" tabindex="-1" aria-labelledby="myLargeModalLabel"  aria-hidden="true" id="edit{{ $id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="modelHeading">Edit Kota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible fade show print-error-msg" role="alert" style="display:none">
                    <ul></ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                  </div>

                <form action="{{ route('lokkota.update', $id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-6 mb-3">
                        <div class="mb-3">
                            <label  class="form-label">Id</label>
                            <input  class="form-control" name="id" id="id" type="text" placeholder="Masukkan Id Kota" required value="{{ $id }}">
                            @error('id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="mb-3">
                            <label  class="form-label">Nama Kota</label>
                            <input  class="form-control" name="name" id="name" type="text" placeholder="Masukkan Nama Kota" required value="{{ $name }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="hidden" name="province_id" id="province_id" value="33">
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Data -->