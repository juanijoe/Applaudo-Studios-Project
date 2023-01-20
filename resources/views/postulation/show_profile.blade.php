<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Candidate Profile Overview</title>
    <style>
        .container {
            max-width: 800px;
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
        .document{
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
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
    <h1 class="text-left mt-20">Candidate Profile Overview: {{ $candidate->name }}</h1>
        @isset($candidate->cv->cvfile_name)
            <div class="container mt-5">
                <h2 class="text-center mt-20">Actual Resume:</h2>
            </div>
            <div class="document">
                <iframe width="800" height="800" src="/files/{{ $candidate->cv->cvfile_name }}"></iframe>
            </div>
        @else
            <div class="container mt-5">
                <h2 class="text-center mt-20">Currently there is no profile updated</h2>
            </div>
        @endisset
            <div class="container mt-5">
                <a class="btn btn-sm btn-primary " href="{{ route('recruiter.home') }}">Back to Openings</a>
            </div>
    </body>
</html>
