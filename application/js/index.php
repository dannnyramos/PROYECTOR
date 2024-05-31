<script>
    $(document).ready(function() {
        $('.enable-estatus').click(function() {
            $(this).closest('form').append('<input type="hidden" name="enable_second_form" value="true">');
            $(this).closest('form').submit();
        });
    });
</script>
