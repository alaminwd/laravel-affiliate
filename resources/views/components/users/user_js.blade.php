<script>
    $(document).ready(function () {

        // get user
        getUser();

        function getUser() {
            $.ajax({
                url: '/user-list',
                type: "GET",
                success: function (res) {
                    let tableData = $('#tabledata');
                    let tableList = $('#tableList');
                    tableData.DataTable().destroy();
                    tableList.empty();

                    res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                    $.each(res, function (index, user) {
                        let row = `
                         <tr>
                            <td>${index+1}</td>
                            <td>${user.name}</td>
                            <td>${user.email}</td>
                            <td><img src="${user.photo}"></td>
                            <td>
                                <button data-id="${user.id}" class="btn btn-danger delete">Delete</button>
                            </td>
                          </tr>
                        `;
                        tableList.append(row);
                    });

                    tableData.DataTable({
                        lengthMenu: [5, 10, 15, 20],
                        language: {
                            paginate: {
                                previous: 'Previous',
                                next: 'Next'
                            }
                        }
                    });
                }
            });
        }

        // create user
        $(document).on('click', '.add_user', function () {
            let name = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();

            $.ajax({
                url: "/user-create",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    password: password
                },
                success: function (res) {
                    if (res.status === 'success') {
                        getUser();
                        toastify().success(res.message);
                        $('#create_user').modal('hide');
                        $('#addUser')[0].reset();
                    }
                },
                error: function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        toastify().error(value);
                    });
                }
            });
        })

        // user delete
        $(document).on('click', '.delete', function () {
            let user_id = $(this).data('id');

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
                        url: "/user-delete",
                        type: "POST",
                        data: {
                            user_id: user_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "User Successfully deleted .",
                                    icon: "success"
                                });
                                getUser();
                            }
                        }
                    });

                }
            });
        })

        $(document).on('click', '.up_profile', function () {
            let name = $('#user_name').val();
            let email = $('#user_email').val();
            let password = $('#user_pass').val();

            // Create data object with required fields
            let data = {
                name: name,
                email: email
            };

            // Add password only if it has a value
            if (password) {
                data.password = password;
            }

            $.ajax({
                url: "/profile-update",
                type: "POST",
                data: data,
                success: function (res) {
                    if (res.status === 'success') {
                        toastify().success(res.message);
                    }
                }
            });
        });


        $(document).on('click', '.profile_photo', function () {
            let photo = $('#photo')[0].files[0];

            if (!photo) {
                toastify().error('Photo is required');
            }

            let formData = new FormData();
            formData.append('photo', photo);

            $.ajax({
                url: "/profile-photo",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res.status === 'success') {
                        toastify().success('Profile Image updated successfully!');
                    }
                },
            });
        })
    })

</script>
