<!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/.css">
        <title>Page de connexion</title>
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    Pas de compte ?
                                </div>
                                <div class="col-xs-6">
                                    S'enregitrer 
                                    <a href="inscription.php">

                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="" method="post" role="form" style="display: block;">

                                        <div class="form-group">
                                            <input type="text" name="identifiant" id="identifiant" tabindex="1" class="form-control" placeholder="identifiant" value="">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="mot de passe">
                                        </div>

                                        <input id="connection" type="submit" name="formconnect" value="Se connecter ">

                                        <input type="button" onclick="window.location.replace('connexion.php')" value="Annuler" />

                                        <br/>
                                        <br/>
                                        <br/>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="" tabindex="5" class="forgot-password">mot de passe oublié ?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
