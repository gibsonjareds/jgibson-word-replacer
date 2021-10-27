<?php
namespace JGibson\WordReplacer\Admin\Partials;

/**
  This is the admin area.

  @since 0.1.0

  @package    jg-word-replacer
  @subpackage jg-word-replacer/admin/partials
 */
?>
<div class="wrap">
		  <h2><?php echo \esc_html( get_admin_page_title() ); ?></h2>
		  <h2 class="nav-tab-wrapper">Words</h2>
		  <form method="post" name="jg_wordreplacer_options" action="options.php">
		  <?php

			$options = \get_option( $this->plugin_name );
			$words   = $options['words'];
			?>
	<?php
		\settings_fields( $this->plugin_name );
		\do_settings_sections( $this->plugin_name );
	?>



		   <script>
			   window.replacingWords = JSON.parse('<?php echo json_encode( $words ); ?>') || {foo:"bar"};
			   

			   </script>
				   <script type="text/html" id="wordPairTableRow">
						<li class="jg-word-item">
				  <span>{{word}}</span>
					  <span>{{replacement}}</span>
						  <span><button type="button" v-on:click="removeFromList(word)">Remove</button></span>
						  <input type="hidden" v-bind:id="'<?php echo $this->plugin_name; ?>-words-' + word" v-bind:name="'<?php echo $this->plugin_name; ?>[words][' + word + ']'" v-bind:value="replacement"/>
					   </li>

					 </script>
			<script type="text/html" id="createWordPair">
			  <div>
			<input type="text" placeholder="Word" v-model="word"/>
			<input type="text" placeholder="Replacement" v-model="replacement"/>
			<button v-on:click="addToList(word, replacement)" type="button">Add</button>
			  </div>
			</script>
			<div id="listOfReplacedWords">
				<add-word @added-word="handleAddedWord">
				</add-word>
				<ul class="jg-word-list">
					 <li class="jg-word-item header">
					   <span>Word</span>
					 <span>Replacement</span>
					 <span></span>
					 </li>
					 <word-pair
						v-for="(item, key, index) in list"
						v-bind:key="key"
						v-bind:word="key"
						v-bind:replacement="item"
						@removed-word="handleRemovedWord"
					  >
					 </word-pair>
				</ul>
			</div>
<?php \submit_button(); ?>
</form>
</div>
