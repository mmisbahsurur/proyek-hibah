{{-- <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-xs" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Act
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a class="dropdown-item edit editKelompok " type="button" href="{{ route('kecamatan.edit', base64_encode($id)) }}"><i class="mdi mdi-grease-pencil "></i> edit</a>
        <form action="{{ route('kecamatan.destroy', $id) }}" method="POST">
        @csrf
        @method('delete')
             <a class="dropdown-item" type="submit" name="submit" onclick="return confirm('Apa Anda yakin menghapus data ini?')" data-original-title="Delete"><i class="mdi mdi-delete-forever "></i> hapus</a>
        </form>
    </div>
    </div>
</div> --}}

<a href="{{ route('lokkecamatan.edit', base64_encode($id)) }}" class="btn waves-effect waves-light btn-warning btn-sm"><i class="mdi mdi-grease-pencil"></i></a>
<form action="{{ route('lokkecamatan.destroy', $id) }}" method="post" style="display:inline">
    @csrf
    @method('delete')
        <button type="submit" name="submit" class="btn waves-effect waves-light btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="mdi mdi-delete-forever"></i></button>
    </form>

