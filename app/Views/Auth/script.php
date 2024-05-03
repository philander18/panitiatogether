<script>
    $(document).ready(function() {
        $('.toggle-password').on('click', function() {
            console.log('ok');
            $('#icon').toggleClass("fa-eye fa-eye-slash");
            var input = $($('#icon').attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>