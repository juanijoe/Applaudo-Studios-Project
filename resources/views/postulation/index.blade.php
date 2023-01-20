@extends('layouts.app')

@section('template_title')
    Postulation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Postulation') }}
                            </span>
                                <h2><strong>Admin User Do Not Create or Modify Postulations!!!</strong></h2>
                             <div class="float-right">
                                <a href="{{ route('postulations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                              <div class="float-right">
                                <a href="{{ route( 'admin.home') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Back to Home') }}
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
										<th>Candidate Id</th>
										<th>Status Id</th>
										<th>Position Id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postulations as $postulation)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $postulation->candidate_id }}</td>
											<td>{{ $postulation->status_id }}</td>
											<td>{{ $postulation->position_id }}</td>

                                            <td>
                                                <form action="{{ route('postulations.destroy',$postulation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('postulations.show',$postulation->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('postulations.edit',$postulation->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $postulations->links() !!}
            </div>
        </div>
    </div>
@endsection
