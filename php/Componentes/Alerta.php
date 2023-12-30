<?php
  

  function ViewAlert($mensaje) {
    return "<p role='alert' class='flex items-center justify-center w-1/2 mt-16 text-2xl font-semibold text-center alert alert-error'>

      $mensaje
    </p>";
}

?>