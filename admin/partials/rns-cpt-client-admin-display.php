<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rns_Cpt_Client
 * @subpackage Rns_Cpt_Client/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<table style="width:100%">
  <tr>
    <td class="field-heading">
      <label for="post_title"><?php _e( 'Client Name', 'prfx-textdomain' )?></label>
    </td>
    <td>
      <input type="text" name="post_title" value="<?php  echo the_title(); ?>" />
    </td>
  </tr>
  <tr>
    <td class="field-heading">
      <label for="website" class="prfx-row-title"><?php _e( 'Website', 'prfx-textdomain' )?></label>
    </td>
    <td>
      <input type="text" name="website" value="<?php if ( isset ( $client_org_website['client_org_website'] ) ) echo $client_org_website['client_org_website'][0]; ?>" />
    </td>
  </tr>
  <tr>
    <td class="field-heading">  
      <label for="name" class="prfx-row-title"><?php _e( 'Person Name', 'prfx-textdomain' )?></label>
    </td>
    <td>
      <input type="text" name="name" value="<?php if ( isset ( $client_per_name['client_person_name'] ) ) echo $client_per_name['client_person_name'][0]; ?>" />
    </td>
  </tr>
  <tr>
    <td class="field-heading">
      <label for="per_desig" class="prfx-row-title"><?php _e( 'Person Designation', 'prfx-textdomain' )?></label>
    </td>
    <td>
      <input type="text" name="per_desig" value="<?php if ( isset ( $client_per_designation['client_person_designation'] ) ) echo $client_per_designation['client_person_designation'][0]; ?>" />
    </td>
  </tr>
</table>