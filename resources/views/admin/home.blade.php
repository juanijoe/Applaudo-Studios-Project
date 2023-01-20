<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Admin Home</title>
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
        <a href="/" class="outline-btn" title="home">
            <div class="container text-left">
			    <div class="mktoText" id="header"><div><img src="https://innovationsoftheworld.com/wp-content/uploads/2019/08/logo-applaudo-studios_019cccde.png" height="100"><br></div></div>
		    </div>
        </a>
        <div class="nav-bar">
            <a class="btn btn-primary" href="{{ ('admin/companies') }}">Companies Manager</a>
            <a class="btn btn-primary" href="{{ ('admin/recruiters') }}">Recruiter Manager</a>
            <a class="btn btn-primary" href="{{ ('admin/candidates') }}">Candidates Manager</a>
            <a class="btn btn-primary" href="{{ ('admin/positions') }}">Positions Manager</a>
            <a class="btn btn-primary" href="{{ ('admin/postulations') }}">Postulations Manager</a>
            <a class="btn btn-primary" href="{{ ('admin/roles') }}">Roles Manager</a>
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
    <h1 class="text-left mt-10">{{ $user->name ?? ''}} Admin Manager</h1>
<body>
