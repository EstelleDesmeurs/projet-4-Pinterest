<?php

foreach ($lecteur as $key => $value) {
                echo '<div class="grid-item"><a href="#'.$value.'"><img src="./tailleNormale/'.$value.'"></div>

                <div class="remodal" data-remodal-id="'.$value.'" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">

  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
 
<div>
    <h2 id="modal1Title">Remodal</h2>
    <p id="modal1Desc"><img src="./images/'.$value.'" ></p>
  </div>
  <br>
  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>

</div>'; 
                }

?>