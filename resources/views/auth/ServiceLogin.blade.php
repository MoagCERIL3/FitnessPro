<!DOCTYPE html>
<html>
<head>
  <title>ServiceLogin</title>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<style>
@charset "UTF-8";
/* CSS Document */

body {
    width:100px;
  height:100px;
  background: -webkit-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* Chrome 10+, Saf5.1+ */
  background:    -moz-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* FF3.6+ */
  background:     -ms-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* IE10 */
  background:      -o-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* Opera 11.10+ */
  background:         linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* W3C */
font-family: 'Raleway', sans-serif;
}

p {
  color:#CCC;
}

.spacing {
  padding-top:7px;
  padding-bottom:7px;
}
.middlePage {
  width: 680px;
    height: 500px;
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}

.logo {
  color:#CCC;
}
.panel-info {
    border-color: #bce8f1;
}
fieldset {
    display: block;
    -webkit-margin-start: 2px;
    -webkit-margin-end: 2px;
    -webkit-padding-before: 0.35em;
    -webkit-padding-start: 0.75em;
    -webkit-padding-end: 0.75em;
    -webkit-padding-after: 0.625em;
    min-width: -webkit-min-content;
    border: none;
}
.btn-sm, .btn-group-sm>.btn {
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}

.btn-info {
    color: #fff;
    background-color: #3c8dbc;
    border-color: #3f98cc;
}
.pull-right {
    float: right;
}

.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
.form-control {
    display: block;
    width: 90%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.panel-info>.panel-heading {
    color: #fff;
    background-color: #3c8dbc;
    border-color: #3f98cc;
}
.panel-heading {
    padding: 2px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.panel-body {
    padding: 15px;
    height: 200px;
}
small, .small {
    font-size: 85%;
}
a {
    color: #428bca;
    text-decoration: none;
}
.spacing {
    padding-top: 7px;
    padding-bottom: 7px;
}
* {
    
    box-sizing: border-box;
}
.col-md-5 {
  width: 40%;;
  height: 60px;
  float: left;
  

}
.col-md-7 {
  border-left: 1px solid #ccc;
  height: 160px;
  width: 58.33333333%;
  float: right;
  position: relative;
    min-height: 1px;
   
}
.row {
    margin-right: -15px;
    margin-left: -15px;
    height: 160px;
}
form{
  border: none;
}

</style>
</head>
<body>

<div class="middlePage">
<div class="page-header">
  <h1 class="logo">FitnessPro <small style="font-weight: 400;line-height: 1;color: #777;">Bienvenue!</small></h1>

</div>
<hr>
 <form class="form-horizontal" method="POST" action="{{ route('ServiceLogin') }}">
                        {{ csrf_field() }}
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Sign In</h3>
  </div>
  <div class="panel-body">
  
    <div class="row">
  
      <div class="col-md-5" >
     <a>
       <button type="button" class="btn btn-lg btn-fb"><i class="fa fa-facebook left"></i> Facebook</button>
    </a>
   
      </div>

  <div class="col-md-7">

  <form class="form-horizontal">
  <fieldset>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
  
  <input class="form-control input-md" id="email" type="email" name="email" placeholder="Utilisateur" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
              </div><br>
  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">            
  
  <input id="textinputpass" type="password" class="form-control input-md" name="password" placeholder="password" required=""/>  
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
               </div>
  
 
  <div class="spacing"><a class="btn btn-link" href="{{ route('password.request') }}">
                                    <small>Mot de passe oublié?</small>
                                </a>        <br></div>
   <button id="singlebutton" class="btn btn-info btn-sm pull-right"  name="Submit" value="Login" type="Submit">Se connecter</button>
       


</fieldset>
</form>
</div>
    
</div>
    
</div>
</div>


</div>
</body>

</html>