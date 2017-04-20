
<div style="font-size:10px; float:right;"><a href='<?php echo base_url();?>send_event/send_specific?id=<?php echo $event->event_id; ?>'><button type="submit" class="btn">View Specific Accounts</button></a></div>
<div class="col-md-5 col-md-offset-3" style="margin-top:-30px;padding:20px;">

    <div class="bs-callout bs-callout-warning ">
    <div><b>Event Title &nbsp; : <?php echo $event->event_title; ?> </b></div>
    <p><b>Description : </b> <?php echo $event->event_description; ?></p>
    </div> 

    <div class="bs-callout bs-callout-warning ">
    <form action="<?php echo base_url();?>send_event/send_target?id=<?php echo $event->event_id; ?>" method="post" id="demoForm" class="demoForm">

      <span>Select Target Participant: </span>
      <select style='background-color:#eee;' class='form-control' name='bulk'>
        <option value=''></option>
        <option value='0'>All Students</option>
        <option value='1'>All 1st Year Students</option>
        <option value='2'>All 2nd Year Students</option>
        <option value='3'>All 3rd Year Students</option>
        <option value='4'>All 4th Year Students</option>
        <option value='5'>All 5th Year Students</option>
      </select><br>

      <span>Select Target College: </span>
      <select style='background-color:#eee;' class='form-control' name="category">
          <option value=''></option>
          <?php
            foreach ($colleges as $college) {
              $college_id=$college['college_id'];
              echo "<option value='$college_id'>$college_id</option>";
            }
          ?> 
      </select><br>

      <select class='form-control' name="choices[]" id="choices" multiple="multiple" size="4">
          <!-- js populates -->
      </select>

      <div class="modal-footer">
        <div class="col-md-10" style="margin-left:-30px"><input type="number" name="year" class="form-control" placeholder="Year Level..."/></div>
        <button type="submit" class="btn btn-info" value="Submit" style="margin-right:-15px">Submit</button>
      </div>
      <p style="font-size:10px; float:left;">*Note: Please select only ONE combo box above.</p>
      <br>
    </form>
    </div> 
</div>

 <div class="col-md-5 col-md-offset-3 text-center" style="margin-top:-30px;">
<?php 
    if(isset($validation)){
    if($validation == 1){
      echo '<div class="alert alert-success alert-message fade in" role="alert">
            <p>Great! You have successfully sent an event.</p>
         </div>';
    }

    elseif ($validation == 0) {
      echo '<div class="alert alert-danger alert-message fade in" role="alert">
            <p>There seems to be no registered users under that category. Please choose a different set of participants.</p>
         </div>';
    }

    elseif ($validation == 3) {
      echo '<div class="alert alert-danger alert-message fade fade in" role="alert">
            <p>The set of participants you have chosen had already been assigned to that event. Please choose another option.</p>
         </div>';
    }

    elseif ($validation == 4) {
      echo '<div class="alert alert-danger alert-message fade fade in" role="alert">
            <p>Please choose only <strong>one (1)</strong> option from each target category. You are only allowed to choose <strong>multiple courses</strong> from each <strong>college</strong>.</p>
         </div>';
    }

    } 
?>
</div> 

<script type="text/javascript">

window.setTimeout(function() {
    $(".alert-message").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);

function removeAllOptions(sel, removeGrp) {
    var len, groups, par;
    if (removeGrp) {
        groups = sel.getElementsByTagName('optgroup');
        len = groups.length;
        for (var i=len; i; i--) {
            sel.removeChild( groups[i-1] );
        }
    }
    
    len = sel.options.length;
    for (var i=len; i; i--) {
        par = sel.options[i-1].parentNode;
        par.removeChild( sel.options[i-1] );
    }
}

function appendDataToSelect(sel, obj) {
    var f = document.createDocumentFragment();
    var labels = [], group, opts;
    
    function addOptions(obj) {
        var f = document.createDocumentFragment();
        var o;
        
        for (var i=0, len=obj.text.length; i<len; i++) {
            o = document.createElement('option');
            o.appendChild( document.createTextNode( obj.text[i] ) );
            
            if ( obj.value ) {
                o.value = obj.value[i];
            }
            
            f.appendChild(o);
        }
        return f;
    }
    
    if ( obj.text ) {
        opts = addOptions(obj);
        f.appendChild(opts);
    } else {
        for ( var prop in obj ) {
            if ( obj.hasOwnProperty(prop) ) {
                labels.push(prop);
            }
        }
        
        for (var i=0, len=labels.length; i<len; i++) {
            group = document.createElement('optgroup');
            group.label = labels[i];
            f.appendChild(group);
            opts = addOptions(obj[ labels[i] ] );
            group.appendChild(opts);
        }
    }
    sel.appendChild(f);
}

// anonymous function assigned to onchange event of controlling select list
document.forms['demoForm'].elements['category'].onchange = function(e) {
    // name of associated select list
    var relName = 'choices[]';
    
    // reference to associated select list 
    var relList = this.form.elements[ relName ];
    
    // get data from object literal based on selection in controlling select list (this.value)
    var obj = Select_List_Data[ relName ][ this.value ];
    
    // remove current option elements
    removeAllOptions(relList, true);
    
    // call function to add optgroup/option elements
    // pass reference to associated select list and data for new options
    appendDataToSelect(relList, obj);
};

// object literal holds data for optgroup/option elements
var Select_List_Data = {
    
    // name of associated select list
    'choices[]': {
        
        CMBA: {
            // example without optgroups
            text: ['BSBA-QM', 'BSBA-IQM', 'BSBA-BFM', 'BSBA-MM', 'BSPAd', 'BSBA-MA', 'BSOAd', 'BSHRM', 'BSTM', 'BSA', 'BSMA', 'BSBA-HRM', 'BSAT'],
            value:['BSBA-QM', 'BSBA-IQM', 'BSBA-BFM', 'BSBA-MM', 'BSPAd', 'BSBA-MA', 'BSOAd', 'BSHRM', 'BSTM', 'BSA', 'BSMA', 'BSBA-HRM', 'BSAT']
        },
        CEA: {
            // example without optgroups
            text: ['BSME-Mech', 'BSIE', 'BSEE', 'BSCpE', 'BSCE' , 'BSME', 'BSElecE', 'BSEM', 'BSECE', 'BSArch'],
            value:['BSME-Mech', 'BSIE', 'BSEE', 'BSCpE', 'BSCE' , 'BSME', 'BSElecE', 'BSEM', 'BSECE', 'BSArch']
        },
        COE: {
            // example without optgroups
            text: ['BSEEd', 'BSEEd-GenEd', 'BSEEd-EarEd' , 'BSEEd-SpEd', 'BSSE-Sci', 'BSSE-Eng', 'BSSE-Fil', 'BSSE-Math', 'BEED'],
            value:['BSEEd', 'BSEEd-GenEd', 'BSEEd-EarEd' , 'BSEEd-SpEd', 'BSSE-Sci', 'BSSE-Eng', 'BSSE-Fil', 'BSSE-Math', 'BEED']
        },
        CAS: {
            // example without optgroups
            text: ['BSBio', 'ABMC', 'ABEng', 'BSM', 'BSPsyc' , 'ABGM'],
            value:['BSBio', 'ABMC', 'ABEng', 'BSM', 'BSPsyc' , 'ABGM']
        },
        CCS: {
            // example without optgroups
            text: ['ACT', 'BSIT', 'BSCS'],
            value:['ACT', 'BSIT', 'BSCS']
        },
        CON: {
            // example without optgroups
            text: ['BSN'],
            value:['BSN']
        },
    }
    
};

// populate associated select list when page loads
window.onload = function() {
    var form = document.forms['demoForm'];
    
    // reference to controlling select list
    var sel = form.elements['category'];
    sel.selectedIndex = 0;
    
    // name of associated select list
    var relName = 'choices[]';
    // reference to associated select list
    var rel = form.elements[ relName ];
    
    // get data for associated select list passing its name
    // and value of selected in controlling select list
    var data = Select_List_Data[ relName ][ sel.value ];
    
    // add options to associated select list
    appendDataToSelect(rel, data);
};

</script>
