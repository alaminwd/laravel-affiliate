<script>
    $(document).ready(function () {
        

        // Event listener for category name input
        function generateSlug(value) {
            return value
            .toLowerCase() // Convert to lowercase
            .trim() // Remove extra spaces
            .replace(/[\s\-]+/g, '-') // Replace spaces and hyphens with a single hyphen
            .replace(/[^\w\-]+/g, ''); // Remove all non-word characters except hyphens
        }

        // Automatically update slug when category name changes
        $('#category_name').on('input', function() {
            const categoryName = $(this).val();
            const slug = generateSlug(categoryName);
            $('#slug').val(slug); // Update the slug field
        });
        $('#up_category_name').on('input', function() {
            const categoryName = $(this).val();
            const slug = generateSlug(categoryName);
            $('#up_slug').val(slug); // Update the slug field
        });

        // add category
        $('.add_category').click(function (e) {
            e.preventDefault();
            let category_name = $('#category_name').val();
            let slug = $('#slug').val();

            if (category_name.length === 0) {
                toastify().error('Category Name is required!');
            } else {

                $.ajax({
                    url: "/category-create",
                    type: "POST",
                    data: {
                        category_name: category_name,
                        slug: slug
                    },
                    success: function (res) {
                        if (res.status === 'success') {
                            toastify().success(res.message);
                            loadCategory();
                            $('#addCategory')[0].reset();
                            $('#create_category').modal('hide');
                        }
                    },
                    error: function(err){
                        let error = err.responseJSON;
                        $.each(error.errors, function(index,value){
                            toastify().error(value);
                        });
                    }
                });
            }
        });

        // get category
        function loadCategory() {
            $.ajax({
                url: "/get-category", // Route to fetch services
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');
                    tableData.DataTable().destroy();
                    tableList.empty();

                    res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                    $.each(res, function (index, category) {
                        let row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${category.category_name}</td>
                            <td>${category.slug}</td>
                            <td>
                                <button class="btn btn-info btn-sm edit-category text-white"
                                data-toggle="modal" data-target="#update_category"
                                data-id="${category.id}"
                                data-name="${category.category_name}"
                                data-slug="${category.slug}"
                                >Edit</button>
                                <button class="btn btn-danger  btn-sm delete-category" data-id="${category.id}">Delete</button>
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
        loadCategory();


        //  delete category
        $(document).on('click', '.delete-category', function () {
            let category_id = $(this).data('id');

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
                        url: "/category-delete",
                        type: "POST",
                        data: {
                            category_id: category_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Category Successfully deleted.",
                                    icon: "success"
                                });
                                loadCategory();
                            }
                        }
                    });

                }
            });
        });


        // edit category
        $(document).on('click', '.edit-category', function () {
            let category_id = $(this).data('id');
            let category_name = $(this).data('name');
            let slug = $(this).data('slug');

            $('#category_id').val(category_id);
            $('#up_category_name').val(category_name);
            $('#up_slug').val(slug);
        })

        // update category
        $('.up_category').click(function (e) {
            e.preventDefault();

            var formData = {
                category_id: $('#category_id').val(),
                category_name: $('#up_category_name').val(),
                slug: $('#up_slug').val(),
            };

            $.ajax({
                url: "/category-update",
                type: "POST",
                data: formData,
                success: function (res) {
                    if (res.status === 'success') {
                        toastify().success(res.message);
                        loadCategory();
                        $('#updateCategory')[0].reset();
                        $('#update_category').modal('hide');
                    }
                }
            });
        });

    });

</script>
