<?php
/*
Plugin Name: Tampile temperature converter
Plugin URI: http://www.flamescorpion.com
Description: Convert any temperature: fahrenheit, celsius, kelvin and rankin.
Author: Lucian Apostol
Version: 1.2
Author URI: http://www.flamescorpion.com
*/


function tampile() 
{
  ?>
	<script type="text/javascript">
		function tampile_calculator(formhandler)  {
			if(formhandler.tampile_from.value==1) {
				if(formhandler.tampile_to.value==2) {
					formhandler.tampile_result.value = Math.round((formhandler.tampile_value.value-32)*5/9); 
				}
				if(formhandler.tampile_to.value==3) {
					formhandler.tampile_result.value = Math.round(((formhandler.tampile_value.value-32)*5/9)+273); 
				}
				if(formhandler.tampile_to.value==4) {
					formhandler.tampile_result.value = Math.round(formhandler.tampile_value.value*1+459.6); 
				}
			}

			if(formhandler.tampile_from.value==2) {
				if(formhandler.tampile_to.value==1) {
					formhandler.tampile_result.value = Math.round((formhandler.tampile_value.value*9/5)+32); 
				}
				if(formhandler.tampile_to.value==3) {
					formhandler.tampile_result.value = Math.round(formhandler.tampile_value.value*1+273); 
				}
				if(formhandler.tampile_to.value==4) {
					formhandler.tampile_result.value = Math.round((formhandler.tampile_value.value*9/5)+32+459.6); 
				}
			}

			if(formhandler.tampile_from.value==3) {
				if(formhandler.tampile_to.value==1) {
					formhandler.tampile_result.value = Math.round(((formhandler.tampile_value.value*1-273)*9/5)+32); 
				}
				if(formhandler.tampile_to.value==2) {
					formhandler.tampile_result.value = Math.round((formhandler.tampile_value.value*1)-273); 
				}
				if(formhandler.tampile_to.value==4) {
					formhandler.tampile_result.value = Math.round(((formhandler.tampile_value.value*1-273)*9/5)+32+459.6); 
				}
			}

			if(formhandler.tampile_from.value==4) {
				if(formhandler.tampile_to.value==1) {
					formhandler.tampile_result.value = Math.round(formhandler.tampile_value.value*1-459.6); 
				}
				if(formhandler.tampile_to.value==2) {
					formhandler.tampile_result.value = Math.round((formhandler.tampile_value.value*1-459.6-32)*5/9); 
				}
				if(formhandler.tampile_to.value==3) {
					formhandler.tampile_result.value = Math.round(((formhandler.tampile_value.value*1-459.6-32)*5/9)+273); 
				}
			}

			return false;
		}
	</script> 

	<form id="tampileform" onsubmit="return tampile_calculator(this);" method="post">
		<input type="text" name="tampile_value" id="tampile_value" size="9"; />
		<input type="text" name="tampile_result" id="tampile_result" size="9"; />
		<select name="tampile_from" id="tampile_from">
			<option value="1" SELECTED>Fahrenheit</option>
			<option value="2">Celsius</option>
			<option value="3">Kelvin</option>
			<option value="4">Rankin</option>
		</select>
		<select name="tampile_to" id="tampile_to">
			<option value="1">Fahrenheit</option>
			<option value="2" SELECTED>Celsius</option>
			<option value="3">Kelvin</option>
			<option value="4">Rankin</option>
		</select>
		<input type="submit" name="submit" id="submit" value="Convert" />
		<br><a href="http://www.tampile.com">Tampile temperature converter</a>
	</form>

  <?
}

function widgetTampile($args) {
  extract($args);
  echo $before_widget;
  echo $before_title;?>Temperature converter<?php echo $after_title;
  tampile();
  echo $after_widget;
}

function tampileInit()
{
  register_sidebar_widget(__('Tampile Temperature Converter'), 'widgetTampile');     
}
add_action("plugins_loaded", "tampileInit");
?>