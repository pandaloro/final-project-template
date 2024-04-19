<html>
    <head>
        <script type="text/javascript" src="./assets/js/homepage.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cape Cod Bay Sailing</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/styles/homepage.css">
</head>

<body>

    
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Cape Cod Sailing</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#services">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact-view">Contact</a>
            </li>
        </ul>
    </div>
</nav>


<div id="home" class="container-fluid py-5 text-center" style="background-image: url('https://thebestcamps.com/camp-admin/camp-images/2672-large.jpg'); background-size: cover; background-position: center; color: white; min-height: 600px;">
    <h1 class="display-4">Experience the Beauty of Sailing</h1>
    <h6 class="lead">Join us for an unforgettable sailing adventure in Cape Cod Bay.</h6>
    <a href="#services" class="btn btn-primary btn-lg">Learn More</a>
</div>


    
    <div id="about" class="container mt-5">
        <h2 class="text-center">About Us</h2>
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>

    
    <div id="services" class="container mt-5">
        <h2 class="text-center">Our Services</h2>
        <div class="row mt-4" id="cards-container">
        </div>
    </div>

   
    <div id="testimonials" class="container mt-5">
        <h2 class="text-center">What Our Customers Say</h2>
        <div class="row mt-4" id="posts-container">
        </div>
    </div>
    <script>
            $(document).ready(function () {
            $.ajax({
                url: `http://localhost:8888/cards`,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#cards-container').html('');
            
                    $.each(data, function (key, value) {
                        $('#cards-container').append(`
                        <div class="col-md-4">
                            <div class="card">
                                <img src="${value['img']}" class="card-img-top" alt="..." style="height: 450px;">
                                <div class="card-body">
                                    <h5 class="card-title">${value['card_title']}</h5>
                                    <p class="card-text">${value['card_text']}</p>
                                </div>
                            </div>
                        </div>`)
                    });
                }
            })
        })
    </script>
    <script>
            $(document).ready(function () {
            $.ajax({
                url: `http://localhost:8888/posts`,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#posts-container').html('');
            
                    $.each(data, function (key, value) {
                        $('#posts-container').append(`
                            <div class="col md-4">
                            <blockquote class="blockquote">
                             <p> ${value['description']} </p>
                             <footer class="blockquote-footer"> ${value['name']} </footer>
                            </blockquote>    
                            </div>      
                        `)
                    });
                }
            });
        })
        </script>
    
    <h2 class="text-center">Our Location</h2>
    <div class="embed-responsive embed-responsive-16by9 mt-4">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1660.2224936106056!2d-70.07039185341694!3d41.77196554679268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89fb41c6e85ec9e1%3A0x839eb705d193fa85!2sPoint%20of%20Rocks%20Landing%20Beach!5e1!3m2!1sen!2sus!4v1712890773941!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>



    
    <footer class="bg-dark text-white py-4">
        <div class="container">
        <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2024 Cape Cod Sailing. All Rights Reserved.</p>
                    <p>Follow us on <a href="#">Facebook</a> | <a href="#">Instagram</a></p>
                </div>
                <div class="col-md-6 text-right">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
</body>
</html>


