<template>
  <div>
    <b-container >
    <b-form class="m-3" action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" v-model="csrfToken">

        {{csrfToken}}
      <b-form-group label="Correo Electronico:">
        <b-form-input 
                name="email" 
          v-model="user.email"
          type="email"
          disabled
          placeholder="Ingresartu Correo"
        ></b-form-input>
      </b-form-group>

      <b-form-group  label="Nombre:">
        <b-form-input
                name="name"
          v-model="user.name"
          required
          placeholder="Ingresa tu nombre"
        ></b-form-input>
      </b-form-group>
      <b-form-group  label="Nueva Contraseña (solo si decea modificar):">
        <b-form-input
                name="password"
          type="password" 
          placeholder="Ingresa una nueva contraseña"
        ></b-form-input>
      </b-form-group>   
      <b-form-group  label="Imagen de perfil (solo si decea modificar):">
        <b-form-file
            name="image"
          placeholder="sube una imagen"
        ></b-form-file>
      </b-form-group>
      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
    </b-container> 
 
  </div>
</template>

<script>
  export default {
    props:{
        user:Object,
        csrfToken:String,
    },
    data() {
      return {

      }
    },
    methods: {
   
     
    }
  }
</script>