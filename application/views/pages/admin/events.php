
<div>
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li class="active"><a href="#home" role="tab" data-toggle="tab"><b>Active Events</b></a></li>
      <li class=""><a href="#profile" role="tab" data-toggle="tab"><b>Pending Events</b></a></li>
      <li class=""><a href="#blockedacc" role="tab" data-toggle="tab"><b>Blocked Events</b></a></li>
      <li class=""><a href="#assigned" role="tab" data-toggle="tab"><b>Assigned Events</b></a></li>
      <li class="pull-right">&nbsp;&nbsp;<button type="submit" class="btn btn-info fa fa-times btn-delete" data-toggle="tooltip" data-placement="top" title="Delete Multiple"></button></li>
      <li class="pull-right">&nbsp;&nbsp;<button type="submit" class="btn btn-info fa fa-check btn-approve" data-toggle="tooltip" data-placement="top" title="Approve/Unblock Multiple"></button></li>
      <li class="pull-right">&nbsp;&nbsp;<button type="button" class="btn btn-info fa fa-plus" data-toggle="modal" data-target="#myModalEvent"></button></li>
      <li class="pull-right">&nbsp;&nbsp;<button type="button" class="btn btn-default fa fa-refresh btn-reload" data-toggle="tooltip" data-placement="top" title="Reload Table"></button></li>
    </ul>
    <ul class="pull-right">
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade active in" id="home">
        <table class="table table-striped table-bordered table-hover" data-toggle="table" data-url="<?php echo base_url(); ?>events/get_all_events_active?type=others" data-sort-name="name" data-sort-order="id" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-columns="true" data-pagination="true" data-search="true">
          <thead><br>
              <tr>
                  <th data-checkbox="true"></th>
                  <th data-field="event_id" data-sortable="true" data-align="center">Event ID</th>
                  <th data-field="event_title" data-sortable="true">Event Title</th>
                  <th data-field="event_description" data-sortable="true">Description</th>
                  <th data-field="event_type" data-sortable="true">Type</th>
                  <th data-field="event_start_date" data-sortable="true">Start Date</th>
                  <th data-field="event_end_date" data-sortable="true">End Date</th>
                  <th data-field="admin_username" data-sortable="true">Admin</th>
                  <th data-field="status" data-sortable="true">Status</th>
                  <th  data-field="action" data-formatter="actionFormatterActive" data-events="actionEvents" class="text-center">Action</th>
              </tr>
          </thead>
        </table>
        <table class="table table-striped table-bordered table-hover" data-toggle="table" data-url="<?php echo base_url(); ?>events/get_all_events_active?type=official" data-sort-name="name" data-sort-order="id" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-columns="true" data-pagination="true" data-search="true">
          <thead><br>
              <tr>
                  <th data-checkbox="true"></th>
                  <th data-field="event_id" data-sortable="true" data-align="center">Event ID</th>
                  <th data-field="event_title" data-sortable="true">Event Title</th>
                  <th data-field="event_description" data-sortable="true">Description</th>
                  <th data-field="event_type" data-sortable="true">Type</th>
                  <th data-field="event_start_date" data-sortable="true">Start Date</th>
                  <th data-field="event_end_date" data-sortable="true">End Date</th>
                  <th data-field="admin_username" data-sortable="true">Admin</th>
                  <th data-field="status" data-sortable="true">Status</th>
                  <th data-field="action" data-formatter="actionFormatterActiveOff" data-events="actionEvents" class="text-center">Action</th>
              </tr>
          </thead>
        </table>
      </div>

      <div class="tab-pane fade" id="profile">
        <table class="table table-striped table-bordered table-hover" data-toggle="table" data-url="<?php echo base_url(); ?>events/get_all_events_pending" data-sort-name="name" data-sort-order="id" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-columns="true" data-pagination="true" data-search="true">
          <thead><br>
              <tr>
                  <th data-checkbox="true"></th>
                  <th data-field="event_id" data-sortable="true" data-align="center">Event ID</th>
                  <th data-field="event_title" data-sortable="true">Event Title</th>
                  <th data-field="event_description" data-sortable="true">Description</th>
                  <th data-field="event_type" data-sortable="true">Type</th>
                  <th data-field="event_start_date" data-sortable="true">Start Date</th>
                  <th data-field="event_end_date" data-sortable="true">End Date</th>
                  <th data-field="admin_username" data-sortable="true">Admin</th>
                  <th data-field="status" data-sortable="true">Status</th>
                  <th data-field="action" data-formatter="actionFormatterPending" data-events="actionEvents" data-halign="center" data-align="center">Action</th>
              </tr>
          </thead>
        </table>
      </div>

      <div class="tab-pane fade" id="blockedacc">
        <table class="table table-striped table-bordered table-hover" data-toggle="table" data-url="<?php echo base_url(); ?>events/get_all_events_blocked" data-sort-name="name" data-sort-order="id" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-columns="true" data-pagination="true" data-search="true">
          <thead><br>
              <tr>
                  <th data-checkbox="true"></th>
                  <th data-field="event_id" data-sortable="true" data-align="center">Event ID</th>
                  <th data-field="event_title" data-sortable="true">Event Title</th>
                  <th data-field="event_description" data-sortable="true">Description</th>
                  <th data-field="event_type" data-sortable="true">Type</th>
                  <th data-field="event_start_date" data-sortable="true">Start Date</th>
                  <th data-field="event_end_date" data-sortable="true">End Date</th>
                  <th data-field="admin_username" data-sortable="true">Admin</th>
                  <th data-field="status" data-sortable="true">Status</th>
                  <th data-field="action" data-formatter="actionFormatterBlock" data-events="actionEvents" data-halign="center" data-align="center">Action</th>
              </tr>
          </thead>
        </table>
      </div>

      <div class="tab-pane fade" id="assigned">
        <table class="table table-striped table-bordered table-hover" data-toggle="table" data-url="<?php echo base_url(); ?>events/get_all_events_assigned" data-sort-name="name" data-sort-order="id" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-columns="true" data-pagination="true" data-search="true">
          <thead><br>
              <tr>
                  <th data-field="event_id" data-sortable="true" data-align="center">Event ID</th>
                  <th data-field="event_title" data-sortable="true">Event Title</th>
                  <th data-field="description" data-sortable="true">Description</th>
                  <th data-field="start_date" data-sortable="true">Start Date</th>
                  <th data-field="end_date" data-sortable="true">End Date</th>
                  <th data-field="receiver_id" data-sortable="true">Student ID</th>
                  <th data-field="receiver_name" data-sortable="true">Student Name</th>
                  <th data-field="receiver_course" data-sortable="true" data-align="center">Course</th>
                  <th data-field="target" data-sortable="true" data-align="center">Target</th>
                  <th data-field="action" data-formatter="actionFormatterActiveAss" data-events="actionEvents" data-halign="center" data-align="center">Action</th>
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
                    url: '<?php  echo site_url('events/delete_multiple');?>',
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
                    url: '<?php  echo site_url('events/approve_multiple');?>',
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

        function actionFormatterActiveOff(value, row, index) {
          return [
              '<div class="text-center"><a class="block ml10 fa fa-ban" href="javascript:void(0);" value="' + row.event_id + '" title="Block"></a>&nbsp;',
              '<a class="ml10 fa fa-edit" href="<?php echo base_url();?>events/edit/' + row.event_id + '" title="Edit"></a>&nbsp;',
              '<a class="remove ml10 fa fa-trash-o" href="javascript:void(0);" value="' + row.event_id + '" title="Delete"></a></div>'
          ].join('');
        }
        function actionFormatterActive(value, row, index) {
          return [
              '<div class="text-center"><a class="block ml10 fa fa-ban" href="javascript:void(0);" value="' + row.event_id + '" title="Block"></a>&nbsp;',
              '<a class="ml10 fa fa-paper-plane" href="<?php echo base_url();?>send_event/get_event/' + row.event_id + '" title="Send Event"></a>&nbsp;',
              '<a class="ml10 fa fa-edit" href="<?php echo base_url();?>events/edit/' + row.event_id + '" title="Edit"></a>&nbsp;'
          ].join('');
        }
        function actionFormatterPending(value, row, index) {
          return [
              '<div class="text-center"><a class="approve ml10 fa fa-check" href="javascript:void(0);" value="' + row.event_id + '" title="Approve"></a>&nbsp;',
              '<a class="ml10 fa fa-edit" href="<?php echo base_url();?>events/edit/' + row.event_id + '" title="Edit"></a>&nbsp;',
              '<a class="remove ml10 fa fa-trash-o" href="javascript:void(0);" value="' + row.event_id + '" title="Delete"></a></div>'
          ].join('');
        }
        function actionFormatterBlock(value, row, index) {
          return [
              '<div class="text-center"><a class="unblock ml10 fa fa-check-circle" href="javascript:void(0);" value="' + row.event_id + '" title="Unblock"></a>&nbsp;',
              '<a class="ml10 fa fa-edit" href="<?php echo base_url();?>events/edit/' + row.event_id + '" title="Edit"></a>&nbsp;',
              '<a class="remove ml10 fa fa-trash-o" href="javascript:void(0);" value="' + row.event_id + '" title="Delete"></a></div>'
          ].join('');
        }
        function actionFormatterActiveAss(value, row, index) {
          return [
              '<div class="text-center"><a class="removeAssigned ml10 fa fa-trash-o" href="javascript:void(0);" title="Delete"></a></div>'
          ].join('');
        }

        window.actionEvents = {
          'click .remove': function (e, value, row, index) {
            $('#confirmDelete')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#delete', function (e) {
              window.location = '<?php echo base_url();?>events/delete_event/' + row.event_id;
            });
          },
          'click .removeAssigned': function (e, value, row, index) {
            $('#confirmDelete')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#delete', function (e) {
              window.location = '<?php echo base_url();?>events/delete_assigned/' + row.receiver_id + '/' + row.event_id;;
            });
          },
          'click .approve': function (e, value, row, index) {
            $('#confirmApprove')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#approve', function (e) {
              window.location = '<?php echo base_url();?>events/approve_event/' + row.event_id;
            });
          },
          'click .block': function (e, value, row, index) {
            $('#confirmBlock')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#block', function (e) {
              window.location = '<?php echo base_url();?>events/block_event/' + row.event_id;
            });
          },
          'click .unblock': function (e, value, row, index) {
            $('#confirmUnblock')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#unblock', function (e) {
              window.location = '<?php echo base_url();?>events/unblock_event/' + row.event_id;
            });
          }
      };

      $('#myTab a[href="#blockedacc".on-click').tab('show');
      $('#myTab a[href="#assigned".on-click').tab('show');
      </script> 

      <script> 
        $(".btn-reload").click(function(){
          window.location.reload();
        });
      </script>

    </div>
</div>

<div class="modal fade" id="myModalEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content col-sm-8 col-sm-push-2" style="padding-right: 0px; padding-left: 0px;">
      <div class="modal-header text-center"><i class='fa fa-edit'></i><b> ADD NEW EVENT</b></div>
      <div class="modal-body" style="padding:30px;">
        <?php echo form_open('', array('id' => 'add-event')); ?>
        <?php 
          $types = array('text','datetime-local','datetime-local');
          $names = array('event_title','event_start_date','event_end_date');
          $placeholders = array('Event Title','Start Date & Time', 'End Date & Time');
          $classes = array('fa-calendar','fa-clock-o','fa-clock-o');
          $help=array('Colors Day','mm/dd/yyyy 00:00 AM','01/01/2014 07:30 AM');
          $ctr = 0;
          foreach ($placeholders as $placeholder) {
            echo "<div class='input-group'>";
              echo "<span class='input-group-addon'>";
                echo "<i class='fa ".$classes[$ctr]." fa-fw'></i>";
              echo "</span>";
              if ($names[$ctr] =='event_start_date' || $names[$ctr] =='event_end_date') { $value="2014-10-11T08:00:00"; } else { $value=""; $access="required";}
              echo "<input class='form-control' type='".$types[$ctr]."' name='".$names[$ctr]."' placeholder='".$placeholder."' value='".$value."' $access>";
            echo "</div><p class='help-block'>Example: $help[$ctr]</p>";
            $ctr++;
            if($ctr==1){
              echo "<textarea class='form-control' rows='3' name='event_description' placeholder='Add short description here...' required></textarea><br>";
              echo "<select style='background-color:#eee;' class='form-control' name='event_type'>
                      <option value='Official'>Official University Event</option>
                      <option value='Others'>Other University Event</option>
                    </select><br>";
            }
          }
        ?>                 
        <div class="form-group text-right">  
          <div class="message pull-left"></div> 
          <input class="btn btn-info" type="submit" value="Add Event"/>
        </div>  
        </form>
      </div>
    </div>
  </div>
</div>

<div id="confirmDelete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-header text-center"><b>Confirmation Request</b></div>
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to delete this event(s)?
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
        Are you sure you want to approve this event?
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
        Are you sure you want to block this event?
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
        Are you sure you want to unblock this event?
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-info" id="unblock">Unblock</button>
        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
      </div>
    </div>
  </div>
</div>