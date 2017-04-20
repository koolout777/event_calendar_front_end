
<div>
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li class="active"><a href="#home" role="tab" data-toggle="tab"><b>Active User Accounts</b></a></li>
      <li class=""><a href="#profile" role="tab" data-toggle="tab"><b>Pending User Accounts</b></a></li>
      <li class=""><a href="#blockedacc" role="tab" data-toggle="tab"><b>Blocked User Accounts</b></a></li>
      <li class="pull-right">&nbsp;&nbsp;<button type="submit" class="btn btn-info fa fa-times btn-delete" data-toggle="tooltip" data-placement="top" title="Delete Multiple"></button></li>
      <li class="pull-right">&nbsp;&nbsp;<button type="submit" class="btn btn-info fa fa-check btn-approve" data-toggle="tooltip" data-placement="top" title="Approve/Unblock Multiple"></button></li>
      <!--<li class="pull-right">&nbsp;&nbsp;<button type="button" class="btn btn-info fa fa-plus" data-toggle="modal" data-target="#myModalUpUser"></button>-->
      <li class="pull-right">&nbsp;&nbsp;<button type="submit" class="btn btn-default fa fa-refresh btn-reload" data-toggle="tooltip" data-placement="top" title="Reload Table"></button></li>
    </ul>
    <ul class="pull-right">
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade active in" id="home">
        <table class="table table-striped table-bordered table-hover" data-toggle="table" data-url="<?php echo base_url(); ?>users/get_all_users_active" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-columns="true" data-pagination="true" data-search="true">
          <thead><br>
              <tr>
                  <th data-checkbox="true"></th>
                  <th data-field="id_no" data-sortable="true" data-align="center">ID</th>
                  <th data-field="username" data-sortable="true">Username</th>
                  <th data-field="fname" data-sortable="true">First Name</th>
                  <th data-field="lname" data-sortable="true">Last Name</th>
                  <th data-field="course" data-sortable="true">Course</th>
                  <th data-field="year" data-sortable="true" data-align="center">Year</th>
                  <th data-field="email" data-sortable="true">Email</th>
                  <th data-field="status" data-sortable="true">Status</th>
                  <th data-field="action" data-formatter="actionFormatterActive" data-events="actionEvents" class="text-center">Action</th>
              </tr>
          </thead>
        </table>
      </div>

      <div class="tab-pane fade" id="profile">
        <table class="table table-striped table-bordered table-hover" data-toggle="table" data-url="<?php echo base_url(); ?>users/get_all_users_pending" data-sort-name="id_no" data-sort-order="id_no" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-columns="true" data-pagination="true" data-search="true">
          <thead><br>
              <tr>
                  <th data-checkbox="true"></th>
                  <th data-field="id_no" data-sortable="true" data-align="center">ID</th>
                  <th data-field="username" data-sortable="true">Username</th>
                  <th data-field="fname" data-sortable="true">First Name</th>
                  <th data-field="lname" data-sortable="true">Last Name</th>
                  <th data-field="course" data-sortable="true">Course</th>
                  <th data-field="year" data-sortable="true" data-align="center">Year</th>
                  <th data-field="email" data-sortable="true">Email</th>
                  <th data-field="status" data-sortable="true">Status</th>
                  <th  data-field="action" data-formatter="actionFormatterPending" data-events="actionEvents" class="text-center">Action</th>
              </tr>
          </thead>
        </table>
      </div>

      <div class="tab-pane fade" id="blockedacc">
        <table class="table table-striped table-bordered table-hover" data-toggle="table" data-url="<?php echo base_url(); ?>users/get_all_users_blocked" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-columns="true" data-pagination="true" data-search="true">
          <thead><br>
              <tr>
                  <th data-checkbox="true"></th>
                  <th data-field="id_no" data-sortable="true" data-align="center">ID</th>
                  <th data-field="username" data-sortable="true">Username</th>
                  <th data-field="fname" data-sortable="true">First Name</th>
                  <th data-field="lname" data-sortable="true">Last Name</th>
                  <th data-field="course" data-sortable="true">Course</th>
                  <th data-field="year" data-sortable="true" data-align="center">Year</th>
                  <th data-field="email" data-sortable="true">Email</th>
                  <th data-field="status" data-sortable="true">Status</th>
                  <th  data-field="action" data-formatter="actionFormatterBlock" data-events="actionEvents" class="text-center">Action</th>
              </tr>
          </thead>
        </table>
      </div>

    <script src="<?php echo base_url(); ?>/assets/js/jquery-1.11.0.js"></script>    
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script> 

      <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-table.js"></script> 
     
    <script>
     
      $(".btn-delete").click(function(){
        if($('input[name=btSelectItem]:checked').size()>0){
          
          $('#confirmDelete')
              .modal({ backdrop: 'static', keyboard: false })
              .one('click', '#delete', function (e) {
                var post='';
               
                $('input[name=btSelectItem]:checked').each(function(){
                post+='id[]='+$(this).parent().next().html()+'&'; 
                });

                $.ajax({
                  type: "POST",
                  url: '<?php  echo site_url('users/delete_multiple');?>',
                  data: post,
                  success: function(data){
                    window.location.reload();
                  }
                });

              });
        }
        else{
          alert('Please select atleast 1 record..');
        }
      });

      $(".btn-approve").click(function(){
        if($('input[name=btSelectItem]:checked').size()>0){
          
          $('#confirmApprove')
              .modal({ backdrop: 'static', keyboard: false })
              .one('click', '#approve', function (e) {
                var post='';
               
                $('input[name=btSelectItem]:checked').each(function(){
                post+='id[]='+$(this).parent().next().html()+'&'; 
                });

                $.ajax({
                  type: "POST",
                  url: '<?php  echo site_url('users/approve_multiple');?>',
                  data: post,
                  success: function(data){
                    window.location.reload();
                  }
                });

              });
        }
        else{
          alert('Please select atleast 1 record..');
        }
      });

      function actionFormatterActive(value, row, index) {
        return [
            '<div class="text-center"><a class="block ml10 fa fa-ban" href="javascript:void(0);" value="' + row.id_no + '" title="Block"></a>&nbsp;',
            '<a class="remove ml10 fa fa-trash-o" href="javascript:void(0);" value="' + row.id_no + '" title="Delete"></a></div>'
        ].join('');
      }
      function actionFormatterPending(value, row, index) {
        return [
            '<div class="text-center"><a class="approve ml10 fa fa-check" href="javascript:void(0);" value="' + row.id_no + '" title="Approve"></a>&nbsp;',
            '<a class="remove ml10 fa fa-trash-o" href="javascript:void(0);" value="' + row.id_no + '" title="Delete"></a></div>'
        ].join('');
      }
      function actionFormatterBlock(value, row, index) {
        return [
           '<div class="text-center"><a class="unblock ml10 fa fa-check-circle" href="javascript:void(0);" value="' + row.id_no + '" title="Unblock"></a>&nbsp;',
           '<a class="remove ml10 fa fa-trash-o" href="javascript:void(0);" value="' + row.id_no + '" title="Delete"></a></div>'
        ].join('');
      }

      window.actionEvents = {
        'click .remove': function (e, value, row, index) {
          $('#confirmDelete')
          .modal({ backdrop: 'static', keyboard: false })
          .one('click', '#delete', function (e) {
            window.location = '<?php echo base_url();?>users/delete_user/' + row.id_no;
          });
        },
        'click .approve': function (e, value, row, index) {
          $('#confirmApprove')
          .modal({ backdrop: 'static', keyboard: false })
          .one('click', '#approve', function (e) {
            window.location = '<?php echo base_url();?>users/approve_user/' + row.id_no;
          });
        },
        'click .block': function (e, value, row, index) {
          $('#confirmBlock')
          .modal({ backdrop: 'static', keyboard: false })
          .one('click', '#block', function (e) {
            window.location = '<?php echo base_url();?>users/block_user/' + row.id_no;
          });
        },
        'click .unblock': function (e, value, row, index) {
          $('#confirmUnblock')
          .modal({ backdrop: 'static', keyboard: false })
          .one('click', '#unblock', function (e) {
            window.location = '<?php echo base_url();?>users/unblock_user/' + row.id_no;
          });
        }
    };

    $('#myTab a[href="#blockedacc".on-click').tab('show');
    </script> 

    <script> 
      $(".btn-reload").click(function(){
        window.location.reload();
      });
    </script>

    </div>
</div>

<!--<div class="modal fade" id="myModalUpUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content col-sm-8 col-sm-push-2" style="padding-right: 0px; padding-left: 0px;">
      <div class="modal-header text-center"><i class='fa fa-edit'></i><b> ADD NEW USER</b></div>
      <div class="modal-body" style="padding:30px;">
        <?php /*echo form_open('', array('id' => 'signup-user')); ?>
        <?php 
          $types = array('text','username','text','text','text','number','email','password');
          $names = array('id_no','username','fname','lname','course','year','email','password');
          $placeholders = array('ID No','Username','First Name','Last Name','Course','Year', 'Email','Password');
          $classes = array('fa-bookmark-o','fa-user','fa-user','fa-user','fa-university','fa-graduation-cap','fa-envelope-o','fa-key');
          $help=array('2011-01981', 'juandelacruz','Juan','Dela Cruz', 'BSIT, BSBA-HRM, BSArch','1, 2, 3, 4, 5','jamtorres010395@gmail.com', 'oblivion762');
          $ctr = 0;
          foreach ($placeholders as $placeholder) {
            echo "<div class='input-group'>";
              echo "<span class='input-group-addon'>";
                echo "<i class='fa ".$classes[$ctr]." fa-fw'></i>";
              echo "</span>";
              echo "<input class='form-control' type='".$types[$ctr]."' name='".$names[$ctr]."' placeholder='".$placeholder."' required>";
            echo "</div><p class='help-block'>Example: $help[$ctr]</p>";
            $ctr++;
          }*/
        ?>                 
        <div class="form-group text-right">  
          <div class="message pull-left"></div> 
          <input class="btn btn-info" type="submit" value="Add Account"/>
        </div>  
        </form>
      </div>
    </div>
  </div>
</div>-->

<div id="confirmDelete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-header text-center"><b>Confirmation Request</b></div>
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to delete this user(s)?
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-info" id="delete">Delete</button>
        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div id="confirmApprove" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-header text-center"><b>Confirmation Request</b></div>
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to approve this user?
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-info" id="approve">Approve</button>
        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div id="confirmBlock" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-header text-center"><b>Confirmation Request</b></div>
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to block this user?
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-info" id="block">Block</button>
        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div id="confirmUnblock" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-header text-center"><b>Confirmation Request</b></div>
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to unblock this user?
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-info" id="unblock">Unblock</button>
        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
      </div>
    </div>
  </div>
</div>


