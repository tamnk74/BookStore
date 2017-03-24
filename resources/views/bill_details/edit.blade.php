@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Chỉnh sửa hóa đơn
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::open(['route' => ['billDetails.update', $bill->id], 'method' => 'patch']) !!}
                        <!-- Client Name Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('client_name', 'Tên khách hàng:') !!}
                        {!! Form::text('client_name', $bill->client_name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                       <label class="col-sm-12 col-md-12">Chọn sách:</label>
                       <div class="col-sm-12 col-md-5">
                           {!! Form::select('book_id', $books, null,
                           ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'title'=>'Please select a book..']) !!}
                       </div>
                       <div class="col-sm-12 col-md-5">
                           <input class='form-control' id="bookAmount" name='amount' type='text' placeholder="Số lượng">
                       </div>
                       <div class="col-sm-12 col-md-2"><a class="btn btn-default btn-add" href="#">Add</a></div>
                    </div>
                    <div class="form-group col-sm-12">
                        <table class="table table-bill">
                            <tr>
                                <th>Tên sách</th>
                                <th>Số lượng</th>
                                <th>Xóa</th>
                            </tr>
                            @foreach($bill->billDetail as $billDetail)
                            <tr>
                                <td>{!! $billDetail->book->name !!}<input type="hidden" name='book_id[]' value="{{$billDetail->book->id}}"> </td>
                                <td>{!! $billDetail->amount !!}<input type="hidden" name='amount[]' value="{{$billDetail->amount}}"></td>
                                <td><a class="btn btn-default btn-remove" href="#">Remove</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('billDetails.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@section('scripts')
    <script src="{{asset('js/bootstrap-select.js')}}"></script>
    <script>
        $().ready(function() {
            var max_fields = 10; //maximum input boxes allowed

            var x = 1;
            $("table.table-bill").on("click", ".btn-remove", function(e){
                e.preventDefault();
                $(this).parent().parent().remove();
                x--;
            });

            $('.btn-add').click(function(e){
                e.preventDefault();
                var bookName = $(this).parent().parent().find('select option:selected').text();
                var bookId = $(this).parent().parent().find('select option:selected').val();
                var bookAmount = $(this).parent().parent().find('#bookAmount').val();
                if(x < max_fields && bookId != null && bookAmount != 0){ //max input box allowed
                    x++; //text box increment
                    var html = "<tr>"
                        + "<td>" + bookName + "<input name='book_id[]' type='hidden' value='" + bookId + "'>"
                        + "<td>" + bookAmount + "<input name='amount[]' type='hidden' value='"+ bookAmount + "'>"
                        + "</td><td><a class=\"btn btn-default btn-remove\" href=\"#\">Remove</a></td></tr>";
                    console.log(html);
                    $("table.table-bill").append(html);
                }
                else alert("Vui long dien gia tri hop le!");
            });
        });
    </script>
@endsection