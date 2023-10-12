@extends('layouts.main')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Customer</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="#">Menu</a></div>
      <div class="breadcrumb-item active"><a href="#">Item</a></div>
    </div>
  </div>

  <div class="section-body">

    <div class="row">
        <div class="col-12">
            <div class="card">
              <form>
                <div class="card-header">
                  <h4>Add New Customer</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label>Code</label>
                    <input name="code" type="text" class="form-control" value='' required>
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" class="form-control" value='' required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" required>
                      
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input name="phone_no" type="text" class="form-control" value='' required>
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <input name="city" type="text" class="form-control" value='' required>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Submit</button>
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
      url: '{{ route("customer.store") }}',
      type: 'POST',
      data: $(this).serialize(),
      dataType: 'json',
      success: function(res){
        location.href = '{{ route("customer.index") }}';
      },
      error: function(res){
        console.log(res);
      }
    });
  });
</script>
@endsection