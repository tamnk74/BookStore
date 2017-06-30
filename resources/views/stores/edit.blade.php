@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Store
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($store, ['route' => ['stores.update', $store->id], 'method' => 'patch']) !!}

                        @include('stores.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection