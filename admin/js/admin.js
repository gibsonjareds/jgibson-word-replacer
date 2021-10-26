var app = new Vue({
    el:"listOfReplacedWords",
    data(){
        return {
            list:[]
        };
    },
    methods:{
        intializeList(list){
            this.list  = window.replacingWords || [];
        },
        removeFromList(key){
            delete this.list[key];
        },
        addToList(key,value){
            if(!this.list[key]){
                this.list[key] = value;
            }
        }
    }
});
Vue.component('word-pair', {
    
});
Vue.component('add-word', {

});
