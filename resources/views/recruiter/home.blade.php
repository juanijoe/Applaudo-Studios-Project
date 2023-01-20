

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Recruiter Home</title>
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
@isset($user)
    <h2>Hi {{ $user->name }}!</h2>
@endisset
<body>
    <div class="container mt-5">
        <h2 class="text-center mt-10">Openings in charge</h2>
        @foreach ($recruiter_positions_in_charge as $position)
            <div class="card mt-5">
                <div class="card-header">Position: {{ $position->description }}</div>
                <div class="card-body">Salary: ${{ $position->salary }}</div>
                <div class="card-body">
                    <a class="btn btn-sm btn-primary " href="{{ route('position.show', [$position->id, $url='recruiter'] ) }}"> Opening Details</a>
                    <a class="btn btn-sm btn-primary " href="{{ route('postulation.show', $position->id) }}">See Opening Postulations</a>
                </div>
            </div>
        @endforeach
    </div>
</body>

