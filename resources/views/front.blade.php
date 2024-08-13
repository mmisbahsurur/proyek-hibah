@extends('layout.front.master')

@push('plugin-styles')
<link href="{{ asset('front/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Selamat Datang di Aplikasi E-Hibah</h4>
  </div>

</div>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form method="get">
                <div class="row">
                    <div class="col-6 mb-3">
                      <div class="mb-3">
                        <label  class="form-label">Kab/Kota</label>
                        <select class="js-example-basic-single form-select" name="kota" data-width="100%" id="selectKota" >
                            <option value="">-- Pilih Lokasi --</option>
                            @foreach ($kab as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="mb-3">
                            <label  class="form-label">Kecamatan</label>
                            <select  class="js-example-basic-single form-select" id="selectKecamatan" name="kecamatan" data-width="100%">
                                <option value="">-- Pilih Lokasi --</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                      <div class="mb-3">
                        <label  class="form-label">Kelurahan</label>
                        <select  class="js-example-basic-single form-select" id="selectDesa" name="desa" data-width="100%">
                            <option value="">-- Pilih Lokasi --</option>
                           
                        </select>
                    </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="mb-3">
                            <label  class="form-label">Kelompok Tani</label>
                            <select  class="js-example-basic-single form-select" id="kelompok" name="kelompok" data-width="100%">
                                <option value="">-- Pilih Kelompok Tani --</option>
                                @foreach ($kel as $item)
                                <option value="{{ $item->nama_kelompok }}">{{ $item->nama_kelompok }}</option>
                            @endforeach
                               
                            </select>
                        </div>
                    </div>
                </div>

                <button  name="filter" id="filter"  type="button" class="btn btn-primary btn-icon-text btn-xs" >
                    <i class="btn-icon-prepend" data-feather="search"></i>
                    Cari data
                </button>
            </form>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-12 col-xl-12 stretch-card">



  </div>
</div> <!-- row -->

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Data Table</h6>

          <div class="table-responsive">
            <table id="" class="table data-table">
                <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th>Nama Kelompok</th>
                        <th>Nomor Register</th>
                        <th>Kota</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Jenis Bantuan</th>
                        <th>Jumlah</th>
                        
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
<script src="{{ asset('front/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('front/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('front/assets/js/data-table.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('assets/js/dropzone.js') }}"></script>
<script src="{{ asset('assets/js/dropify.js') }}"></script>


{{-- <script type="text/javascript">
    $(function () {

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
   
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "/",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'namakelom', name: 'namakelom'},
                {data: 'noreg', name: 'noreg'},
                {data: 'kota', name: 'kota'},
                {data: 'kecamatan', name: 'kecamatan'},
                {data: 'desa', name: 'desa'},
                {data: 'namajen', name: 'namajen'},
                {data: 'jumlah', name: 'jumlah'},
          ]
      });
         
    });
</script> --}}

<script type="text/javascript">
  $(function () {

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      load_data();

      function load_data(selectKota = '', selectKecamatan = '', selectDesa = '', kelompok = '') {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,

            ajax: {
                url: '/',
                data: function(d) {
                    d.kota = $('#selectKota').find(":selected").val();
                    d.kecamatan = $('#selectKecamatan').find(":selected").val();
                    d.desa = $('#selectDesa').find(":selected").val();
                    d.kelompok = $('#kelompok').find(":selected").val();
                }
            }, 
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'namakelom', name: 'namakelom'},
                {data: 'noreg', name: 'noreg'},
                {data: 'kota', name: 'kota'},
                {data: 'kecamatan', name: 'kecamatan'},
                {data: 'desa', name: 'desa'},
                {data: 'namajen', name: 'namajen'},
                {data: 'jumlah', name: 'jumlah'},
                
        ]
        });
      }
        $('#filter').click(function() {
            var kota = $('#selectKota').val();
            var kecamatan = $('#selectKecamatan').val();
            var desa = $('#selectDesa').val();
            var kelompok = $('#kelompok').val();

            if(kota != '' && kecamatan == '' && kelompok == '' && desa == '') {
                $('.data-table').DataTable().destroy();
                load_data(kota);
            }

            if(kota != '' && kecamatan != '' && kelompok == '' && desa == '') {
                $('.data-table').DataTable().destroy();
                load_data(kota, kecamatan);
            }

            if(kota != '' && kecamatan != '' && desa != '' && kelompok == '') {
                $('.data-table').DataTable().destroy();
                load_data(kota, kecamatan, desa);
            }


            if(kota != '' && kelompok != '' && kecamatan == '' && desa == '') {
                $('.data-table').DataTable().destroy();
                load_data(kota, kelompok);
            }

            if(kota != '' && kecamatan != '' && kelompok != '' && desa == '') {
                $('.data-table').DataTable().destroy();
                load_data(kota, kecamatan, kelompok);
            }

            if(kota != '' && kecamatan != '' && kelompok != '' && desa == '') {
                $('.data-table').DataTable().destroy();
                load_data(kota, kelompok, kecamatan);
            }

            if(kota != '' && kecamatan != '' && kelompok != '' && desa != '') {
                $('.data-table').DataTable().destroy();
                load_data(kota, kecamatan, kelompok, desa);
            }

            if(kelompok != '' && kota == '' && kecamatan == '' && desa == '') {
                $('.data-table').DataTable().destroy();
                load_data(kelompok);
            }
        });
        $('refresh').click(function() {
            $('#selectKota').val();
            $('.data-table').DataTable().destroy();
            load_data();
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
        $('#selectKota').on('change', function () {
            var idKota = this.value;
            $("#selectKecamatan").html('');
            $.ajax({
                url: "{{url('select/fetch-kec')}}",
                type: "POST",
                data: {
                    regency_id: idKota,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#selectKecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
                    $.each(result.kecamatan, function (key, value) {
                        $("#selectKecamatan").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    // $('#selectKota').html('<option value="">-- Pilih Kota --</option>');
                }
            });
        });

        /*------------------------------------------
        --------------------------------------------
        State Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#selectKecamatan').on('change', function () {
            var idDes = this.value;
            $("#selectDesa").html('');
            $.ajax({
                url: "{{url('select/fetch-des')}}",
                type: "POST",
                data: {
                    district_id: idDes,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#selectDesa').html('<option value="">-- Pilih Desa --</option>');
                    $.each(res.desa, function (key, value) {
                        $("#selectDesa").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

    });
</script>

@endpush



