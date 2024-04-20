<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cape Cod Bay Sailing - Contact</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/styles/contact.css">
    
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/#">Cape Cod Sailing</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/#">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contact-view">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contact Form Section -->
    <section class="contact-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">Get in Touch</h2>
                    <p class="lead">We'd love to hear from you! Send us a message using this form.</p>
                </div>
                <div class="col-md-6">
                    <form id="form-id">
                        <div class="form-group">
                            <label id="name-error"></label> 
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name"
                                required>
                        </div>
                        <div class="form-group">
                            <label id="email-error"></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email"
                                required>
                        </div>
                        <div class="form-group">
                            <label id="phone-error"></label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Your Phone Number"
                                required>

                        </div>
                        <div class="form-group">
                            <label id="description-error"></label>
                            <textarea class="form-control" id="description" name="description" rows="4"
                                placeholder="Your Message" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            <script>
            $(document).ready(function () {

$('#form-id').on('submit', function (e) {
    e.preventDefault();
    const name = $('#name').val();
    const email = $('#email').val();
    const phone = $('#phone').val();
    const description = $('#description').val();
   
    const data = {
        name,
        email,
        phone,
        description,
    }
    $.ajax({
        url: `http://localhost:8888/contact-view`,
        type: "POST",
        data: data,
        dataType: "json",
        success: function (data) {
            console.log(data)
            window.location.replace("/");
        },
        error: function (data){
            console.log(data.responseJSON)
            $('#name-error').html('')
            $('#email-error').html('')
            $('#phone-error').html('')
            $('#name').removeClass('error-border')
            $('#email').removeClass('error-border')
            $('#phone').removeClass('error-border')
            $('#description').removeClass('error-border')
            if (data.responseJSON?.nameRequired) {
                $('#name').addClass('error-border')
                $('#title-error').append(` <span class='error-text'>${data.responseJSON?.titleRequired}</span>`)
            }
            if (data.responseJSON?.emailRequired) {
                $('#email').addClass('error-border')
                $('#title-error').append(` <span class='error-text'>${data.responseJSON?.emailRequired}</span>`)
            }
            if (data.responseJSON?.phoneRequired) {
                $('#phone').addClass('error-border')
                $('#phone-error').append(` <span class='error-text'>${data.responseJSON?.phoneRequired}</span>`)
            }
            if (data.responseJSON?.descriptionRequired) {
                $('#description').addClass('error-border')
                $('#description-error').append(` <span class='error-text'>${data.responseJSON?.descriptionRequired}</span>`)
            }
            if (data.responseJSON?.descriptionShort) {
                $('#description').addClass('error-border')
                $('#description-error').append(` <span class='error-text'>${data.responseJSON?.descriptionShort}</span>`)
            }
        }
    });
})

})
            </script>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2024 Cape Cod Sailing. All Rights Reserved.</p>
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

    <!-- JavaScript -->

</body>

</html>
