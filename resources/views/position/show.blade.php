<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Opening Details</title>
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
	<div class="nav-item text-right">
        @if(Auth::guard('candidate')->user())
            <a href="/candidate/profile" class="outline-btn" title="Upload Cv">Upload Cv</a>
            <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="/login/candidate" class="outline-btn" title="Login">Login</a>
        @endif
    </div>
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
        <h2 class="text-center mt-10">Opening Details</h2>
            <div class="card mt-5">
                <div class="card-header">Position: {{ $position->description }}</div>
                <div class="card-body">Company: {{ $company->name }}</div>
                <div class="card-body">Published on: {{ ($company->created_at)->format('m-d-Y') }}</div>
                <div class="card-body">Salary: ${{ $position->salary }}</div>
                <div class="card-body">
                    <a class="btn btn-sm btn-primary " href="/{{ $url }}">Back to {{ ucfirst($url) }} Openings</a>
                </div>
            </div>
    </div>
</body>
</html>
