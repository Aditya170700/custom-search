<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Search</title>
</head>

<body>
    <div class="container p-5">
        <div class="d-flex flex-column justify-content-center align-items-center px-5">
            <div class="input-group mb-3">
                <input type="text" class="form-control py-3" placeholder="Keyword" aria-label="Keyword"
                    aria-describedby="search" id="input-search" value="{{ request()->q }}">
                <button class="btn btn-primary" type="button" id="search">Search</button>
            </div>
        </div>
        <div class="px-5">
            <ul class="list-group">
                @foreach ($items as $dt)
                    <li class="list-group-item">
                        <a href="{{ $dt['link'] }}" class="text-decoration-none text-dark" target="_blank">
                            <div class="py-3">
                                <div class="d-flex mb-3">
                                    <img class="rounded-circle me-3"
                                        src="https://ui-avatars.com/api/?name={{ $dt['title'] }}&background=random"
                                        alt="">
                                    <div>
                                        <span class="d-block">{{ $dt['displayLink'] }}</span>
                                        <span class="d-block text-muted">{{ $dt['formattedUrl'] }}</span>
                                    </div>
                                </div>
                                <div class="h4">{{ $dt['title'] }}</div>
                                <span class="text-muted">{{ $dt['snippet'] }}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('document').ready(function() {
            $('#search').on('click', function() {
                var q = $('#input-search').val();

                if (q != '') {
                    window.location.href = `/search?q=${q}`;
                }
            });
        });
    </script>
</body>

</html>
