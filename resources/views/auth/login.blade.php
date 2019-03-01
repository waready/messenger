@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
          <b-card title="Login" class="my-4">
            
            @if($errors->any())
                <b-alert show variant="danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach                    
                    </ul>
                </b-alert>
            @else 
                <b-alert show> ingresa tus datos</b-alert>
            @endif

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

                        <b-button type="submit"
                            variant="primary">ingresar                            
                        </b-button>
                        <b-button href="{{ route('password.request') }}"
                            variant="link">¿Olvidaste tu contraseña?
                        </b-button>

                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
