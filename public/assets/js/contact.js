
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

