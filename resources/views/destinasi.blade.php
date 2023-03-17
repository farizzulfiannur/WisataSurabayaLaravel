<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wisata Surabaya</title>
    <link rel="shortcut icon" href="assets/img/header/logos.png" />

    <!-- CDN Vue JS -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/menuzord.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/star.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <style>
        /* Tambahan Header */
        .caption_overlay {
            position: absolute;
            left: 50%;
            transform: translate(-50%, -50%);
            top: 50%;
            color: white;
            z-index: 100;
        }
        .w-100 {
            width: 100%;
        }
        .animated-title {
            font-family: inherit;
            position: relative;
            height: 100px;
            width: 100%;
            text-align: center;
        }
        .caption_overlay_title {
            font-size: 70px;
            font-weight: bold;
        }
        .caption_overlay_subtitle {
            font-size: 35px;
            font-weight: bold;
        }
        .text-top {
            height: 45%;
        }
        .my-10 {
            margin-top: 6.25rem !important;
            margin-bottom: 6.25rem !important;
        }
        .container-shortcut {
            display: inline-block;
        }
        .group-shortcut {
            margin-right: 1.5em;
            margin-left: 1.5em;
        }
        .btn-shortcut {
            height: 100px;
            width: 100px;
            padding: 13px 7px;
            position: relative;
            color: white;
            text-decoration: none;
            border-radius: 120px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .testing {
            border: 2px solid green;
            background: red;
        }
        .padding-section {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }
        .image {
            border-radius: 20px;
        }
        /* .fullwidthbanner-container {
            width: 100%;
            position: relative;
            padding: 0;
            overflow: hidden;
        } */
    </style>
</head>

<body>

    <section>
        <div class="row">
            @foreach ($destinasi as $item)
            <div class="d-flex ">
                <p class="text-danger">{{$item->id}}</p>
                <p class="text-info">{{$item->dest_name}}</p>
                <img src="{{ asset('destinasi/' . $item->photodests[0]->destphoto) }}" alt="image" height="40px"
                                            width="40px">
            </div>
            @endforeach
            {{ $destinasi->links() }}
        </div>
    </section>

    <!-- Footer -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"
        style="transform:rotate(180deg);margin-bottom:-1px">
        <path class="elementor-shape-fill" fill="#4a4a8a" opacity="0.33"
            d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7
            c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z">
        </path>
        <path class="elementor-shape-fill" fill="#4a4a8a" opacity="0.66"
            d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1
            s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z">
        </path>
        <path class="elementor-shape-fill" fill="#4a4a8a"
            d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0
            h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z">
        </path>
    </svg>
    <footer class="footer">
        <div class="pb-3" style="background: #4a4a8a;">
            <div class="container">

                <!-- Find Us -->
                <div class="row">
                    <div class="col-3 mb-5 mt-5 ms-4">
                        <div class="title-tag mb-5">
                            <h6>FIND US</h6>
                        </div>
                        <div class="footer-link mb-2">
                            <a href="#">
                                Tourism Information Center <br>
                                Jl. Gubernur Suryo 15
                            </a>
                        </div>
                        <div class="hubungi-kami">
                            <button>
                                <a href="#"
                                    class="btn btn-white
                                    font-weight-bold
                                    telpon-icon">
                                    <i
                                        class="fa fa-fw fa-phone
                                        telpon-icon"></i>
                                    Kontak Kami
                                </a>
                            </button>
                        </div>
                        <div class="icon mt-3">
                            <button type="button" class="btn btn-light" style="border-radius: 30px;">
                                <div>
                                    <i
                                        class="fa-brands fa-facebook
                                        facebook-icon"></i>
                                </div>
                            </button>
                            <button type="button" class="btn btn-light
                                ms-3"
                                style="border-radius: 30px;">
                                <div>
                                    <i class="fa-brands fa-instagram "></i>
                                </div>
                            </button>
                        </div>
                    </div>

                    <!-- Contact Us -->
                    <div class="col-4 mb-5 mt-5">
                        <div class="title-tag mb-5">
                            <h6>CONTACT US</h6>
                        </div>
                        <div class="footer-link mb-2">
                            <p>
                                Dinas Kebudayaan, Kepemudaan dan
                                Olahraga <br />serta
                                Pariwisata Kota Surabaya Kota Surabaya
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-2 footer-link">
                                <span
                                    class="fa fa-lg fa-fw
                                    fa-map-marker-alt"></span>
                            </div>
                            <div class="col-10">
                                <p>
                                    Jl. Tunjungan No.1-3 Kelurahan
                                    Genteng <br />
                                    Kecamatan Genteng, Kota Surabaya<br />
                                    Jawa Timur, Indonesia, 60275
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 footer-link">
                                <span class="fa fa-lg fa-fw fa-phone"></span>
                            </div>
                            <div class="col-10">
                                <p>
                                    031-5318409
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 footer-link">
                                <span class="fa fa-lg fa-fw
                                    fa-envelope"></span>
                            </div>
                            <div class="col-10">
                                <p>
                                    disbudporapar@surabaya.go.id
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Our Other Sites -->
                    <div class="col-3 mb-5 mt-5">
                        <div class="title-tag mb-5">
                            <h6>OUR OTHER SITES</h6>
                        </div>
                        <div class="footer-link mb-3">
                            <a href="#">
                                Disbudporapar <br />Surabaya
                            </a>
                        </div>
                        <div class="footer-link mb-2">
                            <a href="#">
                                360° Surabaya
                            </a>
                        </div>
                        <div class="footer-link mb-2">
                            <a href="#">
                                Tiket Wisata Surabaya
                            </a>
                        </div>
                        <div class="footer-link mb-3">
                            <a href="#">
                                Katalog Museum <br /> Surabaya
                            </a>
                        </div>
                        <div class="footer-link mb-3">
                            <a href="#">
                                Bangga Surabaya
                            </a>
                        </div>
                    </div>

                    <!-- Wisata Surabaya -->
                    <div class="col-1 mb-5 mt-5">
                        <div class="title-tag mb-5">
                            <h6>WISATA SURABAYA</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
