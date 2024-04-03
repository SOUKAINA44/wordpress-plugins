<h1>Lodin Payment</h1>
<?php settings_errors(); ?>

<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Paramètres</a></li>
		<li><a href="#tab-2">Mise a jour</a></li>
		<li><a href="#tab-3">A propos</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">
<style>

.nav-tabs {
	float: left;
	width: 100%;
	margin: 0;
	list-style-type: none;
	border-bottom: 1px solid transparent;
}

.nav-tabs > li {
	float: left;
	margin-bottom: -1px;
}

.nav-tabs > li > a {
	margin-right: 2px;
	line-height: 1.5;
	padding: 10px;
	border: 1px solid transparent;
	border-radius: 4px 4px 0 0;
	float: left;
	text-decoration: none;
}

.nav-tabs > li > a:hover {
	border-color: #eee #eee #ddd;
}

.nav-tabs > li.active > a,
.nav-tabs > li.active > a:hover,
.nav-tabs > li.active > a:focus {
	color: #555;
	cursor: default;
	background-color: #fff;
	border-color: transparent;
}

.tab-content > .tab-pane {
	float: left;
	width: 100%;
	display: none;
}

.tab-content > .tab-pane.active {
	display: block;
	padding: 10px;
	background-color: #fff;
	box-shadow: 0 5px 4px -2px rgba(0, 0, 0, 0.15);
}
</style>


<script>
window.addEventListener("load", function() {

// store tabs variables
var tabs = document.querySelectorAll("ul.nav-tabs > li");

for (i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener("click", switchTab);
}

function switchTab(event) {
    event.preventDefault();

    document.querySelector("ul.nav-tabs li.active").classList.remove("active");
    document.querySelector(".tab-pane.active").classList.remove("active");

    var clickedTab = event.currentTarget;
    var anchor = event.target;
    var activePaneID = anchor.getAttribute("href");

    clickedTab.classList.add("active");
    document.querySelector(activePaneID).classList.add("active");

}

});
</script>

  

<div class="wrap">
    <h1>Next-Gen payment with Lodin</h1>
    <img src="<?php echo plugin_dir_url( __FILE__ ) . 'logo1.png'; ?>"  style="max-width: 400px; height: auto; margin-bottom: 40px;">
    <form method="post" action="options.php">
        <?php settings_fields('lodin_settings_group'); ?>
        <?php do_settings_sections('lodin_settings_page'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Identifiant Lodin :</th>
                <td><input type="text" name="lodin_settings[identifier]" value="<?php echo isset(get_option('lodin_settings')['identifier']) ? esc_attr(get_option('lodin_settings')['identifier']) : ''; ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Code Secret :</th>
                <td><input type="text" name="lodin_settings[secret_code]" value="<?php echo isset(get_option('lodin_settings')['secret_code']) ? esc_attr(get_option('lodin_settings')['secret_code']) : ''; ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Accepter les conditions d'utilisation :</th>
                <td><input type="checkbox" name="lodin_settings[accept_conditions]" <?php echo (isset(get_option('lodin_settings')['accept_conditions']) && get_option('lodin_settings')['accept_conditions'] == 1) ? 'checked' : ''; ?> value="1" /></td>
            </tr>
        </table>
        <?php submit_button('Enregistrer '); ?>
    </form>
</div>





<?php

