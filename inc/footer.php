<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
if($_SESSION['nombreUser']!="" && $_SESSION['acceso']!=5){
$conSucLink=ejecutarSQL::consultar("SELECT*FROM sucursal WHERE idSucursal=".$_SESSION['sucursal']);
$dataSucLink=mysqli_fetch_array($conSucLink);
echo '<footer style="background:'.$dataSucLink['color'].';">';
}else if($_SESSION['acceso']==5){
  echo '<footer style="background-color:rgb(8, 17, 85);">';  
}else{
echo '<footer style="background-color:rgb(8, 17, 85);">';    
}
?>

<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '0.01'
          }
        }]
      });
    }
  }).render('#paypal-button-container');
</script>

   <!-- <h3 class="text-center">Siguenos en</h3><br>
    <ul class="list-unstyled text-center">
        <a href="#" class="social-icon all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Facebook">
            <img src="assets/icons/social-facebook.png" alt="facebook-icon">
        </a>
        <a href="#" class="social-icon all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Google +">
            <img src="assets/icons/social-googleplus.png" alt="googleplus-icon">
        </a>
        <a href="#" class="social-icon all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Linkedin">
            <img src="assets/icons/social-linkedin.png" alt="linkedin-icon">
        </a>
        <a href="#" class="social-icon all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Pinterest">
            <img src="assets/icons/social-pinterest.png" alt="pinterest-icon">
        </a>
        <a href="#" class="social-icon all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Twitter">
            <img src="assets/icons/social-twitter.png" alt="twitter-icon">
        </a>
    </ul>--
    <br><br><br>-->
    <h5 class="text-center tittles-pages-logo">STORE EWORK SOLUTIONS Design & Development by <a href="http://eworksolutions.com.mx">EworkSolutions</a> &copy; <?php echo date("Y");?></h5>
</footer>
