<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Admin Event</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>

    <div class="container" style="margin-top: 50px;">
        <div class="row">


            <div class="col-lg-3">

            </div>


            <div class="col-lg-6">
                <h3 class="text-center text-primary"><b>Update Event</b> </h3>
                <div class="form-group">
                    <form action="{{ route('update_event', [$event->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">Nama Event</label>
                            <input type="text" name="event_name" value="{{ $event->event_name }}" id="title"
                                class="form-control">
                        </div>
                        {{-- <div class="form-group mb-3">
                            <label for="title">Destinasi Kategori</label>
                            <select name="event_category" class="form-select" aria-label="Default select">
                                <option selected>Pilih Kategori</option>
                                <option> Pusat Perbelanjaan</option>
                                <option> Monumen</option>
                                <option> Religi</option>
                                <option> Nature and Outdoor</option>
                            </select>
                        </div> --}}
                        <div class="form-group mb-3">
                            <label for="title">Lokasi Event</label>
                            <input type="text" value="{{ $event->event_location }}" name="event_location"
                                id="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">Tanggal Mulai</label>
                            <input type="text" value="{{ $event->tanggal_mulai }}" name="tanggal_mulai"
                                id="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">Tanggal Akhir</label>
                            <input type="text" value="{{ $event->tanggal_akhir }}" name="tanggal_akhir"
                                id="title" class="form-control">
                        </div>                        <div class="form-group mb-3">
                            <label for="title">Penyelenggara</label>
                            <input type="text" value="{{ $event->penyelenggara }}" name="penyelenggara"
                                id="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="event_desc" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="event_desc" id="event_desc" rows="3">{{ $event->event_desc }}</textarea>
                        </div>

                        {{-- <label class="m-2">Images</label>
                        <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]"
                            multiple> --}}

                        @if (count($event->photoevent) > 0)
                            <p>Images:</p>
                            @foreach ($event->photoevent as $img)
                                {{-- <form action="/deleteimage/{{ $img->id }}" method="post">
                            <button class="btn text-danger">X</button>
                            @csrf
                            @method('delete')
                        </form> --}}
                                <img src="{{ asset('/event/' . $img->eventphoto) }}" class="img-responsive"
                                    style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                                <input type="file" id="input-file-now-custom-3" class="form-control m-2"
                                    name="image_{{ $img->id }}">
                            @endforeach
                        @endif

                        <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                    </form>
                </div>
            </div>
        </div>



</body>

</html>
