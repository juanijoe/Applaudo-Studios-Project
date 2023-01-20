<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Email to Candidate</title>
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
</head>
<header style="background-color: #FFFFFF;">
	<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <a href="/recruiter" class="outline-btn" title="home">
            <div class="container text-left">
			    <div class="mktoText" id="header"><div><img src="https://innovationsoftheworld.com/wp-content/uploads/2019/08/logo-applaudo-studios_019cccde.png" height="100"><br></div></div>
		    </div>
        </a>
    </nav>
    <div class="nav-item text-right">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
</header>
<body>
    <div class="box box-info padding-1">
        <div class="box-body">
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Send Email to Candidate</span>
                </div>
                @if($report = Session::get('email'))
                    <div class="card-body">
                        <h2>{{ Session::get('success') }}</h2>
                    </div>
                @else
                <div class="card-body">
                    <form method="POST" action="{{ route('postulation.email') }}"  role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            {{ Form::label( 'Name: '.$postulation->candidate->name ) }}
                            {{ Form::hidden('name', $postulation->candidate->name, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Email: '.$postulation->candidate->email) }}
                            {{ Form::hidden('email', $postulation->candidate->email, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Position Applied: '.$postulation->position->description) }}
                            {{ Form::hidden('position', $postulation->position->description, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Company: '.$postulation->position->company->name) }}
                            {{ Form::hidden('company', $postulation->position->company->name, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Message Subject') }}
                            {{ Form::text('subject', 'Message Subject', ['class' => 'form-control', 'placeholder' => 'Message Subject']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Observations') }}
                            <div class="card-body">
                            <textarea id="observations" name="observations" rows="8" cols="100">
                                Greating, you have advanced to the next stage...
                            </textarea>
                            <div>
                        </div>
                        <div class="box-footer mt-2">
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </div>
                    </form>
                </div>
                @endif
                <div class="card-body">
                    <a class="btn btn-primary mt-2" href="/recruiter">Back to Openings</a>
                </div>
            </div>
        </div>
    </div>
</body>
