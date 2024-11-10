<script>
    $(document).ready(function () {

        // summernote


        let despContent = decodeURIComponent($(this).data('desp'));
        $('#desp').summernote();
        $('#up_desp').summernote('code', despContent);

        getCategory();

        function getCategory() {
            $.ajax({
                url: "get-category",
                type: "GET",
                success: function (res) {
                    $.each(res, function (index, category) {
                        let option =
                            `<option value="${category['id']}">${category['category_name']}</option>`;
                        $('#category_id').append(option);
                    })

                }
            });
        }

        // Add Product
        $('.add_product').on('click', function (e) {
            e.preventDefault();

            // Validate fields
            let product_name = $('#product_name').val();
            let product_link = $('#product_link').val();
            let desp = $('#desp').val();
            let category_id = $('#category_id').val();
            let preview = $('#preview')[0].files[0];
            let gallery = $('#gallery')[0].files;

            if (product_link.length === 0) {
                toastify().error('Product Link is required');
                return;
            } else if (product_name.length === 0) {
                toastify().error('Product Name is required');
                return;
            } else if (!preview) {
                toastify().error('Preview Image is required');
                return;
            }

            // Create form data
            let formData = new FormData();
            formData.append('product_name', product_name);
            formData.append('product_link', product_link);
            formData.append('desp', desp);
            formData.append('category_id', category_id);
            formData.append('preview', preview);

            // Add gallery images if selected
            if (gallery.length > 0) { // Fix the condition
                for (let i = 0; i < gallery.length; i++) {
                    formData.append('gallery[]', gallery[i]);
                }
            }

            // Send data via AJAX
            $.ajax({
                url: '/product-create',
                method: 'POST',
                data: formData,
                processData: false, // Don't process the files
                contentType: false, // Don't set content type header
                success: function (res) {
                    toastify().success('Product created successfully');
                    loadProduct();
                    $('#create_product').modal('hide');
                    $('#addProduct')[0].reset();
                    $('#desp').summernote('reset');
                },
                error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        toastify().error(value);
                    });
                }
            });
        });

        // product description suggestion  start
        function loadSuggestions(query = '') {
            $.ajax({
                url: '/get-desp-suggestions',
                type: 'GET',
                data: {
                    query: query
                },
                success: function (suggestions) {
                    let suggestionBox = $('#desp-suggestions');
                    suggestionBox.empty();
                    if (suggestions.length > 0) {
                        suggestionBox
                            .show(); // Show the suggestion box only if there are suggestions
                        $.each(suggestions, function (index, suggestion) {
                            // Truncate description to 300 characters for display
                            let truncatedSuggestion = suggestion.length > 300 ? suggestion
                                .substring(0, 300) + '...' : suggestion;
                            // Wrap each suggestion in a div with the truncated version
                            suggestionBox.append(
                                '<div class="suggestion-item" data-full-text="' +
                                suggestion + '">' + truncatedSuggestion + '</div>'
                            );
                        });
                    } else {
                        suggestionBox.hide(); // Hide if no suggestions found
                    }
                }
            });
        }

        // Trigger latest 10 suggestions on focus
        $('#desp').on('summernote.focus', function () {
            loadSuggestions(); // Fetch the latest 10 descriptions when focused
        });

        // Trigger filtered suggestions on keyup only if query length is more than 2
        $('#desp').on('summernote.keyup', function () {
            let query = $('#desp').summernote('code').replace(/(<([^>]+)>)/gi,
                ""); // Extract plain text from Summernote content
            loadSuggestions(query);
        });

        // Click event to populate `desp` field with selected suggestion
        $(document).on('click', '.suggestion-item', function () {
            let fullText = $(this).data('full-text'); // Get the full description from data attribute
            $('#desp').summernote('code', fullText); // Set the full description into Summernote
            $('#desp-suggestions').hide(); // Hide suggestions
        });

        // Hide suggestions box if clicked outside
        $(document).click(function (e) {
            if (!$(e.target).closest('#desp, #desp-suggestions').length) {
                $('#desp-suggestions').hide();
            }
        });



        // product description suggestion end

        // get category
        function loadProduct() {
            $.ajax({
                url: "/get-product",
                type: "GET",
                success: function (res) {
                    let tableData = $('#dataTableExample');
                    let tableList = $('#tableList');
                    tableData.DataTable().destroy();
                    tableList.empty();

                    res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                    $.each(res, function (index, product) {
                        let preview = 'upload/product/preview/' + product.preview;
                        let row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${product.product_link}</td>
                            <td>${product.product_name}</td>
                            <td>${product.slug}</td>
                            <td><img src="${preview}"></td>
                            <td>
                                <button class="btn btn-info btn-sm edit-product text-white"
                                data-toggle="modal" data-target="#update_product"
                                data-id="${product.id}"
                                data-category_id="${product.category_id}"
                                data-link="${product.product_link}"
                                data-name="${product.product_name}"
                                data-desp="${encodeURIComponent(product.desp)}"
                                data-slug="${product.slug}"
                                data-preview="${product.preview}"
                                >Edit</button>
                                <button class="btn btn-danger  btn-sm delete-product" data-id="${product.id}">Delete</button>
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
        loadProduct();


        //  delete category
        $(document).on('click', '.delete-product', function () {
            let product_id = $(this).data('id');

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
                        url: "/product-delete",
                        type: "POST",
                        data: {
                            product_id: product_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Product Successfully deleted.",
                                    icon: "success"
                                });
                                loadProduct();
                            }
                        }
                    });

                }
            });
        });

        loadCategory();

        // function loadCategory(selectedCategoryId) {
        //     $.ajax({
        //         url: "/get-category", // URL to fetch categories
        //         type: "GET",
        //         success: function (res) {
        //             let categorySelect = $('#up_category_id');
        //             categorySelect.empty(); // Clear existing options

        //             $.each(res, function (index, category) {
        //                 // Create option and check if it matches the selectedCategoryId
        //                 let selected = (category['id'] == selectedCategoryId) ? 'selected' :
        //                     '';
        //                 let option =
        //                     `<option value="${category['id']}" ${selected}>${category['category_name']}</option>`;
        //                 categorySelect.append(option);
        //             });
        //         }
        //     });
        // }

        function loadCategory(selectedCategoryId) {
            $.ajax({
                url: "/get-category", // URL to fetch categories
                type: "GET",
                success: function (res) {
                    let categorySelect = $('#up_category_id');
                    categorySelect.empty(); // Clear existing options

                    // Append default option
                    categorySelect.append('<option value="">--Select any--</option>');

                    let isCategoryMatched = false;

                    // Loop through categories and add them to the dropdown
                    $.each(res, function (index, category) {
                        let selected = (category['id'] == selectedCategoryId) ? 'selected' :
                            '';
                        if (selected) {
                            isCategoryMatched = true;
                        }
                        let option =
                            `<option value="${category['id']}" ${selected}>${category['category_name']}</option>`;
                        categorySelect.append(option);
                    });

                    // If no matching category was found, select the provided `selectedCategoryId`
                    if (!isCategoryMatched && selectedCategoryId) {
                        categorySelect.append(
                            `<option value="${selectedCategoryId}" selected>Unknown Category</option>`
                            );
                    }
                }
            });
        }





        // edit category
        $(document).on('click', '.edit-product', function () {
            let product_id = $(this).data('id');
            let category_id = $(this).data('category_id');
            let product_link = $(this).data('link');
            let product_name = $(this).data('name');
            let desp = decodeURIComponent($(this).data('desp'));
            let slug = $(this).data('slug');
            let preview = $(this).data('preview');

            // Set the values in the modal form
            $('#product_id').val(product_id);
            $('#up_product_link').val(product_link);
            $('#up_product_name').val(product_name);
            $('#up_desp').summernote('code', desp);

            // Set the preview image in the modal
            let previewImageUrl = `upload/product/preview/${preview}`;
            $('#perview_img').attr('src', previewImageUrl); // Set the src of the preview image

            // Clear existing gallery images before appending new ones
            $('#gallery_images').empty();

            // Assuming you fetch categories from the backend
            $.ajax({
                url: `/get-product-gallery/${product_id}`,
                type: "GET",
                success: function (response) {
                    // Check if the request was successful
                    if (response.status === 'success') {
                        // Clear any existing gallery images
                        $('#gallery_images').empty();

                        // Loop through the gallery images and append them
                        response.data.forEach(image => {
                            let galleryImageUrl = 'upload/product/gallery/' + image
                                .gallery; // Ensure 'gallery' matches the filename in the JSON response

                            $('#gallery_images').append(
                                `<img src="${galleryImageUrl}" width="100" alt="Gallery Image">`
                            );
                        });
                    }
                }
            });

            loadCategory(category_id);

        });

        // update category
        $('.up_product').on('click', function (e) {
            e.preventDefault();

            // Retrieve values from the modal inputs
            let product_id = $('#product_id').val();
            let product_name = $('#up_product_name').val();
            let product_link = $('#up_product_link').val();
            let category_id = $('#up_category_id').val();
            let desp = $('#up_desp').val(); // Assuming you retrieve category_id from the dropdown
            let preview = $('#up_preview')[0].files[0]; // Get the current src of the preview image
            let gallery = $('#up_gallery')[0].files; // Get gallery files from the input

            // Create form data
            let formData = new FormData();
            formData.append('product_id', product_id);
            formData.append('product_name', product_name);
            formData.append('product_link', product_link);
            formData.append('category_id', category_id);
            formData.append('desp', desp);

            // Add preview image only if it's not empty
            if (preview && preview !== '') {
                formData.append('preview', preview);
            }

            // Add gallery images only if selected
            if (gallery && gallery.length > 0) {
                for (let i = 0; i < gallery.length; i++) {
                    formData.append('gallery[]', gallery[i]);
                }
            }

            // Send data via AJAX
            $.ajax({
                url: '/product-update',
                method: 'POST',
                data: formData,
                processData: false, // Don't process the files
                contentType: false, // Don't set content type header
                success: function (res) {
                    toastify().success('Product updated successfully');
                    loadProduct();
                    $('#update_product').modal('hide');
                    $('#updateProduct')[0].reset();
                },
                error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        toastify().error(value);
                    });
                }
            });
        });



    });

</script>
