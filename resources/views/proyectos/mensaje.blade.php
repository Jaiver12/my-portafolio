@extends('layouts.app')

@section('template_title')
    Mensajes
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Mensajes') }}
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>                                    
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Mensaje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mensajes as $mensaje)
                                    <tr>
                                        <td>{{ $mensaje->id }}</td>
                                        
                                        <td>{{ $mensaje->name }}</td>
                                        <td>{{ $mensaje->email }}</td>
                                        <td>{{ $mensaje->message }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $mensajes->links() !!}
        </div>
    </div>
</div>
@endsection