<?
namespace JGibson\WordReplacer\Includes;

require_once \plugin_dir_path( __FILE__ ) . 'traits/trait-uses-plugin-meta.php';
class Activator {
    use Traits\UsesPluginMeta;
    public function activate(){
        \add_option($this->plugin_name, ['words'=>["foo"=>"bar"]]);
    }
}
