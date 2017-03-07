@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lập hóa đơn
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'bills.store']) !!}

                        @include('bills.fields')

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
            var html = "<tr><td><input class='form-control' name='book_id[]' type='text'></td>  <td><input class='form-control' name='amount[]' type='text'>"
                        + "</td><td><a class=\"btn btn-default btn-delete\" href=\"#\">Delete</a></td></tr>";
            $("table.table-bill").append(html);
        }
    });
});
</script>
@endsection