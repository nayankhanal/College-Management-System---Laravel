
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create college</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

@if (session('success'))
<div class="container">
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
      <p>{{{ session('success') }}}</p>
    </div>
</div>
@endif


@if (session('error'))
<div class="container">
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
      <p>{{{ session('error') }}}</p>
    </div>
</div>
@endif


<div class="container">
  <h2>Login</h2>
  <form class="form-horizontal" action="{{route('login')}}" method="post">
    @csrf
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email">
        @if($errors->has('email'))
        <span class="help-block text-danger" style="color: red;">{{$errors->first('email')}}</span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control @error('email') is-invalid @enderror" id="password" placeholder="Enter password" name="password">
        @if($errors->has('password'))
        <span class="help-block text-danger" style="color: red;">{{$errors->first('password')}}</span>
        @endif
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
