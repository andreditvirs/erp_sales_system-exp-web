@extends('layouts.main')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Produk</h1>
    <div class="section-header-breadcrumb">
      <a href="{{ route('product.create') }}" class="btn btn-primary">Create New</a>
    </div>
  </div>

  <div class="section-body">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-0">
            <div class="table-responsive py-4 px-2">
              <table class="table table-striped table-md" id="table">
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('afterScript')
<script>
  $(document).ready(function () {
    let table = $("#table").DataTable({
      processing: true,
      serverSide: false,
      ajax: {
        url: '{{ route("product.getData") }}', // my test URL
        type: 'GET',
        dataType: 'JSON',
        dataSrc: 'data'
      },
      columns: [
        { "data": "id", "className": "d-none"},
        { "data": "code", "title": "Kode" },
        { "data": "name", "title": "Nama Produk" },
        { "data": "price", "title": "Harga" },
        { "data": "default_discount", "title": "Default Diskon" },
        {
            data: null,
            className: 'dt-right editor-edit',
            defaultContent: '<button class="btn btn-primary w-100" type="button">Edit Data</button>',
            orderable: false
        },
        {
            data: null,
            className: 'dt-right editor-delete',
            defaultContent: '<button class="btn btn-danger" type="button">Delete</button>',
            orderable: false
        },
      ],
    });

    // Edit record
    table.on('click', 'td.editor-edit', function (e) {
      location.href = '{{ route("product.edit") }}/'+$(this).closest('tr').find('td:eq(0)').text();
    });
    
    // Delete a record
    table.on('click', 'td.editor-delete', function (e) {
        e.preventDefault();
    
        let confirm_text = confirm('Apakah Anda yakin menghapus '+$(this).closest('tr').find('td:eq(2)').text()+'?');
        if(confirm_text){
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            url: '{{ route("product.delete") }}/'+$(this).closest('tr').find('td:eq(0)').text(),
            type: 'DELETE',
            data: {},
            dataType: 'json',
            success: function(res){
              location.href = '{{ route("product.index") }}';
            },
            error: function(res){
              console.log(res);
            }
          });
        }
    });
  });
</script>
@endsection