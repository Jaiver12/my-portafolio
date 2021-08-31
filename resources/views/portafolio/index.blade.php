@extends('layouts.app')

@section('template_title')
    Portafolio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Portafolio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('portafolios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name</th>
										<th>Description</th>
										<th>Image</th>
										<th>Url</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($portafolios as $portafolio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $portafolio->name }}</td>
											<td>{{ $portafolio->description }}</td>
											<td>{{ $portafolio->image }}</td>
											<td>{{ $portafolio->url }}</td>

                                            <td>
                                                <form action="{{ route('portafolios.destroy',$portafolio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('portafolios.show',$portafolio->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('portafolios.edit',$portafolio->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $portafolios->links() !!}
            </div>
        </div>
    </div>
@endsection
