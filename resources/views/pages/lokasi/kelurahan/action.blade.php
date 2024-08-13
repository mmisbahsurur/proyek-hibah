<a href="{{ route('lokkelurahan.edit', base64_encode($id)) }}" class="btn waves-effect waves-light btn-warning btn-sm"><i class="mdi mdi-grease-pencil"></i></a>
<form action="{{ route('lokkelurahan.destroy', $id) }}" method="post" style="display:inline">
    @csrf
    @method('delete')
        <button type="submit" name="submit" class="btn waves-effect waves-light btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="mdi mdi-delete-forever"></i></button>
    </form>