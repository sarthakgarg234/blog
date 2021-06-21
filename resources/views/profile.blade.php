<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
    <form action="{{ url('user_profile') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
    <div class="container">
            <div class="col-md-5">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="col-md-5">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="enter your email">
            </div>
            <div class="col-md-5">
                <strong>Address:</strong>
                <input type="text" name="address" class="form-control" placeholder="enter your address">
            </div>
            <div class="col-md-5">
                <strong>Submit:</strong>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
    </div>
    </form>
    <div class="container">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</body>
</html>