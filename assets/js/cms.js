// JavaScript Document
$(function() { 
    $("#content_type").change(function(){
        id = $(this).val();
        if ( id == 'Content Page' )    { 
                $("#contentpage").fadeIn();
			    $("#addFiles").fadeIn();
                $("#gallery").hide();
			    $("#linkpage").hide();
				$("#filepage").hide(); 
				$("#videopage").hide();
        }
            else if    ( id == 'Image Gallery' ) {
                $("#contentpage").hide();
			    $("#addFiles").hide();
                $("#gallery").fadeIn();
			    $("#linkpage").hide();
				$("#filepage").hide();
				$("#videopage").hide();
            }
			
			else if    ( id == 'Link' ) {
                $("#contentpage").hide();
			    $("#addFiles").hide();
                $("#gallery").hide();
                $("#linkpage").fadeIn();
				$("#filepage").hide();
				$("#videopage").hide();				
            }
			
			else if    ( id == 'File' ) {
                $("#contentpage").hide();
			    $("#addFiles").hide();
                $("#gallery").hide();
                $("#linkpage").hide();
				$("#filepage").fadeIn();
				$("#videopage").hide();				
            }
			
			else if    ( id == 'Video Gallery' ) {
                $("#contentpage").hide();
			    $("#addFiles").hide();
                $("#gallery").hide();
                $("#linkpage").hide();
				$("#filepage").hide();
				$("#videopage").fadeIn();				
            }
            else {
				$("#contentpage").hide();
				$("#gallery").hide();
				$("#addFiles").hide();
				$("#linkpage").hide();
				$("#videopage").hide();
                }
    });
    
    //inicial settings
    $("#contentpage").hide();
    $("#gallery").hide();
    $("#addFiles").hide();
    $("#linkpage").hide();
	$("#filepage").hide();    
	$("#videopage").hide();	
});

$(function() { 
    $('#other').change(function(){ 
        $('.slidediv').toggle(this.checked);
    });
});


//For adding multiple downloadable files in content page
$(function() {
var addDiv = $('#addFiles');
var i = $('#addFiles p').size() + 1;

$('#addNewFile').live('click', function() {
	$('<p><input type="file" name="userfile[]" class="multi" /><br/><input type="text" name="fileCaption[]" style="width:150px;" /><a href="#" id="remNew">[x]</a> </p>').appendTo(addDiv);
	i++;

return false;
});

$('#remNew').live('click', function() {
	if( i > 2 ) {
	$(this).parents('p').remove();
	i--;
}
return false;
	});
});



$(function() {
var addDiv = $('#addimage');
var i = $('#addimage p').size() + 1;

$('#addNewImg').live('click', function() {
	$('<p><input type="file" name="userfile[]" class="multi" /><br/>Caption&nbsp;&nbsp;<input type="text" name="listCaption[]" style="width:190px;" /><a href="#" id="remNew">[x]</a> </p>').appendTo(addDiv);
	i++;

return false;
});

$('#remNew').live('click', function() {
	if( i > 2 ) {
	$(this).parents('p').remove();
	i--;
}
return false;
	});
});


$(function() {
var addDiv = $('#addiVideo');
var i = $('#addiVideo p').size() + 1;

$('#addNewVid').live('click', function() {
	$('<p style="padding-bottom:5px;">Title:&nbsp;<input type="text" name="title_vid[]" class="multi" /></p><p style="padding-bottom:5px;">Link :&nbsp;<input type="text" name="vid_link[]" /><a href="#" id="remNew">[x]</a> </p>').appendTo(addDiv);
	i++;

return false;
});

$('#remNew').live('click', function() {
	if( i > 2 ) {
	$(this).parents('p').remove();
	i--;
}
return false;
	});
});


$(function() { 
	var type = $("#content_type").val();
		
    if(type == 'Content Page') { 
        $("#contentpage").show();			   
		$("#addFiles").show();
	}
	else if( type == 'Image Gallery' ) {
		$("#gallery").show();
		}
	else if( type == 'Link' ) {
		$("#linkpage").show();
		}
	else if( type == 'File' ) {
		$("#filepage").show();
		}
	else if( type == 'Video Gallery' ) {
		$("#videopage").show();
		}	
		
});
