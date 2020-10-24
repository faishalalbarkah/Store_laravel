@section('title', 'Login Admin')
    <html>

    <head>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" type="text/css" />
    </head>

    <body class="body">
        <form class="form-login-admin" method="post" action="{{ asset ('admin/dashboard')}}">
            {{ csrf_field() }}
            <h1>Login Admin</h1>
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" name="name"  class="form-control inputlogin" id="exampleInputEmail1" aria-describedby="emailHelp">
                
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password"  password="password" class="form-control inputlogin" id="exampleInputPassword1">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </body>

    </html>
