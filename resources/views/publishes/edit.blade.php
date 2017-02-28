@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Publish
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($publish, ['route' => ['publishes.update', $publish->id], 'method' => 'patch']) !!}

                        @include('publishes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection