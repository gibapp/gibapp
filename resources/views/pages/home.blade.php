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
        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" onclick="windows">
            <span class="fa fa-bars text-primary"></span>
        </button>
        <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
            <div class="navbar-nav navbar-choice">
                <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('getItemForUser') }}" class="nav-item nav-link">Lost</a>
            </div>
            <div class="d-flex m-3 me-0">
                <a href="{{ url('/admin') }}" class="my-auto">
                    <i class="fas fa-user fa-2x"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="page-box">
        <div class="home-design">
            <div class="navbar-brand">
                <h1 class="text-primary display-6 text-center home-big-text">Gibapp</h1>
                <p class="text-center home-small-text">Find it fast. Claim it back.</p>
                <!-- Search Bar -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Find your item" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
