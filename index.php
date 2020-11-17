<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="presentacion/css/bootstrap.min.css" >
    <link rel="stylesheet" href="presentacion/css/estilos.css">
    <title>Login</title>
</head>
<body>
    <section class="container-fluid bg">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form class="form-container">
                    <div class="form-group">
                      <label for="usuario">Usuario</label>
                      <input type="text" class="form-control" id="usuario" aria-describedby="emailHelp">
                      <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo.</small>
                    </div>
                    <div class="form-group">
                      <label for="password">Contraseña</label>
                      <input type="password" class="form-control" id="password">
                    </div>
                    <!--
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Recordar Contraseña</label>
                    </div>
                  -->
                    <button type="submit" id="entrar" class="btn btn-primary btn-block">Entrar</button>
                  </form>
            </section>
        </section>
        

    </section>
    
    <script src="presentacion/libs/jquery.min.js" ></script>
    <script src="presentacion/libs/popper.min.js"></script>
    <script src="presentacion/libs/bootstrap.min.js"></script>

    <script src="presentacion/js/login.js"></script>
</body>
</html>