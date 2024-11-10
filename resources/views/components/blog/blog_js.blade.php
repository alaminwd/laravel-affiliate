<script>
    $(document).ready(function () {
        
        // summernote
        $('#desp').summernote();

         // Event listener for category name input
         function generateSlug(value) {
            return value
            .toLowerCase() // Convert to lowercase
            .trim() // Remove extra spaces
            .replace(/[\s\-]+/g, '-') // Replace spaces and hyphens with a single hyphen
            .replace(/[^\w\-]+/g, ''); // Remove all non-word characters except hyphens
        }

        // Automatically update slug when category name changes
        $('#title').on('input', function() {
            const categoryName = $(this).val();
            const slug = generateSlug(categoryName);
            $('#slug').val(slug); // Update the slug field
        });
        $('#blog_title').on('input', function() {
            const categoryName = $(this).val();
            const slug = generateSlug(categoryName);
            $('#blog_slug').val(slug); // Update the slug field
        });

        // add blog
        $('.add_blog').click(function (e) {
            e.preventDefault();

            let slug = $('#slug').val();
            let title = $('#title').val();
            let desp = $('#desp').val().trim();
            let img = $('#img')[0].files[0]; // Grab the first file

            // Validate form inputs
             if (title.length === 0) {
                toastify().error('Title is required!');
            } else if (!desp) {
                toastify().error('Description is required!');
            } else if (!img) {
                toastify().error('Image is required!');
            } else {
                // Prepare form data for submission
                let formData = new FormData();
                formData.append('slug', slug);
                formData.append('title', title);
                formData.append('desp', desp);
                formData.append('img', img); // Add the file to formData

                // Perform AJAX request
                $.ajax({
                    url: "/blog-create", // Change the URL as needed
                    type: "POST",
                    data: formData,
                    contentType: false, // Important for file upload
                    processData: false, // Important for file upload
                    success: function (res) {
                        if (res.status === 'success') {
                            toastify().success(res.message);
                            loadBlog();
                            $('#desp').summernote('reset');
                            $('#addBlog')[0].reset();
                            $('#create_blog').modal('hide');
                        } 
                    }
                });
            }
        });


        // get blog
        function loadBlog() {
            $.ajax({
                url: "/get-blog", // Route to fetch services
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');
                    tableData.DataTable().destroy();
                    tableList.empty();
                    res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                    $.each(res, function (index, blog) {
                        let imgSrc = 'upload/blog/' + blog.img;
                        let row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${blog.title}</td>
                            <td>${blog.slug}</td>
                            <td><img src="${imgSrc}"></td>
                            <td>
                                <button class="btn btn-info btn-sm edit-blog text-white"
                                data-toggle="modal" data-target="#update_blog"
                                data-id="${blog.id}"
                                data-slug="${blog.slug}"
                                data-title="${blog.title}"
                                data-desp="${blog.desp}"
                                data-img="${blog.img}"
                                >Edit</button>
                                <button class="btn btn-danger  btn-sm delete-blog" data-id="${blog.id}">Delete</button>
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
        loadBlog();


        // blog delete
        $(document).on('click', '.delete-blog', function () {
            let blog_id = $(this).data('id');

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
                        url: "/blog-delete",
                        type: "POST",
                        data: {
                            blog_id: blog_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Blog Successfully deleted .",
                                    icon: "success"
                                });
                                loadBlog();
                            }
                        }
                    });

                }
            });
        });


        // edit blog
        $(document).on('click', '.edit-blog', function () {
            let blog_id = $(this).data('id');
            let slug = $(this).data('slug');
            let title = $(this).data('title');
            let desp = $(this).data('desp');
            let img = $(this).data('img');
            

            $('#blog_id').val(blog_id);
            $('#blog_slug').val(slug);
            $('#blog_title').val(title);
            $('#blog_desp').summernote('code', desp);
            
            let imgSrc = 'upload/blog/' + img; // Construct the image source path
            $("#imgblah").attr('src', imgSrc); 
        })

        // update blog
        $('.up_blog').click(function (e) {
            e.preventDefault();
            

            var formData = new FormData();
    
            // Append regular form fields
            formData.append('blog_id', $('#blog_id').val());
            formData.append('slug', $('#blog_slug').val());
            formData.append('title', $('#blog_title').val());
            formData.append('desp', $('#blog_desp').val());

            // Check if image exists and append it to the formData
            var img = $('#blog_img')[0].files[0]; // Assuming your image input has id="up_image"
            if (img) {
                formData.append('img', img); // 'image' is the key that will hold the file
            }

            $.ajax({
                url: "/blog-update",
                type: "POST",
                data: formData,
                processData: false, 
                contentType: false,
                success: function (res) {
                    if (res.status === 'success') {
                        toastify().success(res.message);
                        loadBlog();
                        $('#updateBlog')[0].reset();
                        $('#update_blog').modal('hide');
                    }
                }
            });
        });

        

    });

</script>
