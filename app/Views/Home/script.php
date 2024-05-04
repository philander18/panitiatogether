<script>
    function method_url(controller, method) {
        const base_url = "<?= base_url(); ?>" + controller + '/' + method;
        return base_url;
    }

    function tampil_flash() {
        $.ajax({
            url: method_url('home', 'flash'),
            data: {},
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.flash').html(data);
            }
        });
    }
</script>