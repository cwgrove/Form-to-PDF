<?php

/*
 * Plugin Name: Guardian Group Questionair
 * Plugin URI: 
 * Description: This plugin creates a shortcode to embed a questionair form. [gg_questionair]
 * Version: 1.0.0
 * Author: Christopher Grove
 * Author URI: 
 * License: GPL v2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: gg-questionair
 * Domain Path: 
 */
 
 function save_to_pdf(){
	 
	 //$a = $_POST;
	 
	
	// print_r($a);
	 
	if(isset($_POST['submit'])){
		//Set date and unix timestamp to create uniquely name files
		$today = date('m-d-Y');
		$timestamp = time() - date('Z');
		
		//get the plugins directory
		$plugins_url = __DIR__;
		
		//Sets the uploads directory of uploaded image files and moves them there
		$target_file = $plugins_url . "/uploads/" . $timestamp . basename($_FILES["photo"]["name"]);
		move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

		//Used to generate a dynamic URL to view the uploaded file. This is a link in the pdf
		$uploaded_file = "uploads/" . $timestamp . basename($_FILES["photo"]["name"]);
		//$uploaded_directory = $_SERVER['DOCUMENT_ROOT'].'/'.$uploaded_file;
		$uploaded_directory = site_url().'/wp-content/plugins/form-to-pdf-master/'.$uploaded_file;
		
		//collect form data
		$traffick_drop_down = $_POST["traffick-drop-down"];
		$photo = basename($_FILES["photo"]["name"]);
		$trafficker_name = $_POST["trafficker-name"];
		$alias_nickname = $_POST["alias-nickname"];
		$height = $_POST["height"];
		$weight = $_POST["weight"];
		$approximate_age = $_POST["approximate-age"];
		$home_or_work_address = $_POST["home-or-work-address"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$gender = $_POST["gender"];
		$hair_color = $_POST["hair-color"];
		$phone_number = $_POST["phone-number"];
		$email_address = $_POST["email-address"];
		$facebook_link = $_POST["facebook-link"];
		$instagram_link = $_POST["instagram-link"];
		$twitter_link = $_POST["twitter-link"];
		$other = $_POST["other"];
		$physical_characteristics = $_POST["physical-characteristics"];
		$vehicle_license_plate = $_POST["vehicle-license-plate"];
		$vehicle_type = $_POST["vehicle-type"];
		$vehicle_color = $_POST["vehicle-color"];
		$additional_comments = $_POST["additional-comments"];
		$what_room_or_location_did_activity_occur_in = $_POST["what-room-or-location-did-activity-occur-in"];
		$how_did_trafficker_victim_and_customer_all_communicate_with_each_other = $_POST["how-did-trafficker-victim-and-customer-all-communicate-with-each-other"];
		$provide_all_information_asw_that_room = $_POST["provide-all-information-asw-that-room"];
		$what_other_locations_are_used_by_trafficker_and_victim = $_POST["what-other-locations-are-used-by-trafficker-and-victim"];
		$what_kind_of_activity_occurred = $_POST["what-kind-of-activity-occurred"];
		$how_did_the_customer_arrive = $_POST["how-did-the-customer-arrive"];
		$what_time_and_day_did_activity_occur = $_POST["what-time-and-day-did-activity-occur"];
		$who_picks_up_victim_after_activity_concludes = $_POST["who-picks-up-victim-after-activity-concludes"];
		$how_many_victimsescorts_per_trafficker = $_POST["how-many-victimsescorts-per-trafficker"];
		$how_did_victim_andor_trafficker_arrive = $_POST["how-did-victim-andor-trafficker-arrive"];
		$what_frequency_does_activity_take_place_at_this_location = $_POST["what-frequency-does-activity-take-place-at-this-location"];
		$how_are_transactions_asw_activity_recorded = $_POST["how-are-transactions-asw-activity-recorded"];
		$how_long_does_activity_typically_occur = $_POST["how-long-does-activity-typically-occur"];
		$how_many_transactions_per_day_for_escort = $_POST["how-many-transactions-per-day-for-escort"];

		//create html of the data
		ob_start();
		?>

		<!-- Print out Data in pdf format -->
		<h1>Data from form</h1>
		<p><strong>Individual:</strong> <?php echo $traffick_drop_down;?></p>
		<!-- Checks to see if an image was uploaded. If not then do not display link -->
		<?php if($photo){ ?>
			<p><strong>File:</strong> <a href="<?php echo $uploaded_directory;?>">View</a></p>
		<?php } ?>
		<p><strong>Trafficker Name:</strong> <?php echo $trafficker_name;?></p>
		<p><strong>Alias or Nickname:</strong> <?php echo $alias_nickname;?></p>
		<p><strong>Height:</strong> <?php echo $height;?></p>
		<p><strong>Weight:</strong> <?php echo $weight;?></p>
		<p><strong>Approximate Age:</strong> <?php echo $approximate_age;?></p>
		<p><strong>Home or Work Address:</strong> <?php echo $home_or_work_address;?></p>
		<p><strong>City:</strong> <?php echo $city;?></p>
		<p><strong>State:</strong> <?php echo $state;?></p>
		<p><strong>Gender:</strong> <?php echo $gender;?></p>
		<p><strong>Hair Color:</strong> <?php echo $hair_color;?></p>
		<p><strong>Phone Number:</strong> <?php echo $phone_number;?></p>
		<p><strong>Email Address:</strong> <?php echo $email_address;?></p>
		<p><strong>Facebook Link:</strong> <?php echo $facebook_link;?></p>
		<p><strong>Instagram Link:</strong> <?php echo $instagram_link;?></p>
		<p><strong>Twitter Link:</strong> <?php echo $twitter_link;?></p>
		<p><strong>Other:</strong> <?php echo $other;?></p>
		<p><strong>Physical Characteristics:</strong> <?php echo $physical_characteristics;?></p>
		<p><strong>Vehicle License Plate:</strong> <?php echo $vehicle_license_plate;?></p>
		<p><strong>Vehicle Type:</strong> <?php echo $vehicle_type;?></p>
		<p><strong>Vehicle Color:</strong> <?php echo $vehicle_color;?></p>
		<p><strong>Additional Comments:</strong> <?php echo $additional_comments;?></p>
		<br>
		<p><strong>What room or location did the activity occur in?:</strong> <?php echo $what_room_or_location_did_activity_occur_in;?></p>
		<p><strong>How did trafficker victim and customer all communicate with each other?:</strong> <?php echo $how_did_trafficker_victim_and_customer_all_communicate_with_each_other;?></p>
		<p><strong>Provide all information ASW that room (name, credit card, phone number, driver's license info, address of person room checked out to):</strong> <?php echo $provide_all_information_asw_that_room;?></p>
		<p><strong>What other locations are used by trafficker and victim?:</strong> <?php echo $what_other_locations_are_used_by_trafficker_and_victim;?></p>
		<p><strong>What kind of activity occurred?:</strong> <?php echo $what_kind_of_activity_occurred;?></p>
		<p><strong>How did the customer arrive?:</strong> <?php echo $how_did_the_customer_arrive;?></p>
		<p><strong>What time and day did activity occur?:</strong> <?php echo $what_time_and_day_did_activity_occur;?></p>
		<p><strong>Who picks up victim (if different than arrival transport) after activity concludes? Provide vehicle description/license.:</strong> <?php echo $who_picks_up_victim_after_activity_concludes;?></p>
		<p><strong>How many victims/escorts per trafficker?:</strong> <?php echo $how_many_victimsescorts_per_trafficker;?></p>
		<p><strong>How did victim and/or trafficker arrive?:</strong> <?php echo $how_did_victim_andor_trafficker_arrive;?></p>
		<p><strong>What frequency does activity take place at this location (per week/month)?:</strong> <?php echo $what_frequency_does_activity_take_place_at_this_location;?></p>
		<p><strong>How are transactions ASW activity recorded (cash/lists/by phone/etc.)?:</strong> <?php echo $how_are_transactions_asw_activity_recorded;?></p>
		<p><strong>How long does activity typically occur?:</strong> <?php echo $how_long_does_activity_typically_occur;?></p>
		<p><strong>How many transactions per day for escort?:</strong> <?php echo $how_many_transactions_per_day_for_escort;?></p>
		<p><strong>How many transactions per day for escort?:</strong> <?php echo $how_many_transactions_per_day_for_escort;?></p>


		<?php 
		$body = ob_get_clean();

		$body = iconv("UTF-8","UTF-8//IGNORE",$body);

		require_once __DIR__ . '/vendor/autoload.php';
		
		$mpdf=new \mPDF('c','A4','','' , 0, 0, 0, 0, 0, 0); 

		//write html to PDF
		$mpdf->WriteHTML($body);
 
		//output pdf
		//$mpdf->Output('demo.pdf','D');

		//open in browser
		//$mpdf->Output();

		//save to server
		$save_pdf = $plugins_url . '/uploads/' . $today . ' ' . $timestamp . '.pdf';
		$mpdf->Output($save_pdf,'F');

echo "<p>This will be a thank you page<br/> The report will be emailed to you.<br/> 
You can view it <a href='".site_url()."/wp-content/plugins/form-to-pdf-master/uploads/". $today . ' ' . $timestamp . ".pdf'>here</a></p>";
		
	}
}
add_action( 'admin_post_nopriv_sapphire_submit', 'save_to_pdf' );
add_action( 'admin_post_sapphire_submit', 'save_to_pdf' );


add_shortcode( 'gg_questionair', 'gg_embed_form' );
function gg_embed_form( $atts ) {
?> 

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
.form-group {
    clear: both;
}
</style>


<form action='/wp-admin/admin-post.php' method='post' enctype="multipart/form-data">
<input type="hidden" name="action" value="sapphire_submit">
<fieldset>

<!-- Form Name -->
<legend>Sex Trafficking Identification</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="traffick-drop-down">Individual</label>
  <div class="col-md-4">
    <select id="traffick-drop-down" name="traffick-drop-down" class="form-control">
      <option value="Trafficker (Pimp or 'Bottom' or other)">Trafficker (Pimp or 'Bottom' or other)</option>
      <option value="Customer (John)">Customer (John)</option>
      <option value="Victim (Escort)">Victim (Escort)</option>
    </select>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="uploaded-photo">Photo Upload</label>
  <div class="col-md-4">
    <input id="photo" name="photo" class="input-file" type="file">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="trafficker-name">Trafficker Name</label>  
  <div class="col-md-4">
  <input id="trafficker-name" name="trafficker-name" type="text" placeholder="Trafficker Name" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="alias-nickname">Alias or Nickname</label>  
  <div class="col-md-4">
  <input id="alias-nickname" name="alias-nickname" type="text" placeholder="Alias or Nickname" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="height">Height</label>  
  <div class="col-md-4">
  <input id="height" name="height" type="text" placeholder="5'11" "="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="weight">Weight</label>  
  <div class="col-md-4">
  <input id="weight" name="weight" type="text" placeholder="185 lbs" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="approximate-age">Approximate Age</label>  
  <div class="col-md-4">
  <input id="approximate-age" name="approximate-age" type="text" placeholder="20" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="home-or-work-address">Home or Work Address</label>  
  <div class="col-md-4">
  <input id="home-or-work-address" name="home-or-work-address" type="text" placeholder="1234 Washington Ave" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="city">City</label>  
  <div class="col-md-4">
  <input id="city" name="city" type="text" placeholder="City" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="state">State</label>  
  <div class="col-md-4">
  <input id="state" name="state" type="text" placeholder="State" class="form-control input-md">
    
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="gender">Gender</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="gender-0">
      <input type="radio" name="gender" id="gender-0" value="Male" checked="checked">
      Male
    </label>
	</div>
  <div class="radio">
    <label for="gender-1">
      <input type="radio" name="gender" id="gender-1" value="Female">
      Female
    </label>
	</div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="hair-color">Hair Color</label>  
  <div class="col-md-4">
  <input id="hair-color" name="hair-color" type="text" placeholder="Hair Color" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone-number">Phone Number</label>  
  <div class="col-md-4">
  <input id="phone-number" name="phone-number" type="text" placeholder="(555)123-4567" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email-address">Email Address</label>  
  <div class="col-md-4">
  <input id="email-address" name="email-address" type="text" placeholder="example@example.com" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="facebook-link">Facebook Link</label>  
  <div class="col-md-4">
  <input id="facebook-link" name="facebook-link" type="text" placeholder="Facebook Link" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="instagram-link">Instragram Link</label>  
  <div class="col-md-4">
  <input id="instagram-link" name="instagram-link" type="text" placeholder="Instagram Link" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="twitter-link">Twitter Link</label>  
  <div class="col-md-4">
  <input id="twitter-link" name="twitter-link" type="text" placeholder="Twitter Link" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="other">Other</label>  
  <div class="col-md-4">
  <input id="other" name="other" type="text" placeholder="Other" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="physical-characteristics">Physical Characteristics</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="physical-characteristics" name="physical-characteristics"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vehicle-license-plate">Vehicle License Plate</label>  
  <div class="col-md-4">
  <input id="vehicle-license-plate" name="vehicle-license-plate" type="text" placeholder="Vehicle License Plate" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vehicle-type">Vehicle Type</label>  
  <div class="col-md-4">
  <input id="vehicle-type" name="vehicle-type" type="text" placeholder="Vehicle Type" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vehicle-color">Vehicle Color</label>  
  <div class="col-md-4">
  <input id="vehicle-color" name="vehicle-color" type="text" placeholder="Vehicle Color" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="additional-comments">Additional Comments</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="additional-comments" name="additional-comments"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="what-room-or-location-did-activity-occur-in">What room or location did activity occur in?</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="what-room-or-location-did-activity-occur-in" name="what-room-or-location-did-activity-occur-in"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="how-did-trafficker-victim-and-customer-all-communicate-with-each-other">How did trafficker, victim, and customer all communicate with each other?</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="how-did-trafficker-victim-and-customer-all-communicate-with-each-other" name="how-did-trafficker-victim-and-customer-all-communicate-with-each-other"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="provide-all-information-asw-that-room">Provide all information ASW that room (name, credit card, phone number, driver's license info, address of person room checked out to)</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="provide-all-information-asw-that-room" name="provide-all-information-asw-that-room"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="what-other-locations-are-used-by-trafficker-and-victim">What other locations are used by trafficker and victim?</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="what-other-locations-are-used-by-trafficker-and-victim" name="what-other-locations-are-used-by-trafficker-and-victim"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="what-kind-of-activity-occurred">What kind of activity occurred?</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="what-kind-of-activity-occurred" name="what-kind-of-activity-occurred"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="how-did-the-customer-arrive">How did the customer arrive?</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="how-did-the-customer-arrive" name="how-did-the-customer-arrive"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="what-time-and-day-did-activity-occur">What time and day did activity occur?</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="what-time-and-day-did-activity-occur" name="what-time-and-day-did-activity-occur"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="who-picks-up-victim-after-activity-concludes">Who picks up victim (if different than arrival transport) after activity concludes? Provide vehicle description/license.</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="who-picks-up-victim-after-activity-concludes" name="who-picks-up-victim-after-activity-concludes"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="how-many-victimsescorts-per-trafficker">How many victims/escorts per trafficker?  </label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="how-many-victimsescorts-per-trafficker" name="how-many-victimsescorts-per-trafficker"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="how-did-victim-andor-trafficker-arrive">How did victim and/or trafficker arrive? </label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="how-did-victim-andor-trafficker-arrive" name="how-did-victim-andor-trafficker-arrive"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="what-frequency-does-activity-take-place-at-this-location">What frequency does activity take place at this location (per week/month)?</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="what-frequency-does-activity-take-place-at-this-location" name="what-frequency-does-activity-take-place-at-this-location"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="how-are-transactions-asw-activity-recorded">How are transactions ASW activity recorded (cash/lists/by phone/etc.)?</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="how-are-transactions-asw-activity-recorded" name="how-are-transactions-asw-activity-recorded"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="how-long-does-activity-typically-occur">How long does activity typically occur?</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="how-long-does-activity-typically-occur" name="how-long-does-activity-typically-occur"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="how-many-transactions-per-day-for-escort">How many transactions per day for escort?</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="how-many-transactions-per-day-for-escort" name="how-many-transactions-per-day-for-escort"></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>
<?php } ?>