@extends('layouts.app')

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
                    <div class="form-group col-sm-12">
                        <table class="table table-bill">
                            <tr>
                                <th>Tên sách</th>
                                <th>Số lượng</th>
                                <th>Xóa</th>
                            </tr>
                            @foreach($bill->billDetail as $billDetail)
                            <tr>
                                <td>{!! Form::select('book_id[]', $books, $billDetail->book_id, ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('amount[]', $billDetail->amount, ['class' => 'form-control']) !!}</td>
                                <td><a class="btn btn-default btn-delete" href="#">Delete</a></td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="form-group col-sm-12">
                            <button class="btn btn-info btn-add">Add</button>
                        </div>
                    </div>
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('bills.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@section('scripts')
<script>
$().ready(function() {
    var max_fields      = 10; //maximum input boxes allowed

    var x = 1;
    $("table.table-bill").on("click", ".btn-delete", function(e){
        e.preventDefault();
        $(this).parent().parent().remove();
        x--;
    });

    $('.btn-add').click(function(e){
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            var html = "<tr><td>" + '{!! Form::select('book_id[]', $books, null, ['class' => 'form-control']) !!}' + "</td>  <td><input class='form-control' name='amount[]' type='text'>"
                        + "</td><td><a class=\"btn btn-default btn-delete\" href=\"#\">Delete</a></td></tr>";
                        console.log(html);
            $("table.table-bill").append(html);
        }
    });
});
</script>
@endsection
