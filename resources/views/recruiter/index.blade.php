@extends('layouts.app')

@section('template_title')
    Recruiter
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Recruiter') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('recruiters.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                              <div class="float-right">
                                <a href="{{ route('company.home') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Name</th>
										<th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recruiters as $recruiter)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $recruiter->name }}</td>
											<td>{{ $recruiter->email }}</td>
                                            <td>
                                                <form action="{{ route('recruiters.destroy',$recruiter->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('recruiters.show',$recruiter->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('recruiters.edit',$recruiter->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $recruiters->links() !!}
            </div>
        </div>
    </div>
@endsection
