<?php 
  if($type=="User Admin"){
    echo "<div class='row' style='margin-top:100px;'>
            <div class='col-md-4 col-md-offset-4 text-center alert alert-danger fade in' role='alert'>
              <h1>ERROR 403</h1>
              <div class='col-md-12 fa fa-exclamation-triangle fa-5x'></div>
              <p class='col-md-12'><b>Forbidden Access</b></p>
              <span class='col-md-12'>Only the Root Admin can access this page.</span>
            </div>
         </div>";
  }
  else{
?>
<div>
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li class="active"><a href="#home" role="tab" data-toggle="tab"><b>Active Admin Accounts</b></a></li>
      <li class=""><a href="#blockedacc" role="tab" data-toggle="tab"><b>Blocked Admin Accounts</b></a></li>
      <li class="pull-right">&nbsp;&nbsp;<button type="submit" class="btn btn-info fa fa-times btn-delete" data-toggle="tooltip" data-placement="top" title="Delete Multiple"></button></li>
      <li class="pull-right">&nbsp;&nbsp;<button type="submit" class="btn btn-info fa fa-ban btn-ban" data-toggle="tooltip" data-placement="top" title="Block Multiple"></button></li>
      <li class="pull-right">&nbsp;&nbsp;<button type="button" class="btn btn-info fa fa-plus" data-toggle="modal" data-target="#myModalUpAdmin"></button>
      <li class="pull-right">&nbsp;&nbsp;<button type="submit" class="btn btn-default fa fa-refresh btn-reload" data-toggle="tooltip" data-placement="top" title="Reload Table"></button></li>
    </ul>
    <ul class="pull-right">
    </ul>
      <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade active in" id="home">
        <table class="table table-striped table-bordered table-hover" data-toggle="table" data-url="<?php echo base_url(); ?>admins/get_all_admins_active" data-sort-name="name" data-sort-order="id" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-columns="true" data-pagination="true" data-search="true">
          <thead><br>
              <tr>
                  <th data-checkbox="true"></th>
                  <th data-field="admin_id" data-sortable="true" data-align="center">ID</th>
                  <th data-field="username" data-sortable="true">Username</th>
                  <th data-field="email" data-sortable="true">Email</th>
                  <th data-field="date_added" data-sortable="true" data-align="center">Date Added</th>
                  <th data-field="type" data-sortable="true" data-align="center">Type</th>
                  <th data-field="status" data-sortable="true" data-align="center">Status</th>
                  <th data-field="action" data-formatter="actionFormatter" data-events="actionEvents" class="text-center">Action</th>
              </tr>
          </thead>
        </table>
      </div>

      <div class="tab-pane fade" id="blockedacc">
        <table class="table table-striped table-bordered table-hover" data-toggle="table" data-url="<?php echo base_url(); ?>admins/get_all_admins_blocked" data-sort-name="name" data-sort-order="id" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-columns="true" data-pagination="true" data-search="true">
         <thead><br>
              <tr>
                  <th data-checkbox="true"></th>
                  <th data-field="admin_id" data-sortable="true" data-align="center">ID</th>
                  <th data-field="username" data-sortable="true">Username</th>
                  <th data-field="email" data-sortable="true">Email</th>
                  <th data-field="date_added" data-sortable="true" data-align="center">Date Added</th>
                  <th data-field="type" data-sortable="true" data-align="center">Type</th>
                  <th data-field="status" data-sortable="true" data-align="center">Status</th>
                  <th data-field="action" data-formatter="actionFormatters" data-events="actionEvents" class="text-center">Action</th>
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
                    url: '<?php  echo site_url('admins/delete_multiple');?>',
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

        $(".btn-ban").click(function(){
          if($('input[name=btSelectItem]:checked').size()>0){
            
            $('#confirmBlock')
                .modal({ backdrop: 'static', keyboard: false })
                .one('click', '#block', function (e) {
                  var post='';
                 
                  $('input[name=btSelectItem]:checked').each(function(){
                  post+='id[]='+$(this).parent().next().html()+'&'; 
                  });

                  $.ajax({
                    type: "POST",
                    url: '<?php  echo site_url('admins/block_multiple');?>',
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

        function actionFormatter(value, row, index) {
          return [
              '<div class="text-center"><a class="block ml10 fa fa-ban" href="javascript:void(0);" value="' + row.admin_id + '" title="Block"></a>&nbsp;',
              '<a class="remove ml10 fa fa-trash-o" href="javascript:void(0);" value="' + row.admin_id + '" title="Delete"></a></div>'
          ].join('');
        }
        function actionFormatters(value, row, index) {
          return [
              '<div class="text-center"><a class="unblock ml10 fa fa-check-circle" href="javascript:void(0);" value="' + row.admin_id + '" title="Unblock"></a>&nbsp;',
             '<a class="remove ml10 fa fa-trash-o" href="javascript:void(0);" value="' + row.admin_id + '" title="Delete"></a></div>'
          ].join('');
        }

        window.actionEvents = {
          'click .remove': function (e, value, row, index) {
            $('#confirmDelete')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#delete', function (e) {
              window.location = '<?php echo base_url();?>admins/delete/' + row.admin_id;
            });
          },
          'click .block': function (e, value, row, index) {
            $('#confirmBlock')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#block', function (e) {
              window.location = '<?php echo base_url();?>admins/block_admin/' + row.admin_id;
            });
          },
          'click .unblock': function (e, value, row, index) {
            $('#confirmUnblock')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#unblock', function (e) {
              window.location = '<?php echo base_url();?>admins/unblock_admin/' + row.admin_id;
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

<div class="modal fade" id="myModalUpAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content col-sm-8 col-sm-push-2" style="padding-right: 0px; padding-left: 0px;">
      <div class="modal-header text-center"><i class='fa fa-edit'></i><b> ADD NEW USER ADMIN</b></div>
      <div class="modal-body" style="padding:40px;">
        <?php echo form_open('', array('id' => 'signup-admin')); ?>
          <?php 
            $types = array('text','username','email', 'password');
            $names = array('admin_id','username','email', 'password');
            $placeholders = array('-','Username','Email','Password');
            $classes = array('fa-bookmark-o','fa-user', 'fa-envelope-o','fa-key');
            $help=array('1', 'torres.jameelalourdes', 'jamtorres010395@gmail.com', 'Oblivion762');
            $ctr = 0;
            foreach ($placeholders as $placeholder) {
              echo "<div class='input-group'>";
                echo "<span class='input-group-addon'>";
                  echo "<i class='fa ".$classes[$ctr]." fa-fw'></i>";
                echo "</span>";
                if($names[$ctr] =='admin_id'){$value=""; $access="disabled"; } else { $value=""; $access="required";}
                echo "<input class='form-control' type='".$types[$ctr]."' name='".$names[$ctr]."' placeholder='".$placeholder."' value='".$value."' $access>";
              echo "</div><p class='help-block'>Example: $help[$ctr]</p>";
              $ctr++;
            }
          ?>                 
          <div class="form-group">  
            <input class="btn btn-info col-sm-12" type="submit" value="Add Account" style="padding: 8px 12px;"/><br>
          </div>
          <div class="message pull-left" style="margin-top:10px;"></div><br>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<div id="confirmDelete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-header text-center"><b>Confirmation Request</b></div>
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to delete this administrator(s)?
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-info" id="delete">Delete</button>
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
        Are you sure you want to block this this user administrator?
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
        Are you sure you want to unblock this user administrator?
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-info" id="unblock">Unblock</button>
        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
      </div>
    </div>
  </div>
</div>
