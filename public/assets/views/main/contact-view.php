<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Posts</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="/assets/styles/posts-view.css">
    </head>
    <body>


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
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="contact-view">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container posts-form margin-thirty">
            <a href="http://localhost:8888" class="link">Home</a>
            <h2 class="margin-thirty">Add Post</h2>
            <form id="form-id">
                <div class="form-group margin-twenty">
                    <label for="title" id="title-label">Title</label>
                    <label id="title-error"></label>
                    <input type="text" class="form-control" id="title"
                           placeholder="Enter Title">
                </div>
                <div class="form-group margin-ten">
                    <label for="description" id="description-label">Description</label>
                    <label id="description-error"></label>
                    <input type="text" class="form-control" id="description"
                           placeholder="Enter Description">
                </div>

                <button type="submit" class="btn btn-primary submit-button margin-twenty">Submit</button>
            </form>
        </div>

        <script>

            $(document).ready(function () {

                $('#form-id').on('submit', function (e) {
                    e.preventDefault();
                    const title = $('#title').val();
                    const description = $('#description').val();

                    const data = {
                        title,
                        description,
                    }
                    $.ajax({
                        url: `http://localhost:8888/posts`,
                        type: "POST",
                        data: data,
                        dataType: "json",
                        success: function (data) {
                            console.log(data)
                            window.location.replace("/");
                        },
                        error: function (data){
                            console.log(data.responseJSON)
                            $('#title-error').html('')
                            $('#description-error').html('')
                            $('#title').removeClass('error-border')
                            $('#description').removeClass('error-border')
                            if (data.responseJSON?.titleRequired) {
                                $('#title').addClass('error-border')
                                $('#title-error').append(` <span class='error-text'>${data.responseJSON?.titleRequired}</span>`)
                            }
                            if (data.responseJSON?.descriptionShort) {
                                $('#title').addClass('error-border')
                                $('#title-error').append(` <span class='error-text'>${data.responseJSON?.titleShort}</span>`)
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

    </body>
</html>
