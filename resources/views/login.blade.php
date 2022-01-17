<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="h-100">
    @if(session()->has('success'))  
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('loginError')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img class="img-fluid" src="assets/Logo/product.png" alt="" style="padding: 1em;">
                    </div>
    
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="logo">
                            </div>
                            <h3 class="mb-4">Sign into your account</h3>
                            <form action="\login" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email address" autofocus required value="{{old('email')}}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
    
                                <div class="form-group mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                </div>
    
                                <div class="d-grid mb-4">
                                    <button type="submit" class="btn btn-block btn-lg btn-dark">Login</button>
                                </div>
                            </form>
    
                            <a href="" class="link-secondary">Forgot password?</a>
                            <p class="mt-2">
                                Dont have account?
                                <a href="/register" class="link-dark">Register here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>


