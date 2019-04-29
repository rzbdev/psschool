
<?php 

error_reporting(0);
session_start();
include_once('admin_header.php');
include_once('config.php');
$super=$_SESSION['admin'];
$super_admin=$_SESSION['super_admin'];
if(!isset($_SESSION["alid"]))
{
	echo '<script type="text/javascript">';
	echo 'window.location.href ="login.php"';
	echo '</script>';
} 

?>
<style>
.disabled_class{pointer-events:none}
td.upper_text {
    text-transform: capitalize;
}
</style>
<div class="container-fluid">
	<div class="col-md-12">
	
		<div class="row">
		<div class="row">
		<div class="col-md-4">
		 <h1 class="page-header">Search Applicants</h1>
		</div>
		
		</div>
 <?php 
	//$select="SELECT *  FROM notification WHERE date_ex >= DATE_FORMAT(NOW(),'%Y-%m-%d')";
	//$row=mysqli_Query($select);
   // $rc=mysqli_num_rows($row);
	//while($ro=mysqli_fetch_array($row))
	//{
	//	$rw=$ro['title'];
	//	$i=$ro['nid'];
	//}
	
	?>
	<?php //$id=$i; ?>
	<div class="row">
		
		</div>
			<div class="row" style="margin-top:10px;">
			<form class="search-form margin-top" name="myForm" id="srchfrm">
				 <div class="col-md-2 col-sm-6">
		
	<div class="choose1" >
			<select class="form-control " name="" id="demo" placeholder="Quick Search" >
			
			<option value="All">All</option>
			<option value="first_name">First Name</option>
			<option value="last_name">Last Name</option>
			<option value="comm_email">Email</option>
			<option value="father_name">Father Name</option>
			<option value="husband">Husband Name</option>
			<option value="post_applied">Post Applied</option>
			<option value="medium_of_insruction">Medium</option>
			<option value="examination_passed">Examination</option>
			
			
			</select>
    </div>
			
		
			<!-- <div class="choose hel">
			<select class="form-control" onchange="ajaxFunction('');" name="" id="language" placeholder="Quick Search">
			  <option value="">Select Repeated</option>
			<option value="R">REPEATE (For Current Notification)</option>
			  			</select>
		 </div>	 -->
						
						<input type="hidden" name="st" value="0" />
						<datalist id="title" > </datalist>
					
		</div>
				<div class="col-md-3 col-sm-6">
				
				<div class="form-group1">
			<input type="hidden" class="form-control" onkeyup="ajaxFunction('');" name="" id="search2" list="title"  size="" placeholder="Quick Search" autocomplete="off" />
				<div class="search">
				<label class="sr-only" for="search">Search</label>
					
				   <input type="text" class="form-control" name="" id="search3" list="title"  size="" placeholder="Quick Search" autocomplete="off" / onkeyup="clearnow()">
				  
			    </div>
	
			
			  </div>
			  
		<!---<button type="submit" class="btn srch" name="search">Search</button>-->
				</div>
	</form>
	<div class="col-md-1 col-sm-6">
	 <button class="btn  btn-lg srch sr" name="" onclick="ajaxFunction('');">Search</button>
	 </div>
	 <div class="col-md-1 col-sm-6 text-right " style="margin-left:10px;">
	 <button class="btn  btn-lg srch" id="btnclr" name="">Clear</button>
	 </div>
				<div class="col-md-4 col-sm-12" style="margin-top: 15px">
		
			
			 <div class="clearfix"></div>
			 	<div id="msg1" class="col-md-12 text-right" style="font-size:15px;color:#000;display:block;"></div>
			</div>
			</div>
			<div class="clearfix"></div>
			<div id="" class="result11" style="display:none">
			
						<div class="table-responsive">
				<table cellspacing="0" cellpadding="0" class="table table-strip table-bordered margin-top admin-table m_btm">

				<col width="40px">
				<col width="100px">
				<col width="100px">
				<col width="60px">


								<thead>
									<tr>
			
										
										<th>
										S.NO.
										
										</th>
										
										<th>
										<a class="sortingOrder" data-name="first_name" href="#">Name</a>
										
										<input type="hidden" id="ff" value="ASC">
										
										</th>
										<th style="width:7%;">
										<a href="#" class="sortingOrder" data-name="gender">Gender</a>
										
										<input type="hidden" id="gen" value="ASC">
										
										</th>
										<th style="width:7%;">
										<a href="#">Age</a>
										
										
										
										</th>
										<th style="width:20%;">
										<a href="#" class="sortingOrder" data-name="post_applied">Post applied for</a>
										
										<input type="hidden" id="post" value="ASC">
										
										</th>
										
										
										
										<th>
										<input type="hidden" id="ee" value="ASC">
										Medium
										
										</th>	
										<th>
										<input type="hidden" id="ee" value="ASC">
										<a href="#" >Lowest Marks %</a>
										
										</th>
										<th style="width:8%;">
										<input type="hidden" id="ee" value="ASC">
										<a href="#" class="sortingOrder" data-name="eligibilty">Status</a>
										
										</th>
								
										<th>
										<a href="#" class="sortingOrder" data-name="dt_created">Date of application</a>
										
										<input type="hidden" id="date" value="ASC">
										<input type="hidden" id="noti" value="<?php echo $rw; ?>">
										
										</th>
										
										<th style="width:4%;">Action</th>
									</tr>
								</thead>
								<tbody id="result">
								</tbody>
							</table>
							</div>
							<?php 
							if($rc=='0')
							{
								
					
								?>
														<h3 class="text-center no_data">There is no active notification at the moment</h3>
							    <?php
							}
							else
							{
								
								?>
								
								<h3 id="msg2" class="text-center no_data" style=" padding:10px 0;"></h3>
								
								
								<?php
							}
							?>
						
				<div class="row">
				<div class="col-md-4">  <div class="margin-top" id="msg" style="display:block;"></div></div>
				<div class="col-md-8">
					<div class="bottom_pagination"id="navigation"></div>
				</div>
				<div class="col-md-12 margin-top">
				 <p> <b>Note</b>: Showing information Of applicants that applied to the active notification.</p>
				 <p>Abbreviations:<br>E:Eligible , NE:Non-Eligible , NR:Non-Rated.</p> </div>
				</div>
			<br><br><br><br>
			
		</div>
	</div>
<div class="clearfix"></div>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="ff">
				<div class="container-fluid">
				<p>&copy; All Rights Reserved.</p>
				
				</div><!--container-->
		</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<div class="modal fade modal-wide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		</div>
		<div class="clearfix"></div>
		<button type="button" style="display:none" class="btn btn-default btn-sm" id="pop" data-toggle="modal" data-target="#myModal">
		</button>
		
				<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.mi.js"></script>
		<!-- search result -->
		<script type="text/javascript">
		checkRepeat = [];
		fieldName = "c.id";
		Ascending = "ASC";
	function ajaxFunction(val,opts,page,column)
{
	$("#preloader").show();
	$(".result11").show();
	var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      httpxml=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }
function stateChanged() 
{
if(httpxml.readyState==4)
      {
		 
/////////////
//document.getElementById("msg1").style.display="none";
var myarray = JSON.parse(httpxml.responseText);

//alert(httpxml.responseText);
// Before adding new we must remove previously loaded elements
for(j=document.getElementById('title').length-1;j>=0;j--)
{
document.getElementById('title').remove(j);

}
						
var str='';
var result='';
var i;
var k=myarray.value.start_record1;

result+='<input type="hidden" name="page" id="nex_page" value="'+myarray.value.page1+'">'; 
for (i=0;i<myarray.data.length;i++)
{
	

var hired=myarray.data[i].hired;

if(hired=='Absent From Interview')
{
 var hire=',A';
}
else if(hired=='Rejected In Telephonic')
{
	
	var hire=',RT';
}
else if(hired=='rejected')
{
	var hire=',R';
}
else if(hired=='Hired')
{
	var hire=',H';
}
else
	
	{
		
		var hire='';
	}


	
	
	var super_admin = "<?php echo $super_admin; ?>";
	if(super_admin=='super_admin')
	{
		del ='<a data-id="'+myarray.data[i].id+'" class="btn btn-default btn-sm delbutton1" href="#"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
	}
	else
	{
		del ='';
	}
	
	
	
    var myDate = myarray.data[i].dt_created.split(" ");
    var myDate2 = myDate[0].split("-");
    var myDate3=myDate2[2]+"-"+myDate2[1]+"-"+myDate2[0];
    var myDate1 = myDate3+" "+myDate[1];
    var dob=myarray.data[i].dob.split("-");
    var today = new Date();
    var nowyear = today.getFullYear();
    var nowmonth = today.getMonth()+1;
    var nowday = today.getDate();
    var birthyear = dob[0];
    var birthmonth = dob[1];
    var birthday = dob[2];
    var age = nowyear - birthyear;
    var age_month = nowmonth - birthmonth;
    var age_day = nowday - birthday;
       if(age_month < 0 || (age_month == 0 && age_day <0)) {
            age = parseInt(age) -1;
			

	}
	var super_admin = "<?php echo $super_admin; ?>";
	if(super_admin=='super_admin')
	{
		del ='<a data-id="'+myarray.data[i].id+'" class="btn btn-default btn-sm delbutton1" href="#"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
	}
	else
	{
		del ='';
	}
	
	

	str += '<option value="'+myarray.data[i].first_name+' '+myarray.data[i].last_name+'" >'+myarray.data[i].first_name+' '+myarray.data[i].last_name+'</option>'; // Storing options in variable
	
	result += '<tr class="record"><th scope="row">'+k+'</th><td>'+myarray.data[i].first_name.charAt(0).toUpperCase()+ myarray.data[i].first_name.substr(1).toLowerCase()+' '+myarray.data[i].last_name.charAt(0).toUpperCase()+ myarray.data[i].last_name.substr(1).toLowerCase()+'</td><td>'+myarray.data[i].gender+'</td><td>'+age+' Years</td><td class="upper_text">'+myarray.data[i].post_applied.toLowerCase()+'</td><td class="upper_text">'+myarray.data[i].medium.toLowerCase()+'</td><td>'+myarray.data[i].marks+' %</td><td id="status'+myarray.data[i].id+'" >'+myarray.data[i].eligibilty+''+hire+'</td><td>'+myDate1+'</td><td><button type="button" class="btn btn-default btn-sm pop_up_open" data-id="'+myarray.data[i].id+'" ><span class="glyphicon glyphicon-zoom-in " aria-hidden="true"></span></button></td></tr>';
k++;

} 
$("#preloader").hide();
if(myarray.value.records_found_total=='0')
{
	document.getElementById("msg2").innerHTML="There is no active notification at the moment";
}
if(myarray.value.records_found_total>'0')
{
	document.getElementById("msg2").innerHTML="";
}
if(myarray.value.records_found_total=='0' && myarray.value.val!=" ")
{
	document.getElementById("msg2").innerHTML="No Result Found";
	document.getElementById("msg1").innerHTML="";
}
		
/* document.getElementById("title").innerHTML= str; */
document.getElementById("result").innerHTML= result  ;
var first1 = parseInt(myarray.value.start_record3);
var strt = first1+1;
if(parseInt(myarray.value.no_records)==0)
{
	 document.getElementById("msg").innerHTML="";
	 document.getElementById("msg1").style.display="";
	 $("#preloader").hide();
	 document.getElementById("msg1").innerHTML="";
	 document.getElementById("navigation").style.display="none";
	
}
else{
	document.getElementById("msg").innerHTML="Displaying " + strt + " - " + myarray.value.endrecord5  + " of " + myarray.value.no_records  + "";
	document.getElementById("navigation").style.display="";
}
if(myarray.value.no_records==0)
{
	result +='jhfgshgdhgdghj';
}
var endrecord=myarray.value.endrecord; 
$(function() {
$(".delbutton").click(function(){
var element = $(this);
var del_id = element.attr("data-id");
var info = 'id=' + del_id;
if(1){
    $.ajax({
        type: "GET",
        url: "download2.php",
        data: info,
        success: function(data)
          {   
		  
          }
});
    
	
}
return false;
});
});
$(function() {
$(".delbutton1").click(function(){
var element = $(this);
var del_id = element.attr("data-id");
var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this Record?")){
    $.ajax({
        type: "GET",
        url: "delete.php",
        data: info,
        success: function(data)
          {   
	 $(this).parents(".margin-bottom5").animate({ backgroundColor: "#fbc7c7" }, "fast")
          .animate({ opacity: "hide" }, "slow");
           ajaxFunction(val,opts,page);
          }
		
});
      
	
}
return false;
});
});

$(function() {
	
$(".pop_up_open").click(function(){
	 $('#preloader').show();
var element = $(this);
var id = element.attr("data-id");
    $.ajax({
        type: "GET",
        url: "popup.php",
        data: {id:id},
        success: function(data)
          {   
		   $('#preloader').hide();
		  if($("#myModal").html(data))
		  {
			$("#pop").trigger('click');
          }
	}
});
   
return false;
});
});

var m;
var pagination="";
var next_or_previous;
var pp = myarray.value.no_records;
var page1 = myarray.value.total_pages;
var ans = Math.ceil(pp/10);
if(myarray.value.page1=='undefined'){
	next_or_previous = 1;
	if(myarray.value.total_pages>10)
	{
		$check=0;
		for(m=1; m<=10; m++)
		{
			if(m==1)
			{
				pagination+="<a class='pad active-num' value="+m+" onClick=\"ajaxFunction(\'page\','"+opts+"','"+m+"'); return false\" style=\"pointer-events: none;\" disabled >"+m+"</a>";
			}
			else{
				
					pagination+="<a class='pad' value="+m+" onClick=\"ajaxFunction(\'page\','"+opts+"','"+m+"'); return false\" >"+m+"</a>";
					
				}
		}
		pagination+="<a class='pad' value="+ans+" onClick=\"ajaxFunction(\'page\','"+opts+"','"+ans+"'); return false\" style=\"\"  >Last Page</a>";
	}
	else{
			for(m=1; m<=myarray.value.total_pages; m++)
		{
			if(m==1)
			{
				pagination+="<a class='pad active-num' value="+m+" onClick=\"ajaxFunction(\'page\','"+opts+"','"+m+"'); return false\" style=\"pointer-events: none;\" disabled >"+m+"</a>";
			}
			else{
				
					pagination+="<a class='pad' value="+m+" onClick=\"ajaxFunction(\'page\','"+opts+"','"+m+"'); return false\" >"+m+"</a>";
				}
		}
	}
}
else{
	if(myarray.value.total_pages>10)
	{
		
		var current_page = myarray.value.page1;
		
		
		if(myarray.value.total_pages==myarray.value.page1)
		{
			var next_pages = 0;
		}
		else if((myarray.value.total_pages-1)==myarray.value.page1)
		{
			var next_pages = parseInt(current_page)+ parseInt(2);
		}
		else if((myarray.value.total_pages-2)==myarray.value.page1)
		{
			var next_pages = parseInt(current_page)+ parseInt(3);
		}
		else{
			var next_pages = parseInt(current_page) + parseInt(4);
		}
		next_or_previous = myarray.value.page1;
		
		
		if(myarray.value.page1==4 || myarray.value.page1==1 || myarray.value.page1==2 || myarray.value.page1==3 )
		{
			var previous_pages = 1;
			if(myarray.value.page1==1)
			{
				next_pages=11;
			}
			if(myarray.value.page1==2)
			{
				next_pages=11;
				
			}
			if(myarray.value.page1==3)
			{
				next_pages=11;
				
			}
			if(myarray.value.page1==4)
			{
				next_pages=11;
				
			}
		}
		else{
			var previous_pages = parseInt(current_page)-parseInt(4);
		}
		
		
		if(myarray.value.page1>4)
		{
			pagination+="<a class='pad' value="+1+" onClick=\"ajaxFunction(\'page\','"+opts+"','"+1+"'); return false\" style=\"\"  >First Page</a>";
		}
		
		for(m=previous_pages; m<current_page; m++)
			{
			
					pagination+="<a class='pad' value="+m+" onClick=\"ajaxFunction(\'page\','"+opts+"','"+m+"'); return false\" style=\"\"  >"+m+"</a>";
				
			}
		
	 	for(n=current_page; n<(parseInt(current_page)+parseInt(1)); n++)
			{
				
				
					pagination+="<a class='pad active-num' value="+n+" onClick=\"ajaxFunction(\'page\','"+opts+"','"+n+"'); return false\" style=\"pointer-events:none\" disabled >"+n+"</a>";
				
			}
			
		for(p=(parseInt(current_page)+parseInt(1)); p<next_pages; p++)
			{
				
				
					pagination+="<a class='pad ' value="+p+" onClick=\"ajaxFunction(\'page\','"+opts+"','"+p+"'); return false\" style=\"\"  >"+p+"</a>";
				
			} 
			pagination+="<a class='pad' value="+ans+" onClick=\"ajaxFunction(\'page\','"+opts+"','"+ans+"'); return false\" style=\"\"  >Last Page</a>";
	}
	else{
		
		next_or_previous = myarray.value.page1;
			for(m=1; m<=myarray.value.total_pages; m++)
			{
				if(m==myarray.value.page1)
				{
					pagination+="<a class='pad active-num' value="+m+" onClick=\"ajaxFunction(\'page\','"+opts+"','"+m+"'); return false\" style=\"pointer-events:none\" disabled >"+m+"</a>";
				}
				else{
					
						pagination+="<a class='pad' value="+m+" onClick=\"ajaxFunction(\'page\','"+opts+"','"+m+"'); return false\" >"+m+"</a>";
					}
			}
			
	}
}
document.getElementById("navigation").innerHTML= "<div class='paginate pagination pull-right'><a class='pad' id=\'back\' value='< Previous' onClick=\"ajaxFunction(\'bk\','"+opts+"','"+next_or_previous+"'); return false\" style=\"\" >< Previous</a>"+pagination+"<a class='pad navbar-right' value='Next >' id=\"fwd\" onClick=\"ajaxFunction(\'fw\','"+opts+"','"+next_or_previous+"');  return false\">Next ></a></div>";


myForm.st.value=endrecord;
if(myarray.value.end =="yes"){ document.getElementById("fwd").style.display='inline-block';
}else{document.getElementById("fwd").className += " disabled_class";}


if(myarray.value.startrecord =="yes"){ document.getElementById("back").style.display='inline-block';
}else{document.getElementById("back").className += " disabled_class";}

      }
    }

	var url="search-employee-grid-data.php";
var str=document.getElementById("search2").value;
//var job=document.getElementById("job").value;
var demo=document.getElementById("demo").value;
//var language=document.getElementById("language").value;
//var dropdown = document.getElementById("dropdown").value;
var ff = document.getElementById("ff").value;
var search3 = document.getElementById("search3").value;
var ee = document.getElementById("ee").value;
var gen = document.getElementById("gen").value;
var date = document.getElementById("date").value;
var noti = document.getElementById("noti").value;

var post = document.getElementById("post").value;
var myendrecord=myForm.st.value;

 /*function encode(val){
        var eVal;
        if(!encodeURIComponent){
            eVal=escape(val);
            eVal=eVal.replace(/@/g,"%40");
            eVal=eVal.replace(/\//g,"%2F");
            eVal=eVal.replace(/\+/g,"%2B");
            eVal=eVal.replace(/'/g,"%60");
            eVal=eVal.replace(/"/g,"%22");
            eVal=eVal.replace(/`/g,"%27");
            eVal=eVal.replace(/&/g,"%26");
        }else{
            eVal=encodeURIComponent(val);
            eVal=eVal.replace(/~/g,"%7E");
            eVal=eVal.replace(/!/g,"%21");
            eVal=eVal.replace(/\(/g,"%28");
            eVal=eVal.replace(/\)/g,"%29");
            eVal=eVal.replace(/'/g,"%27");
            eVal=eVal.replace(/"/g,"%22");
            eVal=eVal.replace(/`/g,"%27");
            eVal=eVal.replace(/&/g,"%26");
        }
        return eVal.replace(/\%20/g,"+");
    }

	
	 job =encode(job);*/

url=url+"?txt="+str;
url=url+"&endrecord="+myendrecord;
url=url+"&search3="+search3;
url=url+"&direction="+val;
url=url+"&opts="+opts;
//url=url+"&id="+<?php echo $id; ?>;
//url=url+"&dropdown="+dropdown;
//url=url+"&language="+language;
//url=url+"&job="+job;
url=url+"&noti="+noti;
url=url+"&demo="+demo;
url=url+"&column="+fieldName;
url=url+"&order="+Ascending;
url=url+"&page="+page;
url=url+"&sid="+Math.random();
//document.getElementById("txtHint").innerHTML=url
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);
document.getElementById("msg").innerHTML="Please Wait ...";
document.getElementById("msg").style.display='block';
////////////////////////////////


}
</script>

<script>

</script>
<script>
$(document).ready(function(){
	var date2 = $('#search3').val();
	if(date2!="")
	{
		$(".sr").removeClass("disabled_class");
		
	}
	else{
	
		$(".sr").addClass("disabled_class");
	}
	$('.sortingOrder').click(function(){
		var field_name = $(this).attr('data-name');
		if(fieldName === field_name)
		{
			if(Ascending === "ASC")
			{
				Ascending = "DESC";
			}else{
				Ascending = "ASC";
			}
			ajaxFunction('');
		}
		else{
			fieldName = field_name;
			Ascending = "ASC";
			ajaxFunction('');
		}
	});
	
  /*$('#download').click(function(){
	//  var id = <?php echo $id; ?>; 
	//  var rw = '<?php echo $rw; ?>';
	  var search3 = document.getElementById("search3").value;
	  var str=document.getElementById("search2").value;
		var dropdown = document.getElementById("dropdown").value;
		var job=document.getElementById("job").value;
		//var language=document.getElementById("language").value;
	  window.location.href = "download11.php?id="+id+"&str="+str+"&dropdown="+dropdown+"&job="+job+"&noti="+rw+"&search3="+search3;
  })*/

});
$('#search3').blur(function () {
  if ($(this).val()=="") 
  {
  
  $(".result11").hide();
  
   }
   else
   {
	    $(".result11").show();
	   
   }
});
 $('#demo').change(function() {
	  if ($('#search3').val()=="") 
	  {
        $(".result11").hide();
	  }
       
	   else
	   {
		   $(".result11").show();
	   }
 });
</script>
   <script type="text/javascript">

function clearnow(){
	var date2 = $('#search3').val();
	if(date2!="")
	{
		$('#btnclr').show();
		$(".sr").removeClass("disabled_class");
	}
	else{
		$('#btnclr').hide();
		$(".sr").addClass("disabled_class");
	}
}
clearnow();
  function stopRKey(evt) {
	var evt = (evt) ? evt : ((event) ? event : null);
	var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
	if ((evt.keyCode == 13) && (node.type=="text"))  {  ajaxFunction('');	return false;}
	}
	document.onkeypress = stopRKey;
	$("#btnclr").click(function(){
		$("#srchfrm").trigger('reset');
		window.location='search.php';
	});
</script>
<script>
	 $(document).ready(function() {
	$('.nav li.dropdown').hover(function() {
		$(this).addClass('open');
	}, function() {
		$(this).removeClass('open');
	});
	});
    </script>
<div id='preloader' style='display:none'><img src='../images/pre-loader.gif'/></div>
	
		
