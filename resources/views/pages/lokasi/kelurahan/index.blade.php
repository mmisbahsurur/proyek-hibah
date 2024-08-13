@extends('layout.master')
@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/pickr/themes/classic.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Tabel</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kelurahan</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Data Kelurahan</h6>

                <button  type="button" class="btn btn-success btn-icon-text btn-xs"
                data-bs-toggle="modal" data-bs-target="#tambah"data-bs-whatever="@mdo"><i class="fa fa-plus"></i>  Tambah Kelurahan
              </button><br><br>

              @if(Session::has('status'))
              <div class="alert customize-alert alert-dismissible text-success alert-light-success fade show"
                  role="alert">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  <div class="d-flex align-items-center font-medium">
                      <i data-feather="info" class="text-success fill-white feather-sm me-2"></i>
                      {{ Session::get('message') }}
                  </div>
              </div>
              @endif

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Tambah Data -->
                <div class="modal fade " tabindex="-1" aria-labelledby="myLargeModalLabel"  aria-hidden="true" id="tambah">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h4" id="modelHeading">Tambah Kelurahan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger alert-dismissible fade show print-error-msg" role="alert" style="display:none">
                                    <ul></ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                                  </div>

                                <form action="{{ route('lokkelurahan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <div class="mb-3">
                                            <label  class="form-label">Kecamatan</label>
                                            <select  class="form-select-modal form-select" id="kecxDropdown" name="district_id" data-width="100%">
                                                <option value="">-- Pilih Lokasi --</option>
                                                @foreach ($kec as $keylok => $kec)
                                                    <option value="{{$kec->id}}" >{{ $kec->id }} - {{$kec->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="mb-3">
                                            <label  class="form-label">Kode Kelurahan</label>
                                            <input  class="form-control" name="id" id="id" type="text" placeholder="Masukkan Kode Kelurahan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <div class="mb-3">
                                            <label  class="form-label">Nama Kelurahan</label>
                                            <input  class="form-control" name="name" id="name" type="text" placeholder="Masukkan Nama Kelurahan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tambah Data -->

                <div class="table-responsive">
                    <table id="" class="table data-table">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Kode Kota</th>
                                <th>Kota</th>
                                <th>Kode Kecamatan</th>
                                <th>Kecamatan</th>
                                <th>Kode Kelurahan</th>
                                <th>Kelurahan</th>
                                <th>ACT</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('plugin-scripts')
<script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/typeahead-js/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pickr/pickr.min.js') }}"></script>
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
@endpush
@push('custom-scripts')
<script src="{{ asset('assets/js/data-table.js') }}"></script>
{{-- <script src="{{ asset('assets/js/form-validation.js') }}"></script> --}}
<script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
<script src="{{ asset('assets/js/inputmask.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('assets/js/typeahead.js') }}"></script>
<script src="{{ asset('assets/js/tags-input.js') }}"></script>
<script src="{{ asset('assets/js/dropzone.js') }}"></script>
<script src="{{ asset('assets/js/dropify.js') }}"></script>
<script src="{{ asset('assets/js/sweet-alert.js') }}"></script>

<script type="text/javascript">
     $(function () {

$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

var table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('lokkelurahan.index') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'kode', name: 'kode'},
            {data: 'nmkot', name: 'nmkot'},
            {data: 'kodekec', name: 'kodekec'},
            {data: 'nmkec', name: 'nmkec'},
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
});
   
});
    </script>
<script>
    $(document).ready(function () {

        /*------------------------------------------
        --------------------------------------------
        Country Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#kotaDropdown').on('change', function () {
            var idKota = this.value;
            $("#kecDropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-kec')}}",
                type: "POST",
                data: {
                    regency_id: idKota,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#kecDropdown').html('<option value="">-- Pilih Kecamatan --</option>');
                    $.each(result.kecamatan, function (key, value) {
                        $("#kecDropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    // $('#kotaDropdown').html('<option value="">-- Pilih Kota --</option>');
                }
            });
        });

        /*------------------------------------------
        --------------------------------------------
        State Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#kecDropdown').on('change', function () {
            var idDes = this.value;
            $("#desDropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-des')}}",
                type: "POST",
                data: {
                    district_id: idDes,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#desDropdown').html('<option value="">-- Pilih Desa --</option>');
                    $.each(res.desa, function (key, value) {
                        $("#desDropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

    });
</script>
<script>
    $(document).ready(function () {

        /*------------------------------------------
        --------------------------------------------
        Country Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#kotaxDropdown').on('change', function () {
            var idKota = this.value;
            $("#kecxDropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-kec')}}",
                type: "POST",
                data: {
                    regency_id: idKota,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#kecxDropdown').html('<option value="">-- Pilih Kecamatan --</option>');
                    $.each(result.kecamatan, function (key, value) {
                        $("#kecxDropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    // $('#kotaDropdown').html('<option value="">-- Pilih Kota --</option>');
                }
            });
        });

        /*------------------------------------------
        --------------------------------------------
        State Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#kecxDropdown').on('change', function () {
            var idDes = this.value;
            $("#desxDropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-des')}}",
                type: "POST",
                data: {
                    district_id: idDes,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#desxDropdown').html('<option value="">-- Pilih Desa --</option>');
                    $.each(res.desa, function (key, value) {
                        $("#desxDropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

    });
</script>
{{-- <script>

    $(document).ready(function() {
      $(".form-select-modal").select2({
        dropdownParent: $("#FormJenis")
      });
    });

</script> --}}
@endpush
