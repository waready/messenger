<template>
    <b-row>
        <b-col cols="8">
            <b-card
            footer-bg-variant="light"
            footer-border-variant="dark"
            title="Conversacion Activa"
            class="h-100">

            <mensaje-conversation-component v-for="mensajes in mensages" 
            :key="mensajes.id"
            :writtenfromme="mensajes.written_by_me"
            >
                {{mensajes.content}}
            </mensaje-conversation-component>  

           
            <div slot="footer">
                <b-form @submit.prevent="postMenssages" class="mb-0" autocomplete="off">
                    <b-input-group>
                        <b-form-input class="text-center"
                        type="text"
                        v-model="newMensaje"
                        placeholder="Escrive un mensaje">
                        </b-form-input>
                        <b-input-group-append>
                        <b-button type="submit" variant="primary">
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

            <p>{{name}}</p>
            <hr>
            <b-form-checkbox>
                descativar notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>
<script>
export default {
    props:{
        contactId:Number,
        name: String
    },
    mounted(){
        this.getMenssages();
    },
    data(){
        return {
            mensages:[],
            newMensaje:"",
            
        }
    },
    methods:{
        getMenssages(){
            axios.get(`/api/messages?contact_id=${this.contactId}`).then((response) =>{
            console.log(response.data);
            this.mensages = response.data;
        });
        },
        postMenssages(){
            const params ={
                to_id:2,
                content:this.newMensaje,
            };
            axios.post('/api/messages', params).then((response)=>{
                if(response.data.success){
                    this.newMensaje="",
                    this.getMenssages();
                }else {

                }
            
            })
        }
    },
    watch:{
        contactId(value){
            console.log(`contactId => ${this.contactId}`);
            this.getMenssages();
        }
    }

}
</script>