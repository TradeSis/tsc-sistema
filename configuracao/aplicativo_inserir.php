<?php
//Lucas 04042023 criado

include_once('../head.php');
?>

<body class="bg-transparent">

    <div class="container formContainer">

        <div class="row">
            <div class="col-sm-8">
                <h2 class="tituloTabela">Inserir Aplicativo</h2>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="../configuracao/?tab=configuracao&stab=aplicativo" role="button" class="btn btn-primary"><i class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
            </div>
        </div>

            <form action="../database/aplicativo.php?operacao=inserir" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome do Aplicativo</label>
                            <input type="text" name="nomeAplicativo" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Caminho</label>
                            <input type="text" name="appLink" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                </div>
                <label class="labelForm mt-4">Imagem</label>
                <label class="picture ml-4" for="imgAplicativo" tabIndex="0">
                    <span class="picture__image"></span>
                </label>

                <input type="file" name="imgAplicativo" id="imgAplicativo">

                <div style="text-align:right; margin-top:20px">
                    <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Cadastrar</button>
            </div>
            </form>

    </div>





    <script>
        $(document).ready(function() {
            $("#form").submit(function() {
                var formData = new FormData(this);

                $.ajax({
                    url: "../database/aplicativo.php?operacao=inserir",
                    type: 'POST',
                    data: formData,
                    success: refreshPage(),
                    cache: false,
                    contentType: false,
                    processData: false,

                });

            });

            function refreshPage() {
                window.location.reload();
            }
        });

        //Carregar a imagem na tela
        const inputFile = document.querySelector("#imgAplicativo");
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

</body>

</html>