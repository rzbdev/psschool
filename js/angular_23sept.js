var myApp =	angular.module('myApp', [])
	// directive that prevents submit if there are still form errors
myApp.directive('validSubmit', [ '$parse', function($parse) {
		return {
			// we need a form controller to be on the same element as this directive
			// in other words: this directive can only be used on a &lt;form&gt;
			require: 'form',
			// one time action per form
			link: function(scope, element, iAttrs, form) {
				form.$submitted = false;
				// get a hold of the function that handles submission when form is valid
				var fn = $parse(iAttrs.validSubmit);
				
				// register DOM event handler and wire into Angular's lifecycle with scope.$apply
				element.on('submit', function(event) {
					scope.$apply(function() {
						// on submit event, set submitted to true (like the previous trick)
						form.$submitted = true;
						// if form is valid, execute the submission handler function and reset form submission state
						if (form.$valid) {
							fn(scope, { $event : event });
							form.$submitted = false;
						}
					});
				});
			}
		};
	}
]);
	
    myApp.controller('Ctrl', function($scope,$http) {
        $scope.f_name =/^[a-zA-Z0-9 _\.\-\\]+$/;
        $scope.l_name=/^[a-zA-Z0-9 _\.\-]+$/;
        $scope.apply_post=/^[a-zA-Z0-9 _\.\-]+$/;
        $scope.person_dob_pattern=/^[a-zA-Z0-9 _\.\-\\]+$/ ;
        $scope.age_pattern=/^[a-zA-Z0-9 _\.\-]+$/;
        $scope.pin_pattern=/^[a-zA-Z0-9 _\.\-\\]+$/;
        $scope.tele_no_pattern = /^[a-zA-Z0-9 _\.\-]+$/;
        $scope.email_pattern= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        $scope.alphanumeric_pattern=/^[a-zA-Z0-9 _\.\-]*$/;
         $scope.user = {};
      $scope.sendFormToServer = function() {
 $http({
          method  : 'POST',
          url     : 'clone.php',
          data    : $scope.user, //forms user object
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         })
          .success(function(data) {
            if (data.errors) {
              // Showing errors.
              
              alert("data not inserted");
              
            } else {
              $scope.message = data.message;
              alert("data inserted successfully");
			window.location.reload();
            }
          });
        };
  });  
	
   
function ctetstatus()
{ 
	if((document.getElementById("status_no").checked == false) && (document.getElementById("status_yes").checked == false))
{ 
alert("Please select the required ctet/tet status"); 
} 
}
function check_lang()
{
	
	if((document.getElementById("eng").checked == false) && (document.getElementById("hindi").checked == false)&& (document.getElementById("both").checked == false))
{ 
alert("Please select the required language"); 
} 
}
function chk_cahrge()
{
	
	if((document.getElementById("charge_yes").checked == false) && (document.getElementById("charge_no").checked == false))
{ 
alert("Please select the criminal charge "); 
} 
}
function chk_case()
{
	
	if((document.getElementById("case_yes").checked == false) && (document.getElementById("case_no").checked == false))
{ 
alert("Please select the criminal case"); 
} 
}
function check_maritalstatus()
{
	  var chkYes = document.getElementById("married");
	 

	  
        var dvtable = document.getElementById("table_css_status");
           var dvtable1 = document.getElementById("tab_logic9");
           //var dvtable2 = document.getElementById("tab_logic10");
		   
        dvtable.style.display = chkYes.checked ? "block" : "none";
        dvtable1.style.display = chkYes.checked ? "block" : "none";
       // dvtable2.style.display = chkYes.checked ? "block" : "none";
     
 
$('input[name="status"]').change(function () {
    if($("#married").is(':checked')) {
        $('#spouse_name').attr('required', true);
         $('#spouse_age').attr('required', true);
          $('#spouse_proffession').attr('required', true);
           $('#spouse_post').attr('required', true);
            $('#spouse_posting_place').attr('required', true);
             $('#spouse_income').attr('required', true);
			 
    } else {
        $('#spouse_name').removeAttr('required');
        $('#spouse_age').removeAttr('required');
          $('#spouse_proffession').removeAttr('required');
           $('#spouse_post').removeAttr('required');
            $('#spouse_posting_place').removeAttr('required');
             $('#spouse_income').removeAttr('required');
    }
});
}
function check_maritalstatus1()
{ var chk = document.getElementById("divorce");


	  
    
           var dvtable1 = document.getElementById("tab_logic9");
           var dvtable2 = document.getElementById("table_css_status");
		   
     
        dvtable1.style.display = chk.checked ? "block" : "none";
       dvtable2.style.display = chk.checked ? "none" : "none";
}
function show_father()
{
	var chk = document.getElementById("father");
	var chk1 = document.getElementById("husband");


	  
    
           var dvtable1 = document.getElementById("div_father");
           var dvtable2 = document.getElementById("div_husband");
		   
     
        dvtable1.style.display = chk.checked ? "block" : "none";
        dvtable2.style.display = chk1.checked ? "block" : "none";
} 

function ch2()
{
   var chkYes = document.getElementById("case_yes");
        var dvtable = document.getElementById("case_detail");
          
        dvtable.style.display = chkYes.checked ? "block" : "none";
		$('input[name="criminal_case"]').change(function () {
    if($("#case_yes").is(':checked')) {
        $('#casedetail').attr('required', true);
		 } else {
        $('#casedetail').removeAttr('required');
		 }
});
        
}
function ch3()
{
   var chkYes = document.getElementById("charge_yes");
        var dvtable = document.getElementById("charge_detail");
          
        dvtable.style.display = chkYes.checked ? "block" : "none";
		$('input[name="criminal_charge"]').change(function () {
    if($("#charge_yes").is(':checked')) {
        $('#chargedetail').attr('required', true);
		 } else {
        $('#chargedetail').removeAttr('required');
		 }
});
        
}
function check_experiencestatus()
{
	  var chkYes = document.getElementById("teaching");
	   var chkYes1 = document.getElementById("nonteaching");
	  
	  
        var dvtable = document.getElementById("table_css_status2");
      var dvtable1 = document.getElementById("table_css_status3");
        dvtable.style.display = chkYes.checked ? "block" : "none";
		 dvtable1.style.display = chkYes.checked ? "block" : "none";
      var dvtable2 = document.getElementById("table_css_status4");
        
		 dvtable2.style.display = chkYes1.checked ? "block" : "none";
       
}

