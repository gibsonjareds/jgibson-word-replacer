<?php
namespace JGibson\WordReplacer\Includes;

require_once \plugin_dir_path( __FILE__ ) . 'traits/trait-uses-plugin-meta.php';

class Filter {

    use Traits\UsesPluginMeta;

    protected $options;

    public function __construct() {
        $this->options = \get_option( $this->plugin_name );
    }

    public function filter_content( $content ) {
        $newContent = $content;
        $words = isset( $this->options['words'] ) && is_array( $this->options['words'] ) ? $this->options['words'] : [] ;
        
        foreach($words as $word => $replacement){
            $pattern = '/(>)([a-zA-Z0-9\_\-\.\,\'\"\ \;\:]*)(' . $word . ')([a-zA-Z0-9\_\-\.\,\'\"\ \;\:]*)(<\/)/';
            do{
                $newContent = preg_replace($pattern, '$1$2'. esc_html( $replacement ) . '$4$5', $newContent);
            }while(preg_match($pattern, $newContent));
        }
        return $newContent;
    }
}
