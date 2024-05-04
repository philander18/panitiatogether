<script>
    $(document).ready(function() {
        $('.toggle-password').on('click', function() {
            $('#icon').toggleClass("fa-eye fa-eye-slash");
            var input = $($('#icon').attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        $('.toggle-password1').on('click', function() {
            $('#icon1').toggleClass("fa-eye fa-eye-slash");
            var input = $($('#icon1').attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>