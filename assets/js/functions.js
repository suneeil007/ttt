$(function(){ 
    // add multiple select / deselect functionality
    $("#clearall").click(function () {
          $('.case').removeAttr("checked");
    });
	
	$("#clearall1").click(function () {
          $('.case1').removeAttr("checked");
    });
	
	$("#clearall2").click(function () {
          $('.case2').removeAttr("checked");
    });
	
	$("#clearall3").click(function () {
          $('.case3').removeAttr("checked");
    });
	$("#clearall_f").click(function () {
          $('.casef').removeAttr("checked");
    });
});

//Add new category
	$(function() {
	var addDiv = $('#addCategory');
	var i = $('#addCategory tr').size() + 1;
	
	$('#addNewCategory').live('click', function() {
		$('<tr><td><input style="margin-right:6px;" type="checkbox" class="checkboxf" /></td><td></td><td><input type="text"  name="name[]" /></td><td><textarea  name="description[]"></textarea></td><td><img src="" height="50" width="70"/></td><td><input type="file" name="userfile[]" class="multi" /></td><td style="text-align:left;font-size:13px;"><span class="crudlinks"><a href="#" style="float:left;">Delete</a></span><span class="crudlinks"><a href="#" title="save" style="margin-left:20px;float:left;">Save</a></span></td><input type="hidden" name="hidden_id[]"/></tr>').appendTo(addDiv);
		i++;	
	return false;
		});
	});
	
//Add product veriety
$(function() {
var addDiv = $('#addproductveriety');
var i = $('#addproductveriety p').size() + 1;

$('#addNewVeriety').live('click', function() {
	$('<p><input type="file" name="userfile1[]" class="multi" id="product-types" /><a href="#" id="remNew">[x]</a> <br/></p>').appendTo(addDiv);
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


//Add product color
$(function() {
var addDiv = $('#addproductcolor');
var i = $('#addproductcolor p').size() + 1;

$('#addNewcolor').live('click', function() {
	$('<p><input type="file" name="userfile2[]" class="multi" id="product-types" /><a href="#" id="remcol">[x]</a> <br/></p>').appendTo(addDiv);
	i++;

return false;
});

$('#remcol').live('click', function() {
	if( i > 2 ) {
	$(this).parents('p').remove();
	i--;
}
return false;
	});
});
