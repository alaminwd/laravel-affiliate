$(document).ready(function () {

    // web content 
    $.ajax({
        url: "/get-web-content",
        type: 'GET',
        success: function (res) {
            var logoUrl = '/upload/logo/' + res.content.logo;

            // Update the image source dynamically
            $('#logoImg').attr('src', logoUrl);
            $('#footLogo').attr('src', logoUrl);
            $('.footer_left_desp').text(res.content.footer);

            // Update social media links
            $('.footer_fb').attr('href', res.content.facebook);
            $('.footer_twet').attr('href', res.content.twitter);
            $('.footer_link').attr('href', res.content.linkedin);
            $('.footer_ins').attr('href', res.content.instagram);
            

            // contact

            $('.footer_number').text(res.content.number);
            $('.footer_mail').text(res.content.email);
            $('.footer_address').text(res.content.address);
            $('#contact_title').text(res.content.contact_title);
            $('#contact_desp').text(res.content.contact_desp);


        },

    });

    // Dynamic pages
    $.ajax({
        url: '/get-page',
        method: 'GET',
        success: function (response) {
            // Loop through each page and create a link
            response.forEach(function (page) {
                $('#footerMenu').append(`<li><a href="/dynamic-page/${page.slug}" class="foot_menu_link">${page.title}</a></li>`);

            });
        },
        error: function () {
            alert('Failed to load pages.');
        }
    });

    // get category
    // $.ajax({
    //     url: "get-category",
    //     method: "GET",
    //     success: function(navCategory){
    //         navCategory.forEach(function (category) {
    //             $('#dropDown').append(`<li><a class="dropdown-item" href="/category-page/${category.slug}"> ${category.category_name} </a></li>`);
    //         })
    //     }
    // }); 

    // contact 
    $(document).on('click', '.send_msg', function () {
        let name = $('#name').val();
        let email = $('#email').val();
        let desp = $('#desp').val().trim();

        let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

        if (name.length == 0) {
            toastify().error('Name is required!');
        } else if (email.length == 0) {
            toastify().error('Email is required!');
        } else if (!emailPattern.test(email)) {
            toastify().error('Please enter a valid email address!');
        } else if (!desp) {
            toastify().error('Description is required!');
        } else {
            $.ajax({
                url: "create-message",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    desp: desp
                },
                success: function (msg) {
                    if (msg.status === 'success') {
                        toastify().success(msg.message);
                        $('#contactForm')[0].reset();
                    }
                }
            });
        }

    })

    // product search
    $('#search_btn').click(function (e) {
        e.preventDefault();
        var search_input = $('#search_input').val();
        var link = "product-search/" + "?q=" + search_input;
        window.location.href = link;
    });

    // customer Login 
    $(document).on('click', '.pass_login', function () {
        let password = $('#password').val();

        $.ajax({
            url: 'customer-login-post',
            type: 'POST',
            data: {
                password: password
            },
            success: function (customer) {
                if (customer.success) {
                    window.location.href = '/';
                }else{
                    toastify().error('Password is incorect');
                }
            },
            error: function (err) {
                let error = err.responseJSON;
                $.each(error.errors, function (index, value) {
                    toastify().error(value);
                })
            }
        });
    });

})
