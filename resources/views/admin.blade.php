<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <form action="{{ url('admin') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
    <div class="container">
            <div class="col-md-8">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="col-md-8">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="enter your email">
            </div>
            <div class="col-md-8">
                <strong>Address:</strong>
                <input type="text" name="address" class="form-control" placeholder="enter your address">
            </div>
            <div class="col-md-8">
                <strong>Category:</strong>
                <input type="text" name="category" class="form-control" placeholder="enter your category">
            </div>
            <div class="col-md-8">
                <strong>Gender:</strong>
                <input type="text" name="gender" class="form-control" placeholder="enter your gender">
            </div>
            <div class="col-md-8">
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
                <th scope="col">Category</th>
                <th scope="col">Gender</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->address}}</td>
                    <td>{{$admin->category}}</td>
                    <td>{{$admin->gender}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
</body>
</html>