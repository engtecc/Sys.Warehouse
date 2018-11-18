<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../assets/css/exemplo.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Oswald:200" rel="stylesheet">
        <title>Usuários</title>
        <style>
            *{
                -webkit-box-sizing: border-box;
                -moz-transition-box-sizing: border-box;
                box-sizing: border-box;
            }

            body{
                font-family: Arial, Helvetica, sans-serif;
                font-size: 1em;
            }

            .formulario{
                display: block;position: fixed;
                top: -200%;
                right: 0;
                left: 0;
                bottom: 0;
                z-index: -1;
                -webkit-transition: all 400ms cubic-bezier(0.35,-0.39, 0.18, 1.18);
                -moz-transition: all 400ms cubic-bezier(0.35,-0.39, 0.18, 1.18);
                transition: all 400ms cubic-bezier(0.35,-0.39, 0.18, 1.18);
            }
            .container-table .add_table {
                font-family: 'Oswald', sans-serif;
                font-size: 17px;
                color: #FAFAFA;
                background-color: #388E3C;
                border: none;
                margin-bottom: 15px;
                padding: 7px 17px;
                border-radius: 5px;
            }

            .formulario_> div {
                width: 350px;
                margin: 1% auto;
                padding-bottom: 20px;
                border-radius: 10px;
                background: #fff;
                padding-bottom: 10px;
            }

            .input_div{
                padding: 10px;
                display: flex;
            }

            #title{
                text-align: center;
                width: 100%;
                height: 40px;
                border-radius:  5px 5px 0px 0px;
                display: flex;
            }

            #title-form {
                font-family: 'Oswald', sans-serif;
                font-size: 24px;
                color: #232323;
                background-color: #FAFAFA;
                margin: 35px auto;
            }
            .container-form {
                margin-top: 40px;
            }

            #input_form {
                border: solid #232323;
                border-radius: 5px;
                border-width: 1px;
                display: block;
                width: 100%;
                height: 35px;
                padding: 5px;
                font-family: 'Oswald', sans-serif;
                font-size: 15px;
            }

            .send-buttons {
                display: flex;
                justify-content: center;
                text-align: center;
                margin: 20px 80px;
                border: solid #232323;
                border-radius: 5px;
                border-width: 1px;
                width: 180px;
                padding: 5px;
                font-family: 'Oswald', sans-serif;
                font-size: 15px;
                background-color: #232323;
                color:  #FAFAFA;
            }

            .send-buttons:hover {
                background-color: #FAFAFA;
                color: #232323;
            }

            #input-form:focus{
                border: 1px solid #00BFFF;
            }

            .close {
                color: #232323;
                text-decoration: none;
                font-weight: bold;
                font-size: 20px;
                display: inline-flex;
                z-index: 1;
                float: right;
                margin-top: 5px;
                margin-right: 5px;
            }
            .close .fa-times-circle {
                color: #232323;
            }

            .close:hover .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="container-table">
            <button id="form-button" class="add_table">
                Adicionar Usuário <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
            <div class="content">
                <div id="formulario" class="formulario">
                    <div>
                        <form action="createUser.php" method="post">
                            <div id="title">
                                <h1 id="title-form">Cadastro de novo Usuário</h1>
                                <a class="close"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                            </div>
                            <div class="container-form">
                                <div class="input_div">
                                    <input class="input_form" type="text" name="name" placeholder="Digite seu Nome"
                                    value="" required>
                                </div>
                                <div class="input_div">
                                    <input class="input_form" type="text" name="email" placeholder="Digite seu Email"
                                    value="" required>
                                </div>
                                <div class="input_div">
                                    <input class="input_form" type="text" name="login" placeholder="Digite seu Login"
                                    value="" required>
                                </div>
                                <div class="input_div">
                                    <input class="input_form" type="password" name="password" placeholder="Digite sua Senha" required>
                                </div>
                                 <div class="input_div">
                                    <input class="input_form" type="text" name="telefone" placeholder="Digite seu Telefone"
                                    value="" required>
                                </div>
                                 <div class="input_div">
                                    <input class="input_form" type="text" name="city" placeholder="Digite sua Cidade"
                                    value="" required>
                                </div>
                                 <div class="input_div">
                                    <input class="input_form" type="text" name="state" placeholder="Digite seu Estado"
                                    value="" required>
                                </div>
                                 <div class="input_div">
                                    Sexo:
                                    <input type="radio" name="masc"
                                    value="Masculino" required> Masculino
                                    <input type="radio" name="fem"
                                    value="Feminino" required> Feminino
                                </div>
                            </div>
                            <button class="send-buttons" name="action" value="create"> enviar </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>