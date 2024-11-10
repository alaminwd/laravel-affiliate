<script>
    $(document).ready(function () {

        // get message



        // message delete
        $(document).on('click', '.delete-message', function () {
            let message_id = $(this).data('id');

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
                        url: "/delete-message",
                        type: "POST",
                        data: {
                            message_id: message_id
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Message Successfully deleted .",
                                    icon: "success"
                                });
                                $('#dataTableExample').load(location.href +
                                    ' #dataTableExample');
                            }
                        }
                    });

                }
            });
        });


        // reply message
        $('.reply_message').click(function (e) {
            e.preventDefault();

            var formData = {
                message_id: $('#message_id').val(),
                email: $('#email').val(),
                reply: $('#reply').val()
            };
            if (!formData.reply.trim()) {
                toastify().error('Reply is required!');
            } else {
                $.ajax({
                    url: "/reply-message",
                    type: "POST",
                    data: formData,
                    success: function (res) {
                        if (res.status === 'success') {
                            toastify().success(res.message);
                            $('#replyForm').load(location.href + ' #replyForm');
                        }
                    }
                });
            }

        });

    });

</script>
