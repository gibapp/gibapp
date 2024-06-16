<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light bg-white navbar-expand-xl nav-box">
        <a class="navbar-brand"><h1 class="text-primary display-6">Gibapp</h1></a>
        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars text-primary"></span>
        </button>
        <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
            <div class="navbar-nav navbar-choice">
                <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                <a href="{{ route('getItemForUser') }}" class="nav-item nav-link active">Lost</a>
            </div>
            <div class="d-flex m-3 me-0">
                <a href="{{ url('/admin') }}" class="my-auto">
                    <i class="fas fa-user fa-2x"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="page-box">
        <div class="search-bar">
            <input type="text" class="search-input form-control"/>
            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white"><i class="fas fa-search text-primary"></i></button>
        </div>
        <!-- make a grid which contain image, name of lost item, description, finder, and where it found!-->
        <div class="row">
            @foreach($items as $item)
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 lost-card">
                    <img src="{{ $item->image }}" class="card-img-top lost-card-image" alt="Item Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->item_name }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <p class="card-text"><small class="text-muted">{{ $item->finders_name }}</small></p>
                        <p class="card-text"><small class="text-muted">{{ $item->found_location }}</small></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
