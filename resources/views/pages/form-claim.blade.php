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
    <div class="page-box" style="margin-top: 5rem;">
        <!-- make an aesthetic form which contains image, name of lost item, description, finder, and where it found. Then, add button to claim a lost item with green and rounded rectangle! !-->
        <div class="row justify-content-center">
            <div class="col-lg-8" style="width: 45vw !important;">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h3 class="card-title">Item Claim Form</h3>
                    </div>
                    <div class="card-body">

                        {{-- INI HARUS UPDATE ITEM DI DATABASE --}}
                        <form method="PATCH" action="{{ route('claimItem', $item->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">Identification</label>
                                <input name="image" type="file" class="form-control" id="image" accept="image/*">
                                <img id="previewImage" class="itemPreview" src="">
                            </div>
                            <div class="form-group mb-3">
                                <label for="item_name" class="form-label">Name</label>
                                <input name="item_name" type="text" class="form-control" id="itemName" placeholder="Enter item name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="date" class="form-label">Claim Time</label>
                                <input name="date" type="datetime-local" class="form-control" id="date" value="{{ (new \DateTime('now',
                                                                                                                          new \DateTimeZone('GMT+07:00')))->format('Y-m-d H:m:s')}}">
                            </div>
                            <button type="submit" class="btn btn-success w-100 rounded-pill">Submit Form</button>
                        </form>
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

