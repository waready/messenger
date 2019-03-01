@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
            <b-card title="Register" class="my-4"> 
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

                <b-form  method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                    <b-form-group
                                label="Nombre"
                                label-for="name"
                                >
                        <b-form-input id="name"
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required autofocus
                                        >
                                        
                        </b-form-input>
                    </b-form-group>  
                    <b-form-group
                                label="Correo Electronico"
                                label-for="email"
                                description="no compartas tus correo con personas maliciosas.">
                        <b-form-input id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required 
                                        placeholder="ingresa aqui tu correo">
                                       
                        </b-form-input>
                    </b-form-group>
                    <b-form-group
                                label="Contraseña"
                                label-for="password">
                        <b-form-input id="password"
                                    type="password"
                                    name="password"
                                  
                                    required
                                   >
                                    
                        </b-form-input>
                    </b-form-group>
                    <b-form-group
                                label="Confirmar Contraseña"
                                label-for="password_confirmation">
                        <b-form-input id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    
                                    required
                                    >
                                    
                        </b-form-input>
                    </b-form-group>
                        <b-button type="submit"
                            variant="primary">ingresar                            
                        </b-button>
                        <b-button href="{{ route('login') }}"
                        variant="link">¿Ya estas registrado?
                        </b-button>
                        
                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>

   

@endsection
