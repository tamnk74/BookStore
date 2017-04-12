@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('publishers.label_update_publisher')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($publisher, ['route' => ['publishers.update', $publisher->id], 'method' => 'patch']) !!}

                        @include('publishers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection