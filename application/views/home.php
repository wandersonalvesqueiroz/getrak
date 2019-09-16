<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Calculadora Espacial</title>
    <link rel="icon" href="<?php echo base_url() ?>/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="<?php echo base_url('includes/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('includes/assets/css/styles.css') ?>">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo base_url('includes/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('includes/assets/js/scripts.js') ?>"></script>

</head>
<body>
<div id="loading">
    <div id="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>
<div class="container-fluid">
    <a href="https://www.getrak.com.br" target="_blank" id="logo-getrak">
        <img src="<?php echo base_url('includes/assets/img/logo-getrak.webp') ?>">
    </a>

    <h3>Calculadora de paradas de Espaçonaves</h3>

    <form id="calcular">
        <div class="form-group row col-sm-12">
            <label for="distance" class="col-form-label col-sm-2">Informe a distância:</label>
            <div class="col-sm-8">
                <input type="text" name="distance" id="distance" onkeypress="return isNumberKey(event);"
                       class="form-control" required="true" placeholder="Distância em MGLT">
                <div class="invalid-feedback">Informe uma distância valida e MGLT</div>
            </div>
            <button type="submit" class="btn btn-primary col-sm-1">Calcular</button>
            <div class="col-sm-1">
                <button type="button" id="clear" class="btn btn-danger col-sm-12">Limpar</button>
            </div>
        </div>
    </form>

    <div id="result">
    </div>

</div>
<script>
    $(document).ready(function () {
        var site_url = "<?php echo site_url() ?>";
        $('#calcular').submit(function (e) {
            e.preventDefault(e);
            var data = $(this).serialize();
            $.ajax({
                url: site_url + '/Home/search',
                type: 'GET',
                data: data,
                dataType: 'html',

                processData:false,
                success: function (data) {
                    $('#result').empty();
                    $('#result').append(data);
                },
                beforeSend: function () {
                    $('#loading').fadeIn('fast');
                },
                complete: function () {
                    $('#loading').fadeOut('fast');

                },
                error: function () {
                    alert('Nenhuma Espaçonave encontrada!');
                }
            });
        });
    });
</script>
</body>
</html>