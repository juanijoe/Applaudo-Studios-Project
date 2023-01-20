<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Candidate Postulation Reports</title>
    <style>
        .container {
            max-width: 600px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .card-header {
            text-align:justify;
        }
        .card-header > div {
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
    <h1 class="text-left mt-20">Candidate Postulation Records</h1>
            @if(count($reports)>0)
                @foreach ($reports as $report)
                <div class="container mt-5">
                    <div class="card mt-5">
                        <div class="card-header">
                                <div class="title">Opening Stage: </div>
                            @if($report->status->id == 9)
                                <div class="actual"><h6 style="color:darkred"><strong>{{ $report->status->status }}</strong></h6></div>
                            @else
                                <div class="right"><h6 style="color:cadetblue"><strong>{{ $report->status->status }}</strong></h6> </div>
                            @endif
                        </div>
                        <div class = "card-body">
                            <div class="candidate">Current Candidate: {{ $report->candidate->name }} </div>
                        </div>
                        <div class = "card-body">
                            <div class="position">Current Opening: {{ $report->position->description }} </div>
                        </div>
                        <div class = "card-body">
                            <div class="description">Observations: {{ $report->observations }} </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="container mt-5">
                    <h3 class="text-center mt-10">Currently there is no reports generated</h3>
                </div>
            @endif
            <div class="container mt-5">
                <a class="btn btn-sm btn-primary " href="/recruiter">Back to Openings</a>
            </div>
    </body>
</html>
