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
        $('#title').on('input', function () {
            const categoryName = $(this).val();
            const slug = generateSlug(categoryName);
            $('#slug').val(slug); // Update the slug field
        });
        $('#up_title').on('input', function () {
            const categoryName = $(this).val();
            const slug = generateSlug(categoryName);
            $('#up_slug').val(slug); // Update the slug field
        });

        // add blog
        $('.add_page').click(function (e) {
            e.preventDefault();

            let slug = $('#slug').val();
            let title = $('#title').val();
            let short_desp = $('#short_desp').val().trim();
            let desp = $('#desp').val().trim();

            // Validate form inputs
            if (title.length === 0) {
                toastify().error('Title is required!');
            } else if (!short_desp) {
                toastify().error('Short Description is required!');
            } else if (!desp) {
                toastify().error('Description is required!');
            } else {
                // Prepare form data for submission
                let formData = new FormData();
                formData.append('slug', slug);
                formData.append('title', title);
                formData.append('short_desp', short_desp);
                formData.append('desp', desp);

                // Perform AJAX request
                $.ajax({
                    url: "/page-create", // Change the URL as needed
                    type: "POST",
                    data: formData,
                    contentType: false, // Important for file upload
                    processData: false, // Important for file upload
                    success: function (res) {
                        if (res.status === 'success') {
                            toastify().success(res.message);
                            loadPage();
                            $('#desp').summernote('reset');
                            $('#addPage')[0].reset();
                            $('#create_page').modal('hide');
                        }
                    }
                });
            }
        });


        // get blog
        function loadPage() {
            $.ajax({
                url: "/get-page", // Route to fetch services
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');
                    tableData.DataTable().destroy();
                    tableList.empty();

                    $.each(res, function (index, page) {
                        let row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${page.slug}</td>
                            <td>${page.title}</td>
                            <td>
                                <button class="btn btn-info btn-sm edit-page text-white"
                                data-toggle="modal" data-target="#update_page"
                                data-id="${page.id}"
                                data-slug="${page.slug}"
                                data-title="${page.title}"
                                data-short_desp="${page.short_desp}"
                                data-desp="${page.desp}"
                                >Edit</button>
                                <button class="btn btn-danger  btn-sm delete-page" data-id="${page.id}">Delete</button>
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
        loadPage();


        // blog delete
        $(document).on('click', '.delete-page', function () {
            let page_id = $(this).data('id');

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
                        url: "/page-delete",
                        type: "POST",
                        data: {
                            page_id: page_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Page Successfully deleted .",
                                    icon: "success"
                                });
                                loadPage();
                            }
                        }
                    });

                }
            });
        });


        // edit blog
        $(document).on('click', '.edit-page', function () {
            let page_id = $(this).data('id');
            let slug = $(this).data('slug');
            let title = $(this).data('title');
            let short_desp = $(this).data('short_desp');
            let desp = $(this).data('desp');


            $('#page_id').val(page_id);
            $('#up_slug').val(slug);
            $('#up_title').val(title);
            $('#up_short_desp').val(short_desp);
            $('#up_desp').summernote('code', desp);

        })

        // update blog
        $('.up_page').click(function (e) {
            e.preventDefault();


            var formData = new FormData();

            // Append regular form fields
            formData.append('page_id', $('#page_id').val());
            formData.append('slug', $('#up_slug').val());
            formData.append('title', $('#up_title').val());
            formData.append('short_desp', $('#up_short_desp').val());
            formData.append('desp', $('#up_desp').val());

            $.ajax({
                url: "/page-update",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.status === 'success') {
                        toastify().success(res.message);
                        loadPage();
                        $('#updatePage')[0].reset();
                        $('#update_page').modal('hide');
                    }
                }
            });
        });



    });

</script>
