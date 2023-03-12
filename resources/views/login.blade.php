<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
            <div class="text-center">
              <h1 class="mb-2">Login Form</h1>
              <hr>
            </div>
            @if (session('gagal'))
                <div class="alert alert-danger">
                    <b> Oops! </b> {{ session('gagal') }}
                </div>
            @endif

            @if (session('berhasil'))
                <div class="alert alert-success">
                    <b> Hooray! </b> {{ session('berhasil') }}
                </div>
            @endif

            <form action="{{ route('prosesLogin') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                        </div>
                        <div class="col-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 mt-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </div>
            </form>
            <p style="font-weight: 500"> Belum Punya Akun <a href="{{ route('register') }}"> Daftar Disini </a></p>
    </div>
    {{-- Bootstrap CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
