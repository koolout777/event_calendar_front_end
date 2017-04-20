<div class="col-md-4 col-md-offset-4" style="background-color:#eee; padding:20px;">
    <div class="modal-header text-center"><i class='fa fa-edit'></i><b> EDIT EVENT</b></div><br>
    <?php
      $action_url= base_url().'events/update/'.$event->event_id;
    ?>
      <form id="testForm" method="POST" action="<?php echo $action_url ?>">
        <?php 
          $types = array('text','text','datetime-local','datetime-local');
          $names = array('event_id','event_title','event_start_date','event_end_date');
          $placeholders = array('Event ID','Event Title','Start Date & Time', 'End Date & Time');
          $classes = array('fa-bookmark-o','fa-calendar','fa-clock-o','fa-clock-o');
          $help=array('1', 'Colors Day','mm/dd/yyyy 00:00 AM','01/01/2014 07:30 AM');
          $ctr = 0;
          foreach ($placeholders as $placeholder) {
            echo "<div class='input-group'>";
              echo "<span class='input-group-addon'>";
                echo "<i class='fa ".$classes[$ctr]." fa-fw'></i>";
              echo "</span>";
              if($names[$ctr] =='event_id'){$value=""; $access="disabled"; } else { $value=""; $access="required";}
              echo "<input class='form-control' type='".$types[$ctr]."' name='".$names[$ctr]."' placeholder='".$placeholder."' value='".$event->$names[$ctr]."' $access>";
            echo "</div><p class='help-block'>Example: $help[$ctr]</p>";
            if($ctr==1){
              echo "<textarea class='form-control' rows='3' name='event_description' placeholder='Add short description here...' required>$event->event_description</textarea><br>";
              echo "<select style='background-color:#eee;' class='form-control' name='event_type'>";
                    if($event->event_type == "Official"){ $off="selected"; $oth=""; } else{ $off=""; $oth="selected"; };
                      echo "<option value='Official' $off>Official University Event</option>
                            <option value='Others' $oth>Other University Event</option>
                    </select><br>";
            }
            $ctr++;
          }
        ?> 
        <?php 
          if(isset($validation)){
            if($validation == 1){ 
              echo "<div class='col-md-12 text-center alert alert-success fade in' role='alert'>
                        <p class='col-md-12'><b>Successfully Updated!</b></p>
                      </div>";
            }
            else if($validation == 0){ 
              echo "<div class='col-md-12 text-center alert alert-danger fade in' role='alert'>
                      <p class='col-md-12'><b>Event title/description. Try again!</b></p>
                    </div>";
            }
            else if($validation == 2){ 
              echo "<div class='col-md-12 text-center alert alert-danger fade in' role='alert'>
                      <p class='col-md-12'><b>Invalid dates. Try again!</b></p>
                    </div>";
            }
            else if($validation == 3){ 
              echo "<div class='col-md-12 text-center alert alert-danger fade in' role='alert'>
                      <p class='col-md-12'><b>Event title already taken. Try again!</b></p>
                    </div>";
            }
          }
        ?>                    
        <div class="form-group text-right">  
          <input class="btn btn-info" type="submit" value="Update Event"/>
        </div>
      </form>
    </div>
  </div>       