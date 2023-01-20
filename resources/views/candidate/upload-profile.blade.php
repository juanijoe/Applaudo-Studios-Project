<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Candidate Edit Profile</title>
    <style>
        .container {
            max-width: 500px;
        }

        dl,
        ol,
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
    <header style="background-color: #FFFFFF;">
        <div class="nav-item text-right">
            @isset($user)
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <a href="/login/candidate" class="outline-btn" title="Login">Login</a>
            @endisset
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <a @isset($user) href="/candidate" class="outline-btn" title="home" @else href="/" class="outline-btn"
                title="home" @endisset>
                <div class="container text-left">
                    <div class="mktoText" id="header">
                        <div><img
                                src="https://innovationsoftheworld.com/wp-content/uploads/2019/08/logo-applaudo-studios_019cccde.png"
                                height="100"><br></div>
                    </div>
                </div>
            </a>
        </nav>
    </header>
</head>
@isset($user)
    <h2>Hi {{ $user->name }}!</h2>
@endisset

<body>
    <div class="container mt-5">
        <h2 class="text-center mt-10">Candidate Edit Profile</h2>
    </div>
    <div class="container mt-5">
        <h3 class="text-center mb-5">Upload resume file (.pdf) </h3>
        <form action="{{route('candidate.editProfile')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if($file = Session::get('file'))
                <div class="alert alert-success">
                    <h3 class="text-center"><strong>{{ Session::get('success') }}</strong></h3>
                </div>
            @else
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload File
            </button>
            @endif
        </form>
    </div>
    <div class="card-body">
        <a class="btn btn-sm btn-primary " href="/candidate/profile">Back to Profile</a>
    </div>
</body>

</html>
