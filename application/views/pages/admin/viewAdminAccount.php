
<br><div class="col-md-4 col-md-offset-4" style="background-color:#eee; padding:20px;">
    <div class="modal-header text-center"><i class='fa fa-edit'></i><b> EDIT ACCOUNT</b></div><br>
    <?php
      $action_url= base_url().'view_account/update/'.$admin->admin_id;
    ?>
      <form id="testForm" method="POST" action="<?php echo $action_url ?>">
      <?php 
        $types = array('text','username','email', 'password');
        $names = array('admin_id','username','email', 'password');
        $placeholders = array('-','Username','Email','Input Password');
        $classes = array('fa-bookmark-o','fa-user', 'fa-envelope-o','fa-key');
        $help=array('1', 'torres.jameelalourdes', 'jamtorres010395@gmail.com', 'oblivion762');
        $ctr = 0;
        foreach ($placeholders as $placeholder) {
          echo "<div class='input-group'>";
            echo "<span class='input-group-addon'>";
              echo "<i class='fa ".$classes[$ctr]." fa-fw'></i>";
            echo "</span>";
            if($names[$ctr] =='admin_id' || $names[$ctr] =='username'){ $access="disabled"; } else {$access="required";}
            if($names[$ctr] =='password'){ $admin->password=""; }
            echo "<input class='form-control' type='".$types[$ctr]."' name='".$names[$ctr]."' placeholder='".$placeholder."' value='".$admin->$names[$ctr]."' $access>";
          echo "</div><p class='help-block'>Example: $help[$ctr]</p>";
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
                    <p class='col-md-12'><b>Invalid email address. Try again!</b></p>
                  </div>";
          }
          else if($validation == 2){ 
            echo "<div class='col-md-12 text-center alert alert-danger fade in' role='alert'>
                    <p class='col-md-12'><b>Invalid password. Try again!</b></p>
                  </div>";
          }
        }
      ?>               
      <div class="form-group text-right">  
        <input class="btn btn-info" type="submit" value="Update Account"/>
      </div>
    </form>
  </div>



       