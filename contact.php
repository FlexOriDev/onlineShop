<?php
include("inc/top.php"); 
include("actions/actionsUser/demandeDeContact.php"); 
?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="section group">				
<div class="col span_1_of_2">
<div class="contact_info">
<h3>Nous trouver</h3>
<div class="map">
<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2663.7180450132632!2d-1.6406079841372756!3d48.11567456066487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480edee434358f89%3A0x80705ecc3d08417a!2sISTIC%2C%20Bat%2012%20D!5e0!3m2!1sfr!2sfr!4v1653252078200!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><small><a href="https://goo.gl/maps/NUhVF9XMPu5ruSHq7">Voir en grand</a></small>
	</div>
	</div>
	<div class="company_address">
	<h3>Nous situer</h3>
	<p>Istic,</p>
	<p>Rennes 1, Beaulieu</p>
	<p>FRA</p>
	<p>Phone:(00) 222 666 444</p>
	<p>Fax: (000) 000 00 00 0</p>
	<p>Email: <span>info@mycompany.com</span></p>
	<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
	</div>
	</div>				
	<div class="col span_2_of_4">
	<div class="contact-form">
	<h3>Nous écrire</h3>
	<br>

	<?php 
	if(isset($_SESSION['auth'])){
		?>
		<form method="POST" name="myForm">
		<div>
		<span><label>Nom</label></span>
		<span><input name="userName" type="text" class="textbox" id="nom"></span>
		</div>
		<div>
		<span><label>Email</label></span>
		<span><input name="userEmail" type="text" class="textbox" id="mail"></span>
		</div>
		<div>
		<span><label>Téléphone</label></span>
		<span><input name="userPhone" type="text" class="textbox" id="telephone"></span>
		</div>
		<div>
		<span><label>Message</label></span>
		<span><input name="userMsg" type="text" class="textbox" id="msg"></span>
		</div>
		<div>
		<input type="submit" name="valider" value="Valider" onclick=isEmpty()/></p>

		</div>
		</form>
		<?php
	}
	?>

	<script type="text/javascript">
		function isEmpty(){
			var name = document.forms["myForm"]["userName"];   
			var mail = document.forms["myForm"]["userEmail"];   
			var phone = document.forms["myForm"]["userPhone"];   
			var msg = document.forms["myForm"]["userMsg"];  

			if (name.value == "") { 
        		alert("Mettez votre nom."); 
        		name.focus(); 
        		return false; 
    		}if (mail.value == "") { 
        		alert("Mettez votre mail."); 
        		mail.focus(); 
        		return false; 
    		}if (phone.value == "") { 
        		alert("Mettez votre téléphone."); 
        		phone.focus(); 
        		return false; 
    		}if (msg.value == "") { 
        		alert("Mettez votre message."); 
        		msg.focus(); 
        		return false; 
    		}

			return true  
			    
		}


	</script>

	<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
	</div>
	</div>				
	</div>
	<div class="clear"></div>
	</div>
	<!-- fin de la partie contenu -->
	
	<?php
	include("inc/bottom.php");
	?>