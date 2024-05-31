<!DOCTYPE html>
<html>
<head>
    <title>Autorización de Tono</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Autorización de Tono</h2>
        <?php echo $output; ?>
    </div>

    <?php $this->load->view('modal_autorizacion'); ?>

    <script>
        $(document).ready(function() {
            $('#modalAutorizacion').on('shown.bs.modal', function() {
                $('#formAutorizacion')[0].reset();
            });

            $('#guardarAutorizacion').click(function() {
                var formData = $('#formAutorizacion').serialize();
                $.ajax({
                    url: '<?php echo base_url('autorizaciontono/procesarNuevoFormulario'); ?>',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Manejar la respuesta del servidor
                        console.log(response);
                        $('#modalAutorizacion').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>
</html>