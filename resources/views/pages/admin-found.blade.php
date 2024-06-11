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
    <nav class="navbar navbar-light bg-white navbar-expand-xl">
        <a class="navbar-brand"><h1 class="text-primary display-6">Gibapp</h1></a>
        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars text-primary"></span>
        </button>
        <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
            <div class="navbar-nav navbar-choice">
                <a href="{{ url('/admin') }}" class="nav-item nav-link">Home</a>
                <a href="{{ url('/admin-lost') }}" class="nav-item nav-link">Lost</a>
                <a href="{{ url('/admin-found') }}" class="nav-item nav-link active">Found</a>
            </div>
            <div class="d-flex m-3 me-0">
                <button class="btn btn-secondary" onclick="window.location.href='{{ url('/') }}'">Logout</button>
            </div>
        </div>
    </nav>

    <div class="page-box">
        <!-- make an aesthetic form which contains image, name of lost item, description, finder, and where it found. Then, add button to claim a lost item with green and rounded rectangle! !-->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h3 class="card-title">Report a Found Item</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group mb-3">
                                <label for="itemImage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="itemImage" accept="image/*">
                                <img id="previewImage" src="" style="margin-top:20px;">
                            </div>
                            <div class="form-group mb-3">
                                <label for="itemName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="itemName" placeholder="Enter item name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="itemCategory" class="form-label">Category</label>
                                <input type="text" class="form-control" id="itemCategory" placeholder="Enter item name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="itemDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="itemDescription" rows="3" placeholder="Describe the item"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="finderName" class="form-label">Found by</label>
                                <input type="text" class="form-control" id="finderName" placeholder="Enter the name of the person who found the item">
                            </div>
                            <div class="form-group mb-3">
                                <label for="foundLocation" class="form-label">Found Location</label>
                                <input type="text" class="form-control" id="foundLocation" placeholder="Enter the location where the item was found">
                            </div>
                            <div class="form-group mb-3">
                                <label for="foundDate" class="form-label">Found Time</label>
                                <input type="datetime-local" class="form-control" id="foundDate" value="{{ (new \DateTime('now',
                                                                                                                          new \DateTimeZone('GMT+07:00')))->format('Y-m-d H:m:s')}}">
                            </div>
                            <button type="submit" class="btn btn-success w-100 rounded-pill">Submit Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    const itemImageInput = document.getElementById('itemImage');
    const previewImage = document.getElementById('previewImage');

    itemImageInput.addEventListener('change', function() {
        const file = itemImageInput.files[0];
        const reader = new FileReader();

        reader.onload = function(event) {
            previewImage.src = event.target.result;
        };

        reader.readAsDataURL(file);
    });
</script>
</body>
</html>
