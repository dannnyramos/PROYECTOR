<?php ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dd4396edd6.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css" rel="stylesheet"/>
    <title>Teñido</title>

</head>
<body class="container-fluid">
<style type="text/css">
    body, html {
        background: #f1f1f1;
        width: 100%;
    }

    .image-escudo {
        background-color: grey;
        z-index: 1;
    }

    div#is-relative {
        max-width: 350px;
        position: relative;
    }

    #icon {
        position: absolute;
        display: block;
        bottom: .5rem;
        left: 1rem;
        color: grey;
        user-select: none;
        cursor: pointer;
    }

    #icon-pass {
        position: absolute;
        display: block;
        bottom: .5rem;
        right: 1rem;
        color: black;
        user-select: none;
        cursor: pointer;

    }

    input.input {
        padding-left: 2.5rem;
        border-radius: .45rem;
    }
    #icon-pass{
        text-decoration: none;
    }
    .btn-login{
        background-color: yellow;
        border-radius: 5px;
    }
    .container-fluid {
        min-height: 90vh;
    }
    .container-login{
        height: 100%;
        vertical-align: middle;
    }

    .col-img.img-escudo{

        width: 90vw;
        height: 90vh;
        margin-top: 10px;
        margin-left: 10px;
        left: -20%;
        top: 15%;
        position: absolute;
    }

    .minh-100 {
        height: 97vh;
    }
</style>

<div class="bg-notaria container">
    <div class="row  justify-content-center align-items-center minh-100">
        <div class="col-lg-12 col-sm-12 col-md-12">
            <div class="container-login">
                <br>
                <br>
                <center>
                    <img src="<?= base_url('/uploader/image/logoketer.png') ?>" alt="Logo" width="300px" class="mb-5">
                        <?php echo form_open('Login/ingresar','class="needs-validation" novalidate') ?>

                    <div class="form-group">
                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <div class="columns">
                                <div class="column p-5">

                                    <div id="is-relative">
                                        <input type="text" name="Usuario" placeholder="usuario@correo.com" class="input"  required/>
                                        <span id="icon">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <div class="columns">
                                <div class="column p-5">

                                    <div id="is-relative">
                                        <input type="password" id="pass" placeholder="Contraseña" name="Password" class="input" required />
                                        <span id="icon">
                                            <i class="fa-solid fa-key"></i>
                                        </span>
                                        <a id="icon-pass" onclick="verPassword()">
                                            <i class="fas fa-eye" id="iconPass"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="float-end m-5">
                            <button type="submit" class="btn-sm btn-primary rounded-sm"><strong class="text-light mr-5 ml-5">Iniciar sesión</strong></button>
                        </div>
                        </div>
                    </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    var pass= false;
    var iconPass = $("#iconPass");
    function verPassword(){
        var inputPass = $("#pass");

        if(pass === false){
            inputPass.get(0).type = "text";
            iconPass.removeClass("fas fa-eye");
            iconPass.addClass("fas fa-eye-slash");
            pass = true;
        }else{
            inputPass.get(0).type = "password";
            iconPass.removeClass("fas fa-eye-slash");
            iconPass.addClass("fas fa-eye");
            pass = false;
        }
    }
</script>

<?php if (isset($error)): ?>

    <script type="text/javascript">
        Swal.fire({

            icon: 'error',
            title: '<?= $error?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>
</body>
</html>

