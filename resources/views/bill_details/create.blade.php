@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Chi tiết hóa đơn
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">

                <div class="row">
                    {!! Form::open(['route' => 'billDetails.store']) !!}

                        @include('bill_details.fields')

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
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                var html = "<tr>"
                + "<td>" + bookName + "<input name='book_id[]' type='hidden' value='" + bookId + "'>"
                + "<td>" + bookAmount + "<input name='amount[]' type='hidden' value='"+ bookAmount + "'>"
                + "</td><td><a class=\"btn btn-default btn-remove\" href=\"#\">Remove</a></td></tr>";
                            console.log(html);
                $("table.table-bill").append(html);
            }
        });
    });
    </script>
@endsection
