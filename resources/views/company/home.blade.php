<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Company Home</title>
    <style>
        .container {
            max-width: 600px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .openings {
            text-align:justify;
        }
        .openings > div {
            display:inline-block;
            padding: 10px;
        }
        .position-details {
            text-align:justify;
        }
        .position-details > div {
            display:inline-block;
            padding: 15px;
        }
        .nav-bar {
            text-align:justify;
        }
        .nav-bar > a {
            display:inline-block;
            margin: 5px;
            padding: 10px;
        }
    </style>
</head>
<header style="background-color: #FFFFFF;">
	<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <a href="/company" class="outline-btn" title="home">
            <div class="container text-left">
			    <div class="mktoText" id="header"><div><img src="https://innovationsoftheworld.com/wp-content/uploads/2019/08/logo-applaudo-studios_019cccde.png" height="100"><br></div></div>
		    </div>
        </a>
        <div class="nav-bar">
            <a class="btn btn-primary" href="{{ ('company/recruiters') }}">Recruiters Manager</a>
        </div>
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
<h1 class="text-left mt-10">{{ $user->name ?? ''}} Open's Positions</h1>
    <div class="container mt-5">
        @if(count($company_open_positions)>0)
            <div class="openings">
                <div class="title"><h2 class="text-center mt-10">Current Openings</h2></div>
                <div class="opening-button"><a class="btn btn-sm btn-primary" href="{{ route('position.create') }}">Create New Position</a></div>
            </div>
            @foreach ($company_open_positions as $position)
                <div class="card mt-5">
                    <div class="card-header">Position: {{ $position->description }}</div>
                    <div class="card-body">
                        <div class="position-details">
                            <div class="salary">Salary: ${{ $position->salary }}</div>
                            <div class="status">State:</div>
                            @if($position->position_status == 1)
                                <div class="open"><h6 style="color:darkcyan"><strong>Open</strong></h6></div>
                            @else
                                <div class="closed"><h6 style="color:darkred"><strong>Closed</strong></h6></div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-sm btn-primary " href="{{ route('position.show', [$position->id, $url='company'] ) }}"> Opening Details</a>
                        <a class="btn btn-sm btn-primary " href="{{ route('postulation.show', $position->id) }}">See Opening Update Tracking</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('position.edit', $position->id) }}">Edit Opening</a>
                    </div>
                </div>
            @endforeach
        @else
            <h2 class="text-center mt-10">Currently there is no positions</h2>
        @endif
    </div>
    <a href="{{route('company.profile')}}" class="outline-btn">Company Profile</a>
</body>
</html>
