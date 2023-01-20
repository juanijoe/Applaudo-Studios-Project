<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Postulations Status Monitor</title>
    <style>
        .container {
            max-width: 600px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .card-body {
            text-align:justify;
        }
        .card-body > div {
            display:inline-block;
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
    <h1 class="text-left mt-20">Postulations Tracking Command Board</h1>
        <div class="container mt-5">
            <h2 class="text-center mt-20">Opening: {{ $position->description }} - {{ $position->company->name }}</h2>
        </div>
            @if(count($postulations)>0)
                @foreach ($postulations as $postulation)
                <div class="container mt-5">
                    <div class="card mt-5">
                        <div class="card-header">Candidate: {{ $postulation->candidate->name }}
                            <form method="POST" action="{{ route('postulation.showReport') }}"  role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    {{ Form::hidden('candidate_id', $postulation->candidate_id, ['class' => 'form-control']) }}
                                    {{ Form::hidden('position_id', $position->id, ['class' => 'form-control']) }}
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary mt-2">See Candidate Reports</button>
                                </div>
                            </form>
                            <div class="box-footer mt20">
                                <a class="btn btn-primary mt-2" href="{{ route('postulation.showProfile', $postulation->candidate_id) }}">See Candidate Profile</a>
                            </div>
                        </div>
                        @if(($message = Session::get('success')) && (Session::get('postulation_update') == $postulation->id))
                            <div class="card-body">Status:
                                <div class="previous"><h5 style="color:dimgrey"><strong>{{ Session::get('previous_status') }}</strong></h5></div>
                                <div class="pass"> -> </div>
                                @if($postulation->status->id == 9)
                                    <div class="actual"><h5 style="color:darkred"><strong>{{ $postulation->status->status }}</strong></h5></div>
                                @else
                                    <div class="actual"><h5 style="color:steelblue"><strong>{{ $postulation->status->status }}</strong></h5></div>
                                @endif
                            </div>
                            <div class="card-body">
                                <h3 style="color:forestgreen">{{ $message }}</h3>
                            </div>
                        @else
                        <div class = "card-body">
                            <div class="left">Current Status: </div>
                            @if($postulation->status->id == 9)
                                <div class="actual"><h6 style="color:darkred"><strong>{{ $postulation->status->status }}</strong></h5></div>
                            @else
                                <div class="right"><h6 style="color:cadetblue"><strong>{{ $postulation->status->status }}</strong></h6> </div>
                            @endif
                        </div>
                        @auth('recruiter')
                            <div class="card-body">
                                <form action="{{ route('postulation.received', $postulation->id) }}" method="POST" role="form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Next Stage</label>
                                        <select name="status" id="selectStatus" class="form-control">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}">{{ $status->status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Change Status</button>
                                </form>
                            </div>
                        @endauth
                        @endif
                        @auth('recruiter')
                            <div class="card-body">
                            <a class="btn btn-primary mt-2" href="{{ route('postulation.report', $postulation->id) }}">Generate Stage Report</a>
                            <a class="btn btn-primary mt-2" href="{{ route('postulation.mailer', $postulation->id) }}">Send Email to Candidate</a>
                        </div>
                        @endauth
                    </div>
                </div>
                @endforeach
            @else
                <div class="container mt-5">
                    <h3 class="text-center mt-10">Currently there is no postulations for this opening</h3>
                </div>
            @endif
            <div class="container mt-5">
                <a class="btn btn-sm btn-primary " href="/recruiter">Back to Openings</a>
            </div>
    </body>
</html>
