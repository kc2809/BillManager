@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('In Hoá Đơn') }}</div>

            <!-- card-bock -->
            <div class="card-block">
                <div class="row">
                    <!-- blog left -->
                    <div class="col-lg-6 p-b-2">
                        <div class="container">
                            <form action="#" id="product_form" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="plucode" class="col-md-4 col-form-label text-md-right">Ma Hang</label>

                                    <div class="col-md-6">
                                        <input id="plucode" type="text" class="form-control" name="plucode" required
                                            autocomplete="plucode" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="product_name" class="col-md-4 col-form-label text-md-right">Ten
                                        Hang</label>

                                    <div class="col-md-6">
                                        <input id="product_name" type="text" class="form-control" name="product_name"
                                            required autocomplete="product_name" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity" class="col-md-4 col-form-label text-md-right">Số Lượng</label>

                                    <div class="col-md-6">
                                        <input id="quantity" type="number" class="form-control" name="quantity" required
                                            autocomplete="quantity" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-md-4 col-form-label text-md-right">Đơn Giá</label>

                                    <div class="col-md-6">
                                        <input id="price" type="number" class="form-control" name="price" required
                                            autocomplete="price" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 offset-md-4">
                                        <button id="clear_btn" type="reset" class="btn btn-primary">
                                            Xoá
                                        </button>
                                        <button id="add_btn" type="submit" class="btn btn-primary">
                                            Thêm
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end blog left -->
                    <!-- blog right -->
                    <div class="col-lg-4 offset-lg-1">
                         <div class="container">
                            <form action="#" id="bill_info" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="bill_code" class="col-md-4 col-form-label text-md-right">Số Chứng Từ</label>

                                    <div class="col-md-6">
                                        <input id="bill_code" type="text" class="form-control" name="bill_code" required
                                            autocomplete="bill_code" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bill_date" class="col-md-4 col-form-label text-md-right">Ngày</label>

                                    <div class="col-md-6">
                                        <input id="bill_date" type="text" class="form-control" name="bill_date"
                                            required autocomplete="bill_date" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="storage" class="col-md-4 col-form-label text-md-right">Kho</label>

                                    <div class="col-md-6">
                                        <input id="storage" type="number" class="form-control" name="storage" required
                                            autocomplete="quantity" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="unit" class="col-md-4 col-form-label text-md-right">Đơn Vị</label>

                                    <div class="col-md-6">
                                        <input id="unit" type="number" class="form-control" name="unit" required
                                            autocomplete="unit" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="payment" class="col-md-4 col-form-label text-md-right">Phương thức thanh toán</label>

                                    <div class="col-md-6">
                                        <input id="payment" type="text" class="form-control" name="payment" required
                                            autocomplete="payment" autofocus>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end blog right -->
                </div>
                <!-- blog bottom -->
                <div class="row justify-content-center">
                    <div class="table-responsive">
                        <table class="table" id="bill_table">
                            <thead>
                                <tr>
                                    <th>Mã Hàng</th>
                                    <th>Tên Hàng</th>
                                    <th>Số Lượng</th>
                                    <th>Đơn Giá</th>
                                    <th>Thành Tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="plucode">Animal</td>
                                    <td class="product_name">cat</td>
                                    <td>12</td>
                                    <td>35</td>
                                    <td>250</td>
                                    <td class="edit_product"><button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-lg remove_product">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end blog bottom  -->
                <div >
                <a class="btn btn-primary" href="#" id="btn_bill">In Hoa don</a>
                </div>
            </div>
            <!-- end card block -->
        </div>
    </div>
</div>
</div>


@endsection

@section('modal')
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
        <!-- card-bock -->
            <div class="card-block">
                <div class="row">
                    <!-- blog left -->
                        <div class="container">
                            <form action="#" id="product_form" method="POST">
                                @csrf
                                <input type="number" id="id_row">
                                <div class="form-group row">
                                    <label for="plucode" class="col-md-4 col-form-label text-md-right">Ma Hang</label>

                                    <div class="col-md-6">
                                        <input id="plucode" type="text" class="form-control" name="plucode" required
                                            autocomplete="plucode" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="product_name" class="col-md-4 col-form-label text-md-right">Ten
                                        Hang</label>

                                    <div class="col-md-6">
                                        <input id="product_name" type="text" class="form-control" name="product_name"
                                            required autocomplete="product_name" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity" class="col-md-4 col-form-label text-md-right">Số Lượng</label>

                                    <div class="col-md-6">
                                        <input id="quantity" type="number" class="form-control" name="quantity" required
                                            autocomplete="quantity" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-md-4 col-form-label text-md-right">Đơn Giá</label>

                                    <div class="col-md-6">
                                        <input id="price" type="number" class="form-control" name="price" required
                                            autocomplete="price" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 offset-md-4">
                                        <button id="clear_btn" type="reset" class="btn btn-primary">
                                            Xoá
                                        </button>
                                        <button id="add_btn" type="submit" class="btn btn-primary">
                                            Thêm
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                    <!-- end blog left -->
                </div>
                <!-- end blog right -->
            </div>
            <!-- end card block -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="save_modal">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End modal -->
@endsection

@section('script')
<script type="text/javascript">
    var getProductValues = function () {
        return {
            'plucode': $('#plucode').val(),
            'productName': $('#product_name').val(),
            'quantity': $('#quantity').val(),
            'price': $('#price').val()
        }
    }

    function createNewRowProduct(){
        let productValues = getProductValues()
        let row = `<tr>
                        <td class="plucode">${productValues.plucode}</td>
                         <td class="product_name">${productValues.productName}</td>
                                    <td>${productValues.quantity}</td>
                                    <td>${productValues.price}</td>
                                    <td></td>
                                    <td class="edit_product"><button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-lg remove_product">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    <td>
                                </tr>`
        $('#bill_table').append(row)
    }

    var getTableJsonData = function(){
        var data = []
        $('#bill_table tr').each(function(row, tr){
       data[row]={
              "plucode" : $(tr).find('td:eq(0)').text()
            , "productName" :$(tr).find('td:eq(1)').text()
            , "quantity" : $(tr).find('td:eq(2)').text()
            , "price" : $(tr).find('td:eq(3)').text()
            }
        })
        data.shift()
        return $.toJSON(data);
    }

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#save_modal').on('click', function(){
        //get new value of modal
           let plucode = $('.modal-body #plucode').val()
           let productName = $('.modal-body #product_name').val()
           let quantity = $('.modal-body #quantity').val()
           let price =$('.modal-body #price').val()
           let index = $('.modal-body #id_row').val()
          
            $('#myModal').modal('hide');

            let row = $('#bill_table').find('tr').eq(index+1)
            row.find("td:eq(0)").html(plucode)
            row.find("td:eq(1)").html(productName)
            row.find("td:eq(2)").html(quantity)
            row.find("td:eq(3)").html(price)
        })


        $("body").on("click",".edit_product", function(){
           let row = $(this).parents("tr")
           let plucode =  row.find("td:eq(0)").html()
           let productName = row.find("td:eq(1)").html()
           let quantity =  row.find("td:eq(2)").html()
           let price = row.find("td:eq(3)").html()
           let index = row.index()
           $('.modal-body #plucode').val(plucode)
           $('.modal-body #product_name').val(productName)
           $('.modal-body #quantity').val(quantity)
           $('.modal-body #price').val(price)
           $('.modal-body #id_row').val(index)
           //console.log(y.index())
        })

        $("body").on("click", ".remove_product", function(){
            $(this).parents("tr").remove();
        })

        $('#product_form').on('submit', function (event) {
            event.preventDefault()
            createNewRowProduct()
        })

        $('#btn_bill').click(function(){
            let plu = $('#plucode').val()
            let data = getTableJsonData()
            let pdfRoute ='{{route('printBillPdf')}}'
            pdfRoute = pdfRoute + "?q=" + plu
            $(this).attr("href", "{{url('bill')}}");
            window.open(pdfRoute)
        });
    });

</script>
@endsection
