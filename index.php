<?php
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Chuda Meme Generator</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.thumb').click(function(){
                    $('#thumbs').css('display', 'none');
                    $('#generador').css('display', 'block');
                    $('#meme').attr('src', $(this).attr('src'))
                    $('#meme').attr('data-src', $(this).attr('src'))
                });
                $('#btnAtras').click(function(){
                    $('#thumbs').css('display', 'block');
                    $('#generador').css('display', 'none');
                });
	            $('#txtInferior').focusout(function(){
		            if($.trim($('#txtInferior').val()) != "") {
			            SendAjaxRequest($('#txtSuperior').val(),$('#txtInferior').val(),"lower", $('#meme').attr('data-src'));
		            }
	            });
	            $('#txtSuperior').focusout(function(){
		            if($.trim($('#txtSuperior').val()) != "") {
			            SendAjaxRequest($('#txtSuperior').val(),$('#txtInferior').val(),"upper", $('#meme').attr('data-src'));
		            }
	            });
	            function SendAjaxRequest(umsg,dmsg,type, src) {
		            $.ajax({
			            url: 'generator.php',
			            type: 'GET',
			            data: { upmsg : umsg, downmsg : dmsg, position: type, src: src },
			            success:function(e) {
				            //console.log(e + umsg + dmsg + type);
				            console.log($('#meme').attr('data-src'));
				            $('#meme').attr('src','data:image/jpeg;base64,' + e);
				            $('.btnDescargar').attr('href','data:image/jpeg;base64,' + e);
			            }
		            });
	            }
            });
        </script>
        <style>
            body {
                margin: 0;
                padding 0;
            }
            #cuerpo {
                max-width: 900px;
                margin: 0 auto;
            }
            #cuerpo .row{
                text-align: center;
            }
            .page-header, .page-header h1 { 
                margin: 0 !important;
            }
            h1 {
                font-size: 2rem;
            }
        </style>
    </head>
    <body>
        <div id="cuerpo">
            <div class="page-header">
              <h1>Meme Generator <small>Chuda Edition</small></h1>
            </div>
            <div id="thumbs">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <a href="#" class="thumbnail">
                            <img class="thumb" id="chuda1" src="img/chuda1.jpeg" alt="Generic placeholder thumbnail">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="#" class="thumbnail">
                            <img class="thumb" id="chuda2" src="img/chuda2.jpeg" alt="Generic placeholder thumbnail">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="#" class="thumbnail">
                            <img class="thumb" id="chuda3" src="img/chuda3.jpeg" alt="Generic placeholder thumbnail">
                        </a>
                    </div>
                </div>
            </div>
            <div id="generador" style="display:none">
                <div class="row">
                    <div class="col-sm-6 col-md-4"></div>
                    <div class="col-sm-6 col-md-4">
                        <a href="#" class="thumbnail btnDescargar" download="meme.jpg">
                            <img id="meme" data-src="img/meme1.png" src="img/meme1.png" alt="Generic placeholder thumbnail">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4"></div>
                    <div class="col-sm-6 col-md-4">
                        <input id="txtSuperior" type="text" class="form-control" placeholder="Texto superior">
                    </div>
                    <div class="col-sm-6 col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4"></div>
                    <div class="col-sm-6 col-md-4">
                        <input id="txtInferior" type="text" class="form-control" placeholder="Texto inferior">
                    </div>
                    <div class="col-sm-6 col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4"></div>
                    <div class="col-sm-6 col-md-4">
                        <div class="btn-group">
                          <a download="meme.jpg" class="btnDescargar btn btn-default"><span class="glyphicon glyphicon-download-alt"></span> Descargar</a>
                          <a id="btnAtras" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Atras</a>
                        </div>                        
                    </div>
                    <div class="col-sm-6 col-md-4"></div>
                </div>
            </div>
        </div>
    </body>
</html>
