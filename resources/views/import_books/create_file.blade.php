@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nhập sách
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                @if ($message = Session::get('success'))
					<div class="alert alert-success" role="alert">
						{{ Session::get('success') }}
					</div>
				@endif

				@if ($message = Session::get('error'))
					<div class="alert alert-danger" role="alert">
						{{ Session::get('error') }}
					</div>
				@endif

                <h3>Import File Form:</h3>
                <div class="row" style="margin-left: 10px">
                    {!! Form::open(['route' => 'importExcel', 'class' => 'form-inline']) !!}
                        <div class="form-group">
                            <label for="import_file">Chọn file:</label>
                            <input type="file" class="form-control" id="import_file" name="import_file">{{ csrf_field() }}
                        </div>
					    <button class="btn btn-primary">Import CSV or Excel File</button>
                    {!! Form::close() !!}
                </div>
                <h3>Import File From Database:</h3>
                <div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;"> 		
			    	<a href="{{ url('importBooks/downloadExcel/xls') }}"><button class="btn btn-success btn-lg">Download Excel xls</button></a>
					<a href="{{ url('importBooks/downloadExcel/xlsx') }}"><button class="btn btn-success btn-lg">Download Excel xlsx</button></a>
					<a href="{{ url('importBooks/downloadExcel/csv') }}"><button class="btn btn-success btn-lg">Download CSV</button></a>
		    	</div>
            </div>
        </div>
    </div>
@endsection

@section('content')