(function($){
  $(document).ready(function(){
    Vue.component('word-pair', {
        props: ['word', 'replacement'],
        template:"#wordPairTableRow",
        methods: {
            removeFromList(key){
                this.$emit('removed-word', this.word);
            }
        }
    });
    Vue.component('add-word', {
        data(){
            return {
                word:'',
                replacement:''
            };
        },
        template: '#createWordPair',
        methods: {
            addToList(word, replacement){
                this.$emit('added-word', {word:this.word, replacement:this.replacement});
                this.word="";
                this.replacement="";
             }
        }
        
    });

    var app = new Vue({
    el:"#listOfReplacedWords",
    data(){
        return {
            list:{}
        };
    },
    methods:{
        handleRemovedWord(value){
            delete this.list[value];
            this.updateList();
        },
        handleAddedWord(value){
            if(!this.list[value.word]){
                this.list[value.word] = value.replacement;
            }
            this.updateList();
        },
        updateList(){
            var oldList = this.list;
            this.list = {};
            this.$nextTick(function(){
                this.list = oldList;
            });
        }
    },
        mounted(){
            if( !Array.isArray( window.replacingWords ) )
            this.list = window.replacingWords;
        }
  });

 });
})(jQuery);
