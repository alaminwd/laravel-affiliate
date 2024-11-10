<script>
    $(document).ready(function () {


        // add seo
        $('.add_seo').click(function (e) {
            e.preventDefault();

            let slug = $('#slug').val();
            let title = $('#title').val();
            let description = $('#description').val();
            let keywords = $('#keywords').val();
            let published_time = $('#published_time').val();
            let modified_time = $('#modified_time').val();
            let author = $('#author').val();
            let canonical = $('#canonical').val();
            let og_locale = $('#og_locale').val();
            let og_url = $('#og_url').val();
            let og_type = $('#og_type').val();
            let twitter_card = $('#twitter_card').val();
            let twitter_site = $('#twitter_site').val();
            let twitter_label = $('#twitter_label').val();
            let twitter_data = $('#twitter_data').val();
            let img = $('#img')[0].files[0];

            // Validate form inputs
            if (slug.length === 0) {
                toastify().error('Slug is required!');
            } else {
                // Prepare form data for submission
                let formData = new FormData();
                formData.append('slug', slug);
                formData.append('title', title);
                formData.append('description', description);
                formData.append('keywords', keywords);
                formData.append('published_time', published_time);
                formData.append('modified_time', modified_time);
                formData.append('author', author);
                formData.append('canonical', canonical);
                formData.append('og_locale', og_locale);
                formData.append('og_url', og_url);
                formData.append('og_type', og_type);
                formData.append('twitter_card', twitter_card);
                formData.append('twitter_site', twitter_site);
                formData.append('twitter_label', twitter_label);
                formData.append('twitter_data', twitter_data);
                
                if(img){
                    formData.append('img', img);
                }

                // Perform AJAX request
                $.ajax({
                    url: "/seo-create", // Change the URL as needed
                    type: "POST",
                    data: formData,
                    contentType: false, // Important for file upload
                    processData: false, // Important for file upload
                    success: function (res) {
                        if (res.status === 'success') {
                            toastify().success(res.message);
                            loadSeo();
                            $('#addSeo')[0].reset();
                            $('#create_seo').modal('hide');
                        }
                    }
                });
            }
        });


        // get seo
        function loadSeo() {
            $.ajax({
                url: "/get-seo", // Route to fetch services
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');
                    tableData.DataTable().destroy();
                    tableList.empty();

                    $.each(res, function (index, seo) {
                        let imgSrc = 'upload/seo/' + seo.img;
                        let row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${seo.slug.substring(0, 30)}</td>
                            <td>${seo.title.substring(0, 30)}...</td>
                            <td>${seo.description.substring(0,30)}...</td>
                            <td>${seo.og_url}</td>
                            <td><img src="${imgSrc}"></td>
                            <td>
                                <button class="btn btn-info btn-sm edit-seo text-white"
                                data-toggle="modal" data-target="#update_seo"
                                data-id="${seo.id}"
                                data-slug="${seo.slug}"
                                data-title="${seo.title}"
                                data-description="${seo.description}"
                                data-keywords="${seo.keywords}"
                                data-published_time="${seo.published_time}"
                                data-modified_time="${seo.modified_time}"
                                data-author="${seo.author}"
                                data-canonical="${seo.canonical}"
                                data-og_locale="${seo.og_locale}"
                                data-og_url="${seo.og_url}"
                                data-og_type="${seo.og_type}"
                                data-twitter_card="${seo.twitter_card}"
                                data-twitter_site="${seo.twitter_site}"
                                data-twitter_label="${seo.twitter_label}"
                                data-twitter_data="${seo.twitter_data}"
                                data-img="${seo.img}"
                                >Edit</button>
                                <button class="btn btn-danger  btn-sm delete-seo" data-id="${seo.id}">Delete</button>
                            </td>
                        </tr>
                       `;
                        tableList.append(row);
                    })
                    tableData.DataTable({
                        lengthMenu: [5, 10, 15, 20],
                    });

                }
            });
        }

        // Call the function to load services when the page is ready
        loadSeo();


        // seo delete
        $(document).on('click', '.delete-seo', function () {
            let seo_id = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/seo-delete",
                        type: "POST",
                        data: {
                            seo_id: seo_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Seo Successfully deleted .",
                                    icon: "success"
                                });
                                loadSeo();
                            }
                        }
                    });

                }
            });
        });


        // edit seo
        $(document).on('click', '.edit-seo', function () {
            let seo_id = $(this).data('id');
            let slug = $(this).data('slug');
            let title = $(this).data('title');
            let description = $(this).data('description');
            let keywords = $(this).data('keywords');
            let published_time = $(this).data('published_time');
            let modified_time = $(this).data('modified_time');
            let author = $(this).data('author');
            let canonical = $(this).data('canonical');
            let og_locale = $(this).data('og_locale');
            let og_url = $(this).data('og_url');
            let og_type = $(this).data('og_type');
            let twitter_card = $(this).data('twitter_card');
            let twitter_site = $(this).data('twitter_site');
            let twitter_label = $(this).data('twitter_label');
            let twitter_data = $(this).data('twitter_data');
            let img = $(this).data('img');


            $('#seo_id').val(seo_id);
            $('#up_slug').val(slug);
            $('#up_title').val(title);
            $('#up_description').val(description);
            $('#up_keywords').val(keywords);
            $('#up_published_time').val(published_time);
            $('#up_modified_time').val(modified_time);
            $('#up_author').val(author);
            $('#up_canonical').val(canonical);
            $('#up_og_locale').val(og_locale);
            $('#up_og_url').val(og_url);
            $('#up_og_type').val(og_type);
            $('#up_twitter_card').val(twitter_card);
            $('#up_twitter_site').val(twitter_site);
            $('#up_twitter_label').val(twitter_label);
            $('#up_twitter_data').val(twitter_data);

            let imgSrc = 'upload/seo/' + img; // Construct the image source path
            $("#imgblah").attr('src', imgSrc);
        })

        // update seo
        $('.up_seo').click(function (e) {
            e.preventDefault();


            var formData = new FormData();

            // Append regular form fields
            formData.append('seo_id', $('#seo_id').val());
            formData.append('slug', $('#up_slug').val());
            formData.append('title', $('#up_title').val());
            formData.append('description', $('#up_description').val());
            formData.append('keywords', $('#up_keywords').val());
            formData.append('published_time', $('#up_published_time').val());
            formData.append('modified_time', $('#up_modified_time').val());
            formData.append('author', $('#up_author').val());
            formData.append('canonical', $('#up_canonical').val());
            formData.append('og_locale', $('#up_og_locale').val());
            formData.append('og_url', $('#up_og_url').val());
            formData.append('og_type', $('#up_og_type').val());
            formData.append('twitter_card', $('#up_twitter_card').val());
            formData.append('twitter_site', $('#up_twitter_site').val());
            formData.append('twitter_label', $('#up_twitter_label').val());
            formData.append('twitter_data', $('#up_twitter_data').val());

            // Check if image exists and append it to the formData
            var img = $('#up_img')[0].files[0]; // Assuming your image input has id="up_image"
            if (img) {
                formData.append('img', img); // 'image' is the key that will hold the file
            }

            $.ajax({
                url: "/seo-update",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.status === 'success') {
                        toastify().success(res.message);
                        loadSeo();
                        $('#updateSeo')[0].reset();
                        $('#update_seo').modal('hide');
                    }
                }
            });
        });



    });

</script>
