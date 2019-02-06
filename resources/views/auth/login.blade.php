@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
          <b-card title="Login">
            <b-alert show> ingresa tus datos</b-alert>

                <b-form  method="POST" action="{{ route('login') }}">
                      {{ csrf_field() }}
                  <b-form-group
                                label="Correo Electronico"
                                label-for="email"
                                description="no compartas tus correo con personas maliciosas.">
                       <b-form-input id="email"
                                     type="email"
                                     name="email"
                                     value="{{ old('email') }}"
                                     required autofocus
                                     placeholder="ingresa aqui tu correo">
                                     @if ($errors->has('email'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('email') }}</strong>
                                         </span>
                                     @endif
                       </b-form-input>
                     </b-form-group>
                     <b-form-group
                                   label="Contraseña"
                                   label-for="password">
                          <b-form-input id="password"
                                        type="password"
                                        name="password"
                                        value="{{ old('password') }}"
                                        required
                                        placeholder="ingresa aqui tu contraseña">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                          </b-form-input>
                        </b-form-group>
                        <b-form-group>
                          <b-form-checkbox name="remember"
                                           {{ old('remember') ? 'checked="true"' : '' }}>
                                            Recordar sesion
                          </b-form-checkbox>
                        </b-form-group>

                          <b-button href="{{ route('password.request') }}"
                                    variant="primary">ingresar</b-button>
                          <b-button type="submit"
                                    variant="link">olvidaste tu contraseña?</b-button>

                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
