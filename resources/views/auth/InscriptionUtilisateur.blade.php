@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('Nom') ? ' has-error' : '' }}">
                            <label for="Nom" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="Nom" type="text" class="form-control" name="Nom" value="{{ old('Nom') }}" required autofocus>

                                @if ($errors->has('Nom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Nom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('Prenom') ? ' has-error' : '' }}">
                            <label for="Prenom" class="col-md-4 control-label">Prenom</label>

                            <div class="col-md-6">
                                <input id="Prenom" type="text" class="form-control" name="Prenom" value="{{ old('Prenom') }}" required autofocus>

                                @if ($errors->has('Prenom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Prenom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('Sexe') ? ' has-error' : '' }}">
                            <label for="Sexe" class="col-md-4 control-label">Sexe</label>

                            <div class="col-md-6">
                                <input name="Sexe" type="radio" value="masculin">Masculin
                                <input name="Sexe" type="radio" value="feminin">Feminin

                                @if ($errors->has('Sexe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Sexe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         


                           <div class="form-group{{ $errors->has('Age') ? ' has-error' : '' }}">
                            <label for="Age" class="col-md-4 control-label">Age</label>

                            <div class="col-md-6">
                                <input id="Age" type="text" class="form-control" name="Age" value="{{ old('Age') }}" required autofocus>

                                @if ($errors->has('Age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
