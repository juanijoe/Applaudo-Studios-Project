<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Create Position</title>
    <style>
        .container {
            max-width: 500px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
<header style="background-color: #FFFFFF;">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <a @isset($user) href="/candidate" class="outline-btn" title="home"
            @else href="/" class="outline-btn" title="home"
            @endisset>
            <div class="container text-left">
			    <div class="mktoText" id="header"><div><img src="https://innovationsoftheworld.com/wp-content/uploads/2019/08/logo-applaudo-studios_019cccde.png" height="100"><br></div></div>
		    </div>
        </a>
    </nav>
</header>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mt-10">{{ Auth::guard('company')->user()->name }} - Edit Position Especifications</h2>
            <div class="card mt-5">
                <div class="card-body">
                    <form method="POST" action="{{ route('position.update',$position->id) }}" role="form"
                          enctype="multipart/form-data">
                          {{ method_field('PATCH') }}
                        @csrf
                        {!! Form::hidden('company_id', $company_id = Auth::guard('company')->user()->id) !!}
                        <div class="box box-info padding-1">
                            <div class="form-group">
                                {{ Form::label('Position Title') }}
                                {{ Form::text('description', $position->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Position Title']) }}
                                {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Position Salary') }}
                                {{ Form::text('salary', $position->salary, ['class' => 'form-control' . ($errors->has('salary') ? ' is-invalid' : ''), 'placeholder' => 'Position Salary']) }}
                                {!! $errors->first('salary', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                <label for="">Recruiter Assigned: {{ $position->recruiter->name }}</label>
                                <select name="recruiter_id" id="recruiterName" class="form-control">
                                    @foreach ($recruiters as $recruiter)
                                        <option value="{{ $recruiter->id }}">{{ $recruiter->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Position Status</label>
                                <select name="position_status" id="statusPosition" class="form-control">
                                    <option value="{{ $position->position_status = 1 }}">Position Open</option>
                                    <option value="{{ $position->position_status = 0 }}">Position Closed</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer mt-2">
                            <button type="submit" class="btn btn-primary">Update Opening</button>
                        </div>
                    </form>
                    <div class="box-footer mt-2">
                        <a class="btn btn-primary " href="{{ route('company.home') }}">Back to Company Home</a>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>
