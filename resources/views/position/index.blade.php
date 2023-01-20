@extends('layouts.app')

@section('template_title')
    Position
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Position') }}
                            </span>
                            <h2><strong>Admin User Do Not Create or Modify Positions!!!</strong></h2>
                             <div class="float-right">
                                <a href="{{ route('positions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Company Id</th>
										<th>Recruiter Id</th>
										<th>Salary</th>
										<th>Description</th>
										<th>Position Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($positions as $position)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $position->company_id }}</td>
											<td>{{ $position->recruiter_id }}</td>
											<td>{{ $position->salary }}</td>
											<td>{{ $position->description }}</td>
											<td>{{ $position->position_status }}</td>
                                            <td>
                                                <form action="{{ route('positions.destroy',$position->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('positions.show',$position->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('positions.edit',$position->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $positions->links() !!}
            </div>
        </div>
    </div>
@endsection
