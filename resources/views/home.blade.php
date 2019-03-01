@extends('layouts.app')

@section('content')
<b-container>
    <b-row>
        <b-col cols="4">
            <b-form-input  class=" my-1 text-center" type="text"
            placeholder="Buscar contacto....">
            </b-form-input>
            <b-row class="p-2" align-h="center">
                <b-col cols="12" md="3">
                    <b-img rounded="circle" blank width= '60' height= '60' class= 'm1' blank-color="#777" alt="Center image" />
                </b-col>
                <b-col cols="6" align-self="center" class="d-none d-md-block">
                    <p class="mb-1">Juan Ramos</p>
                    <p class="text-muted small mb-1">Tu: hasta luego</p>
                </b-col>
                <b-col cols="3" class="d-none d-md-block">
                    <p class="text-muted small">20:31 pm</p>
                </b-col>
            </b-row>
           
        </b-col>
        <b-col cols="8"></b-col>
    </b-row>
</b-container>
@endsection
