var existencias = '<?php echo $existenciasBajas;?>';

  if(existencias=="si"){
  
  Push.create("Favor de revisar existencias",{

  body: "Algunos de sus productos tienen menos de 6 piezas",
  icon: "assets/img/LOGOSA.png",
  timeout: 150000 
  });   

  }