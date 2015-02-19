<?php

/**
 * template file for Grid Disqus Settings Page
 *
 */

?>

<div class="wrap">
	<h2>Grid Disqus Settings</h2>
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"]."?page=grid-disqus-boxes-admin-menu"; ?>">

		<table class="form-table">
			<tr>
				<th scope="row"><label for="<?php echo $api_key_name; ?>">API Key</label></th>
				<td><input type="text" id="<?php echo $api_key_name; ?>" name="<?php echo $api_key_name; ?>" value="<?php echo $api_key; ?>" class="regular-text" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="<?php echo $access_token_name; ?>">Access Token</label></th>
				<td><input type="text" id="<?php echo $access_token_name; ?>" name="<?php echo $access_token_name; ?>" value="<?php echo $access_token; ?>" class="regular-text" /></td>
			</tr>
		</table>

		<?php submit_button('Save',"primary"); ?>

	</form>
</div>