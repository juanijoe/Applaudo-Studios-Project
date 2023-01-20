<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Product File Upload</title>
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
<body>
    <div class="container mt-5">
        <h2 class="text-center mt-10">Import products from a file</h2>
    </div>
    <div class="container mt-5">
        <form action="{{route('fileupload.show')}}" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Upload csv or json File </h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload File
            </button>
        </form>
    </div>
    <div class="container mt-5">
        @if ($message = Session::get('success'))
            <h4 class="text-center mb-1">File Uploaded:</h4>
            <ul>
                <li class="text-left mt-2">Name: <strong>{{ Session::get('name') }}</strong> (updated as {{ Session::get('db_name') }})</li>
                <li class="text-left mt-2">Extension: <strong>{{ Session::get('ext') }}</strong></li>
                <li class="text-left mt-2">Size: <strong>{{ Session::get('size') }} Kb</strong></li>
                <li class="text-left mt-2">Path: <strong>{{ Session::get('path') }}</strong></li>
            </ul>
        @endif
        @if($products = Session::get('products'))
            @if(($items = Session::get('items'))>0)
                <h4 class="text-center mt-5">Products Registered {{$items}}:</h4>
                @foreach ((array)$products as $product)
                    <h5 class="mt-5"><strong>Item:</strong></h5>
                    <ul>
                        <li class="text-left">Name: <strong>{{ $product->name }}</strong></li>
                        <li class="text-left">Description: <strong>{{ $product->description }}</strong></li>
                        <li class="text-left">Type: <strong>{{ $product->type }}</strong></li>
                        <li class="text-left">Price: <strong>{{ $product->price }}</strong></li>
                    </ul>
                @endforeach
            @else
                <h4 class='text-center mt-5'>No products has been found or file format is wrong</h4>
            @endif
        @endif
    </div>
</body>
</html>
