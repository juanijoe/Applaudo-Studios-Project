<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Candidate Home</title>
    <style>
        .container {
            max-width: 800px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .document{
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
<header style="background-color: #FFFFFF;">
	<div class="nav-item text-right">
        @isset($user)
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
        @endisset
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
    @isset($user)
        <h2>Hi {{ $user->name }}!</h2>
    @endisset
<body>
    <div class="container mt-5">
        <h2 class="text-center mt-10">Candidate Profile</h2>
    </div>
    @isset($file)
    <div class="container mt-5">
        <h4 class="text-center mb-2">Last Cv uploaded:</h4>
        <div class="card-body">
            <a class="btn btn-primary btn-primary " href="{{ route('candidate.uploadProfile') }}">Change Cv File</a>
            <a class="btn btn-danger btn-primary " href="{{ route('candidate.delete') }}">Delete Cv File</a>
        </div>
    </div>
    <div class="document">
        <iframe width="800" height="800" src="/files/{{ $file->cvfile_name }}"></iframe>
    </div>
    @else
    <div class="container mt-5">
        @if( $message = Session::get('message'))
            <div class="alert alert-danger">
                <h3 class="text-center"><strong>{{ $message }}</strong></h3>
            </div>
        @endif
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
            <h5> Preview your last resume submited</h5>
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
    @endisset
    <div class="card-body">
        <a class="btn btn-sm btn-primary " href="/candidate">Back to Home</a>
    </div>
</body>
</html>
