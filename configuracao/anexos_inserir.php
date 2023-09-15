<?php

include_once('../head.php');
?>


<body class="bg-transparent">


    <div class="container formContainer">


        <div class="col-sm mt-4" style="text-align:right">
            <a href="../configuracao/?tab=configuracao&stab=anexos" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
        </div>
        <div class="col-sm">
            <spam class="col titulo">Inserir Anexo</spam>
        </div>
        
        <div class="container" style="margin-top: 30px">
            <form action="../database/anexos.php?operacao=inserir" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8 form-group">
                        <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome Anexo</label>
                        <div class="for-group">
                            <input type="text" class="form-control" name="nomeAnexo" autocomplete="off" required>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        
                            <label class='control-label' for='inputNormal' style="margin-top: -50px;">Anexo</label>
                            <label class="picture" for="anexo" tabIndex="0">
                                <span class="picture__image"></span>
                            </label>
                            <input type="file" name="base64" id="anexo" >
                        
                    </div>
                </div>
                 

                <div style="text-align:right; margin-top:20px">
                    <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Cadastrar</button>
            </div>
            </form>
        </div>

    </div>

    </body>

    <script>
        //Carregar a anexo na tela
        const inputFile = document.querySelector("#anexo");
        const pictureImage = document.querySelector(".picture__image");
        const pictureImageTxt = "Carregar imagem";
        pictureImage.innerHTML = pictureImageTxt;

        inputFile.addEventListener("change", function(e) {
            const inputTarget = e.target;
            const file = inputTarget.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function(e) {
                    const readerTarget = e.target;

                    const img = document.createElement("img");
                    img.src = readerTarget.result;
                    img.classList.add("picture__img");

                    pictureImage.innerHTML = "";
                    pictureImage.appendChild(img);
                });

                reader.readAsDataURL(file);
            } else {
                pictureImage.innerHTML = pictureImageTxt;
            }
        });
    </script>
</html>