<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>HALAMAN POST</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

<body>
    <section class="navigasi mb-4">
        <nav class="navbar navbar-expand-lg box-navbar" data-bs-theme="white">
            <div class="container p-2">
                <a class="navbar-brand ms-3" href="{{ route('admin') }}">
                    <img src="{{ asset('assets/img/header/surabaya.png') }}" alt="Bootstrap" width="105px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end
                        me-4"
                    id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link"
                                style="font-size: 20px;
                                    font-weight: 500;"
                                href="{{ route('admin') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                style="font-size: 20px;
                                    font-weight: 500;"
                                href="{{ route('destinasi') }}">Destinasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                style="font-size: 20px;
                                    font-weight: 500;"
                                href="{{ route('event') }}">Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                style="font-size: 20px;
                                    font-weight: 500;"
                                href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <section>
        <div class="text-center mb-4">
            <h2 style="color:black"> Event </h2>
        </div>
        <div class="container">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('tambahDestinasi') }}" class="btn btn-primary" role="button"><i
                        class="fa-solid fa-plus"></i> TAMBAH</a></td>
            </div>
            @if (session('gagal'))
                <div class="alert alert-danger">
                    <b> Oops! </b> {{ session('error') }}
                </div>
            @endif

            @if (session('berhasil'))
                <div class="alert alert-success">
                    <b> Hooray! </b> {{ session('berhasil') }}
                </div>
            @endif
            <table class="table table-hover table-bordered table-responsive table-responsive-lg allign-middle mt-1">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Penyelenggara</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Image1</th>
                        <th scope="col">Image2</th>
                        <th scope="col">Image3</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($event as $ev)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $ev->event_name }}</td>
                            <td>{{ $ev->event_location }}</td>
                            <td>{{ $ev->tanggal_mulai }}</td>
                            <td>{{ $ev->tanggal_akhir }}</td>
                            <td>{{ $ev->penyelenggara }}</td>
                            <td>{{ $ev->event_desc }}</td>
                            <td><img src="{{ asset('storage/' . $ev->event_photo1) }}" alt="image" height="40px"
                                    width="40px"></td>
                            <td><img src="{{ asset('storage/' . $ev->event_photo2) }}" alt="image" height="40px"
                                    width="40px"></td>
                            <td><img src="{{ asset('storage/' . $ev->event_photo3) }}" alt="image" height="40px"
                                    width="40px"></td>

                            <td>
                                <div class="row">
                                    <div class="col-5">
                                        <a href="{{ route('editEvent', [$ev->id]) }}" class="btn btn-success" role="button"><i
                                                class="fas fa-edit"></i></a>
                                    </div>
                                    <div class="col-5">
                                        <a href="{{ route('deleteEvent', [$ev->id]) }}" class="btn btn-danger"
                                            role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
