@extends('layouts.app')

@section('template_title')
    {{ $portafolio->name ?? 'Show Portafolio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Portafolio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('portafolio') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $portafolio->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $portafolio->description }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $portafolio->image }}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $portafolio->url }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
