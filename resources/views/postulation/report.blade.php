

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Postulation Stage Report</title>
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
                    <span class="card-title">Create Postulation Report</span>
                </div>
                @if($report = Session::get('report'))
                    <div class="card-body">
                        <h2>Report Nº: {{ $report }} successful created!</h2>
                    </div>
                @else
                    <div class="card-body">
                        <form method="POST" action="{{ route('postulation.reported') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                {{ Form::label( $postulation->candidate->name ) }}
                                {{ Form::hidden('candidate_id', $postulation->candidate_id, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Current Status: '.$postulation->status->status) }}
                                {{ Form::hidden('status_id', $postulation->status_id, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Position Applied: '.$postulation->position->description) }}
                                {{ Form::hidden('position_id', $postulation->position_id, ['class' => 'form-control']) }}
                                {{ Form::hidden('candidate_email', $postulation->candidate->email, ['class' => 'form-control']) }}
                                {{ Form::hidden('company_email', $postulation->position->company->email, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Observations') }}
                                <div class="card-body">
                                <textarea id="observations" name="observations" rows="8" cols="100">
                                    The candidate pass to next stage...
                                </textarea>
                            <div>
                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </form>
                    </div>
                @endisset
                <div class="">
                    <a class="btn btn-sm btn-primary " href="/recruiter">Back to Openings</a>
                </div>
            </div>
        </div>
    </div>
</body>
