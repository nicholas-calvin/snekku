<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img class="img-fluid" src="{{asset('assets/Logo/product.png')}}" alt="" style="object-fit:cover">
                    </div>
    
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="logo">
    
                            </div>
                            <h3 class="mb-4">Register Your Account</h3>
                            <form action="/register" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="firstName">First Name</label>
                                    <input type="firstName" class="form-control @error('firstName') is-invalid @enderror" name="firstName" id="firstName" placeholder="First Name" required value="{{old('firstName')}}">
                                    @error('firstName')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
    
                                <div class="form-group mb-2">
                                    <label for="lastName">Last Name</label>
                                    <input type="lastName" class="form-control @error('lastName') is-invalid @enderror" name="lastName" id="lastName" placeholder="Last Name" required value="{{old('lastName')}}">
                                    @error('lastName')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input type="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" required value="{{old('phoneNumber')}}">
                                    @error('phoneNumber')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" required value="{{old('email')}}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="Password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                                    @error('confirmPassword')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
    
                                <div class="d-grid mb-4">
                                    <button type="submit" class="btn btn-block btn-lg btn-dark">Register</button>
                                </div>

                                <!-- <div class="form-check">
                                    <input class="form-check-input @error('flexCheckDefault') is-invalid @enderror" type="checkbox" value="" id="flexCheckDefault" name="flexCheckDefault">
                                    <label class="form-check-label" for="flexTermsAndCondition">
                                    Agree to the <a href="" class="link-secondary">Terms & Condition</a>
                                    </label>
                                    @error('flexCheckDefault')
                                    <div class="invalid-feedback">
                                        You need to agree with the terms & condition
                                    </div>
                                    @enderror
                                </div> -->
                            </form>
                            <p class="mt-2">
                                Already registered?
                                <a href="/login" class="link-dark">Login</a>
                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>


