@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bill
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bill, ['route' => ['bills.update', $bill->id], 'method' => 'patch']) !!}

                        @include('bills.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection