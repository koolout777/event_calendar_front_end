<style>
.fixed-table-container tbody td {
    border-left: none;
}
.fixed-table-container thead th {
    height: 0;
    padding: 0;
    margin: 0;
    border-left: none;
}
</style>

<ul id="myTab" class="nav" role="tablist">
	<li class="pull-right">&nbsp;&nbsp;<button type="submit" class="btn btn-info fa fa-paper-plane btn-send" data-toggle="tooltip" data-placement="top" title="Send Multiple"></button></li>
	<li class="pull-right">&nbsp;&nbsp;<button type="button" class="btn btn-default fa fa-refresh btn-reload" data-toggle="tooltip" data-placement="top" title="Reload Table"></button></li>
</ul>


<div style="margin-top:-20px;">
    <table class="table-striped" data-toggle="table" data-url="<?php echo base_url(); ?>users/get_all_users_active" data-sort-name="year" data-sort-order="id" data-page-list="[5, 10, 20, 50, 100, 200]" data-pagination="true" data-search="true">
      <thead><br>
          <tr>
              <th data-checkbox="true"></th>
              <th data-field="id_no" data-sortable="true">ID</th>
              <th data-field="fname" data-sortable="true">First Name</th>
              <th data-field="lname" data-sortable="true">Last Name</th>
              <th data-field="course" data-sortable="true">Course</th>
              <th data-field="year" data-sortable="true" data-align="center">Year</th>
              <th data-field="email" data-sortable="true">Email</th> 
          </tr>
      </thead>
    </table>
</div>

<script src="<?php echo base_url(); ?>/assets/js/jquery-1.11.0.js"></script>    
<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-table.js"></script> 

<script>
	$(".btn-send").click(function(){
      if($('input[name=btSelectItem]:checked').size()>0){
        
        $('#confirmSend')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#send', function (e) {
              var post='';
             
              $('input[name=btSelectItem]:checked').each(function(){
              post+='id[]='+$(this).parent().next().html()+'&'; 
              });

              $.ajax({
                type: "POST",
                url: '<?php  echo site_url('send_event/send_students');?>',
                data: post,
                success: function(data){
                  alert("Successfully Sent!");
                  window.location.reload();
                }
              });

            });
      }
      else{
        alert('Please select atleast 1 record..');
      }
    });

</script> 


<div id="confirmSend" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-header text-center"><b>Confirmation Request</b></div>
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to send this event to this user(s)?
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-info" id="send">Send</button>
        <button type="button" data-dismiss="modal" class="btn">Cancel</button>
      </div>
    </div>
  </div>
</div>




