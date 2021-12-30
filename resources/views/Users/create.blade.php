

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  <h2>{{trans('web.re')}}</h2>
  <form  action="{{ url('/Users/Store') }}" method="post">

    @csrf

  <div class="form-group">
    <label for="exampleInputName">{{trans('web.name')}}</label>
    <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name" value="{{ old('name') }}">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">{{trans('web.email')}}</label>
    <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">{{trans('web.password')}}</label>
    <input type="password"  name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword">{{trans('web.department')}}</label>
    <select   name="dep_id"  class="form-control">

        @foreach ($departments as  $value)
         <option value="{{$value->id}}">{{$value->title}}</option>
        @endforeach

    </select>
  </div>


  <button type="submit" class="btn btn-primary">{{trans('web.save')}}</button>
</form>
</div>

</body>
</html>
