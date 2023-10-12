@extends('layouts.main')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Produk</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="#">Menu</a></div>
      <div class="breadcrumb-item active"><a href="{{ route('product.index') }}">Produk</a></div>
    </div>
  </div>

  <div class="section-body">

    <div class="row">
        <div class="col-12">
            <div class="card">
              <form>
                <div class="card-header">
                  <h4>Edit produk: <span style="font-weight: 100">{{ $product->name }}</span></h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-2">
                      <label>Code</label>
                      <input name="code" type="text" class="form-control" value='{{ $product->code }}' disabled>
                    </div>
                    <div class="form-group col-6">
                      <label>Name</label>
                      <input name="name" type="text" class="form-control" value='{{ $product->name }}' required>
                    </div>
                    <div class="form-group col-2">
                      <label>Price</label>
                      <input name="price" type="number" class="form-control" value='{{ $product->price }}' required>
                    </div>
                    <div class="form-group col-2">
                      <label>Default Discount</label>
                      <input name="default_discount" type="number" class="form-control" value='{{ $product->default_discount }}' required>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Update Data</button>
                </div>
              </form>
            </div>
          </div>
    </div>
  </div>
</section>
@endsection
@section('afterScript')
<script>
  $("form").submit(function (e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '{{ route("product.update", ["id" => $product->id]) }}',
      type: 'PUT',
      data: $(this).serialize(),
      dataType: 'json',
      success: function(res){
        location.href = '{{ route("product.index") }}';
      },
      error: function(res){
        console.log(res);
      }
    });
  });
</script>
@endsection