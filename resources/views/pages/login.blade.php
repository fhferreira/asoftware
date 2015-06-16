<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentallela Alela! | </title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    
    <!-- customstom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">



    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">

    <div class="">
        @if(Session::has('message'))
            @if(Session::get('message') == 'sucesso')
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Sucesso !</strong> O usuário foi cadastro com sucesso !
                </div>
            @endif
        @endif
        @if($errors->has('name')) 
            <div class="alert alert-error alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Erro !</strong> {!! $errors->first('name') !!}
            </div>  
            
        @endif        
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form>
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <a class="btn btn-default submit" href="index.html">Log in</a>
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <p class="change_link">New to site?
                                <a href="#toregister" class="to_register"> Create Account </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                                <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            <div id="register" class="animate form">
                <section class="login_content">
                    <form method="POST" action="" id="form_cadastro">

                        <h1>Create Account</h1>
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />          
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" name="name" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" required="" name="mail" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <input type="submit" class="btn btn-default submit" value="Cadastrar" onclick="salvarPessoa();"></input>
                           
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <p class="change_link">Already a member ?
                                <a href="#tologin" class="to_register" onclick=""> Log in </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                                <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                     <!--<a id="btnTeste" class="btn btn-default submit" onclick="salvarPessoa();">Testar</a> -->
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <script>
      $("#form_cadastro").on('submit',function(e){
        e.preventDefault(); 
        swal(
            {
                title: "Are you sure?",
                text: "This action cannot be undone",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#009900",
                confirmButtonText: "Yes, I'm sure!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirmed){
                if(isConfirmed){
                      $.ajax({
                          headers: {
                                'X-CSRF-Token': $('input[name="_token"]').val()
                          },
                          url:'save', //===PHP file name====
                          data:$("#form_cadastro").serialize(),
                          type:'POST',
                          success:function(data){
                            
                            //Success Message == 'Title', 'Message body', Last one leave as it is
                            swal("¡Success!", "Message sent!", "success");

                          },
                          error:function(data){
                            //Error Message == 'Title', 'Message body', Last one leave as it is
                            swal("Oops...", "Something went wrong :(", "error");
                          }
                        });
                }
            }
        );
        
      });
     
    </script>
</body>

</html>