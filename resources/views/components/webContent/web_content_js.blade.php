<script>
    // summernote
    $(document).ready(function () {
        $('#ab_content').summernote();
        $('#privacy').summernote();

        // web content update
        getWebContent();

        function getWebContent() {
            $.ajax({
                url: "/get-web-content",
                type: "GET",
                success: function (res) {
                    if (res.status === 'success') {
                        $("#id").val(res.content.id);
                        $("#footer").val(res.content.footer);
                        $("#number").val(res.content.number);
                        $("#email").val(res.content.email);
                        $("#facebook").val(res.content.facebook);
                        $("#twitter").val(res.content.twitter);
                        $("#linkedin").val(res.content.linkedin);
                        $("#whatsapp").val(res.content.whatsapp);
                        $("#instagram").val(res.content.instagram);
                        $("#telegram").val(res.content.telegram);
                        $("#address").val(res.content.address);
                        $("#contact_title").val(res.content.contact_title);
                        $("#contact_desp").val(res.content.contact_desp);
                        $("#slide").val(res.content.slide);
                    }
                }
            });
        }

        // web content update
        $(document).on('click', '.web_content', function () {
            let id = $("#id").val();
            let footer = $("#footer").val();
            let number = $("#number").val();
            let email = $("#email").val();
            let facebook = $("#facebook").val();
            let twitter = $("#twitter").val();
            let linkedin = $("#linkedin").val();
            let instagram = $("#instagram").val();
            let whatsapp = $("#whatsapp").val();
            let telegram = $("#telegram").val();
            let address = $("#address").val();
            let contact_title = $("#contact_title").val();
            let contact_desp = $("#contact_desp").val();
            let slide = $("#slide").val();
            let logo = $("#logo")[0].files[0];

            let formData = new FormData();
            formData.append('id', id);
            formData.append('footer', footer);
            formData.append('number', number);
            formData.append('email', email);
            formData.append('facebook', facebook);
            formData.append('twitter', twitter);
            formData.append('linkedin', linkedin);
            formData.append('instagram', instagram);
            formData.append('whatsapp', whatsapp);
            formData.append('telegram', telegram);
            formData.append('address', address);
            formData.append('contact_title', contact_title);
            formData.append('contact_desp', contact_desp);
            formData.append('slide', slide);
            if (logo) {
                formData.append('logo', logo);
            }

            $.ajax({
                url: "/update-web-content",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res.status === 'success') {
                        toastify().success('Website Content updated successfully!');
                    }
                },
            });
        })
    });

</script>
