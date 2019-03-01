<template>
    <b-row>
        <b-col cols="8">
            <b-card
            footer-bg-variant="light"
            footer-border-variant="dark"
            title="Conversacion Activa"
            class="h-100">
            <div class="mb-2">
                <b-media vertical-align="center">
                    <b-img rounded="circle" slot="aside" blank blank-color="#ccc" width="48" alt="placeholder" />
                  
                    <b-card>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    </b-card>             
                
                </b-media>
            </div>
            <div class="mb-2">
                <b-media right-align vertical-align="center">
                    <b-img rounded="circle" slot="aside" blank blank-color="#ccc" width="48" alt="placeholder" />
                   
                    <b-card>
                        Cras sit amet nibh libero, in gravida nulla.
                    </b-card>                    
              
                </b-media>
            </div>
            <div slot="footer">
                <b-form class="mb-0">
                    <b-input-group>
                        <b-form-input class="text-center"
                        type="text"
                        placeholder="Escrive un mensaje">
                        </b-form-input>
                        <b-input-group-append>
                        <b-button variant="primary">
                            Enviar
                        </b-button>
                        </b-input-group-append>                        
                    </b-input-group>    
                </b-form>
            </div> 
            </b-card>
        </b-col>
        <b-col cols="4" class ='my-2'>
            <b-img rounded="circle" blank width= '60' height= '60' class= 'm1' blank-color="#777" alt="Center image" />

            <p>Usuario Seleccionado</p>
            <hr>
            <b-form-checkbox>
                descativar notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>
<script>
export default {
    
}
</script>