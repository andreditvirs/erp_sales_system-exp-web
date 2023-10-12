@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Invoice Penjualan</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Menu</div>
        <div class="breadcrumb-item active"><a href="{{ route('invoice.index') }}">Invoice Penjualan</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="invoice">
        <form action="{{ route('invoice.store') }}" method="POST">
            <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Customer Code</label>
                        <select name="customer_id" id="customer_id" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input name="date" type="date" class="form-control" value='{{ date('Y-m-d') }}' required>
                    </div>
                </div>
            </div>            
            <div class="row mt-4">
                <div class="col-md-12">
                <div class="section-title">Invoice Detail</div>
                <p class="section-lead">Select Produk To Add New Produk</p>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-md">
                    <tr>
                        <th data-width="40">#</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th class="text-right">Total</th>
                    </tr>
                    <tbody id="table_invoice">
                    </tbody>
                    <tfoot>
                        <td colspan="7">
                            <center>
                                <button type="button" class="btn btn-warning" id="btn_add_product">(+) Add Produk</button>
                            </center>
                        </td>
                    </tfoot>
                    </table>
                </div>
                <input type="hidden" value="0" name="total" id="total_all"/>
                <button class="btn btn-primary w-100 mt-5">Submit</button>
                </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  </section>
@endsection
@section('afterScript')
<script>
    $(document).ready(function () {
        $.ajax({
            url: '{{ route("customer.getData") }}',
            type: 'GET',
            dataType: 'JSON',
            data: {},
            success: function(res){
                if(res.status == 'ok'){
                    $("#customer_id").empty();
                    $("#customer_id").append(`<option selected disabled>Select Customer</option>`);
                    res.data.forEach(e => {
                        $("#customer_id").append(`<option value="${e.id}">${e.code} - ${e.name}</option>`);
                    });
                }
            },
            error: function(res){
                console.log(res);
            }
        });

        $("#btn_add_product").on("click", function(e){
            e.preventDefault();
            let id = 1;
            if($("#table_invoice").find('tr').last().length != 0){
                id = parseInt($("#table_invoice tr:last").data('id'));
                id++;
            }
            $("#table_invoice").append(`
                <tr id="product_row" data-id="${id}">
                    <td>-</td>
                    <td>
                        <select id="product_code-${id}" name="products_code[]" class="form-control" onclick="setProductCode(${id})" onchange="changeProductCode(${id})">
                            <option value="">Select Produk</option>
                        </select>
                    </td>
                    <td><input type="text" name="products_name[]" id="product_name-${id}" value="" class="form-control" readonly/></td>
                    <td><input type="number" value="0" name="products_qty[]" id="product_qty-${id}" class="form-control" onkeyup="changeTotalItem(${id})"/></td>
                    <td><input type="number" value="0" name="products_price[]" id="product_price-${id}" class="form-control" readonly/></td>
                    <td><input type="number" value="0" name="products_discount[]" id="product_discount-${id}" class="form-control" required onkeyup="changeTotalItem(${id})"/></td>
                    <td class="text-right">
                        <input type="number" value="0" name="products_total[]" id="product_total-${id}" class="form-control text-right" readonly/>
                    </td>
                </tr>
            `);
        });
    });

    function changeTotalItem(id){
        let qty = $("#product_qty-"+id).val();
        let price = $("#product_price-"+id).val();
        let discount = $("#product_discount-"+id).val();
        $("#product_total-"+id).val(qty*price*(1-(discount/100)));

        var values = $("input[name='products_total[]']")
              .map(function(){return $(this).val();}).get();
        
        let total = 0;
        values.forEach((e) => {
            total += parseInt(e);
        })
        $("#total_all").val(total);

    }

    function changeProductCode(id){
        let row = $("#product_code-"+id);
        $.ajax({
            url: '{{ route("product.getDetail") }}/'+$("#product_code-"+id).val(),
            type: 'GET',
            dataType: 'JSON',
            data: {},
            success: function(res){
                if(res.status == 'ok'){   
                    setProductCode(id, res.data.id);
                    $("#table_invoice tr[data-id='"+id+"'] #product_name-"+id+"").val(res.data.name);
                    $("#table_invoice tr[data-id='"+id+"'] #product_price-"+id+"").val(res.data.price);
                    $("#table_invoice tr[data-id='"+id+"'] #product_discount-"+id+"").val(res.data.default_discount);
                }
            },
            error: function(res){
                console.log(res);
            }
        });
    }            
    function setProductCode(id, val){
        let row = $("#product_code-"+id);
            $.ajax({
                url: '{{ route("product.getData") }}',
                type: 'GET',
                dataType: 'JSON',
                data: {},
                success: function(res){
                    if(res.status == 'ok'){
                        row.empty();
                        row.append(`<option value="">Select Produk</option>`);
                        res.data.forEach((e) => {
                            if(val == e.id){
                                row.append(`<option value="${e.id}" selected>${e.code}</option>`);   
                            }else{
                                row.append(`<option value="${e.id}">${e.code}</option>`);
                            }
                        });
                    }
                },
                error: function(res){
                    console.log(res);
                }
            });
        }
</script>
@endsection