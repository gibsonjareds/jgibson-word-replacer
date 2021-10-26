<?php
namespace JGibson\WordReplacer\Admin\Partials;

/**
  This is the admin area.

  @since 0.1.0

  @package    word-replacer
  @subpackage word-replacer/admin/partials
 */
?>
<div class="wrap">
		  <h2><?php echo \esc_html( get_admin_page_title() ); ?></h2>
		  <h2 class="nav-tab-wrapper">Words</h2>
		  <form method="post" name="cleanup_options" action="options.php">
		  <?php

			$options = \get_options( $this->plugin_name );
			$words   = $options['words'];
			?>

<?php
			  \settings_fields( $this->plugin_name );
			  \do_settings_sections( $this->plugin_name );
?>

		   <script>
			   window.replacingWords = JSON.parse("<?php echo json_encode( $words ); ?>") || [];
			   

			   </script>
		   <fieldset>
	 
			</fieldset>
			<div id="listOfReplacedWords">
				  <table>
				  <thead>
					<tr>
					  <th class="manage-column column-cb check-column" id="cb" scope="col"><input type="checkbox" /></th>
					  <th class="manage-column column-word" id="word" scope="col">Word</th>
					  <th class="manage-column column-replacement" id="replacement" scope="col">Repalcement</th>
					</tr>
				  </thead>
				   <tbody>
					 <word-pair
						v-for="(item, key, index) in list"
					   >
					   <tr>
						 <th class="check-column" scope="row"><input type="checkbox" name="selectedWords[]" value="key" /></th>
				  <td>{{key}}</td>
					  <td>{{item}}</td>
						  <input type="hidden" name="<?php echo $this->plugin_name; ?>-words[{{key}}]" value="{{item}}"/>
					   </tr>
					 </word-pair>
				  </tbody>
				  <tfoot>
					<tr>
					 <th class="manage-column column-cb check-column" id="cb" scope="col"><input type="checkbox" /></th>

					 <th class="manage-column column-word" id="word" scope="col">Word</th>        
					 <th class="manage-column column-replacement" id="replacement" scope="col">Repalcement</th>
					</tr>
				  </tfoot>
				  </table>
			</div>
</form>
</div>
