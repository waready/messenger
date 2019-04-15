<template>
    <b-container fluid style="height: calc(100vh - 56px )">
        <b-row no-gutters>
            <b-col cols="4">
                <b-form class="my-3 px-2">
                    <b-form-input  class="text-center" type="text" 
                    v-model="search"
                    placeholder="Buscar contacto....">
                    </b-form-input>
                </b-form>            
                <contact-list-component 
                v-on:conversacionSelect="mostardatos($event)"
                :conversations="conversationFilter">
                </contact-list-component>        
            </b-col>
            <b-col cols="8">            
                <active-conversation-component
                v-if="selectConversation"
                :contactId="selectConversation.contact_id"
                :name="selectConversation.contact_name"
                :menssage="menssages"
                :imagen="selectConversation.contact_image"
                :myImagen="myImagenUrl"
                @messageCreated="addMessage($event)">

                </active-conversation-component>                    
            </b-col>
        </b-row>
    
    </b-container>
</template>
<script>
export default {
    props:{
        user: Object
    },

    data(){
        return {
            selectConversation:null,
            menssages:[],
            conversaciones:[],
            search:''
        }
    },
    mounted(){
        this.getConversation();
    
        Echo.private(`users.${this.user.id}`).
        listen('Messagesent',(data) => {
            const mensas = data.message;
            mensas.written_by_me = false;
            //this.menssages.push(mensas);
            this.addMessage(mensas);
        })
        Echo.join('messenger')
        .here((users)=>{
            users.forEach ( (user) => {
                this.changeStatus(user,true);
            });
        })
        .joining((user)=> {
            this.changeStatus(user,true);
        })
        .leaving((user)=>{
            this.changeStatus(user,false);              
        })
    },
    methods:{
        mostardatos(datos){

            this.selectConversation = datos;
            //console.log(this.selectConversation);
            this.getMenssages();
        },
        getMenssages(){
            axios.get(`/api/messages?contact_id=${this.selectConversation.contact_id}`).then((response) =>{
           // console.log(response.data);
            this.menssages = response.data;
            });
        },
        addMessage(menssage){
            console.log('este no es el user');
           const conver = this.conversaciones.find((conversation) => {
                return conversation.contact_id == menssage.from_id || conversation.contact_id == menssage.to_id;
            });
            const autor = this.user.id === menssage.from_id ? "Tu" : conver.contact_name;
            conver.last_message = `${autor}: ${menssage.content}`;
            conver.last_time = menssage.created_at;

            if(this.selectConversation.contact_id == menssage.from_id ||  this.selectConversation.contact_id == menssage.to_id){
                
                console.log("funciona", this.selectConversation.contact_id, menssage);
                this.menssages.push(menssage);
                
            }
            else {
                console.log('este no es el user', this.selectConversation.contact_id)
            }
            
        },
        getConversation(){
            axios.get('api/conversations').then((response)=>{
                console.log( "conversasafshaj",response.data)
                this.conversaciones = response.data;
            })
        },
        changeStatus( user , status){
            const index = this.conversaciones.findIndex((conversation) => {
                return conversation.contact_id == user.id
            })
            if(index >= 0)
                this.$set(this.conversaciones[index], "online", status )
        }
    },
    computed:{
        conversationFilter(){
           return this.conversaciones.filter((conver) => conver.contact_name.toLowerCase().includes(this.search.toLowerCase()) )
           //return this.juegos.filter((items)=> items.titulo.includes(this.mensaje));
        },
        myImagenUrl(){
            return `/users/${this.user.image}`
        }
    }
    
}
</script>