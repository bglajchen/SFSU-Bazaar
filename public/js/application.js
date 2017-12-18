$(function() {

    // just a super-simple JS demo

    var demoHeaderBox;

    // simple demo to show create something via javascript on the page
    if ($('#javascript-header-demo-box').length !== 0) {
    	demoHeaderBox = $('#javascript-header-demo-box');
    	demoHeaderBox
    	.hide()
    	.text('Hello from JavaScript! This line has been added by public/js/application.js')
    	.css('color', 'green')
    	.fadeIn('slow');
    }

    // if #javascript-ajax-button exists
    if ($('#javascript-ajax-button').length !== 0) {

    	$('#javascript-ajax-button').on('click', function(){

            // send an ajax-request to this URL: current-server.com/songs/ajaxGetStats
            // "url" is defined in views/_templates/footer.php
            $.ajax(url + "/songs/ajaxGetStats")
            .done(function(result) {
                    // this will be executed if the ajax-call was successful
                    // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                    $('#javascript-ajax-result-box').html(result);
                })
            .fail(function() {
                    // this will be executed if the ajax-call had failed
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
        });
    }

});

// Product Page and Confirmation Page
// Goes back to previous page
function goBack() {
	window.history.back();
}

// Confirmation Page 
// Opens up an alert dialog
function msgSent() {
	alert("Message has been sent to seller.");
}


// Product Page
// change quantity
$(document).ready(function () {
	$('.btn-number').click(function (e) {
		e.preventDefault();

		var fieldName = $(this).attr('data-field');
		var type = $(this).attr('data-type');
		var input = $("input[name='" + fieldName + "']");
		var currentVal = parseInt(input.val());
		if (!isNaN(currentVal)) {
			if (type == 'minus') {
				var minValue = parseInt(input.attr('min'));
				if (!minValue)
					minValue = 1;
				if (currentVal > minValue) {
					input.val(currentVal - 1).change();
				}
				if (parseInt(input.val()) == minValue) {
					$(this).attr('disabled', true);
				}

			} else if (type == 'plus') {
				var maxValue = parseInt(input.attr('max'));
				if (!maxValue)
					maxValue = 9999999999999;
				if (currentVal < maxValue) {
					input.val(currentVal + 1).change();
				}
				if (parseInt(input.val()) == maxValue) {
					$(this).attr('disabled', true);
				}

			}
		} else {
			input.val(0);
		}
	});

	$('.input-number').focusin(function () {
		$(this).data('oldValue', $(this).val());
	});

	$('.input-number').change(function () {

		var minValue = parseInt($(this).attr('min'));
		var maxValue = parseInt($(this).attr('max'));
		if (!minValue)
			minValue = 1;
		if (!maxValue)
			maxValue = 9999999999999;
		var valueCurrent = parseInt($(this).val());

		var name = $(this).attr('name');
		if (valueCurrent >= minValue) {
			$(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
		} else {
			alert('Sorry, the minimum value was reached');
			$(this).val($(this).data('oldValue'));
		}
		if (valueCurrent <= maxValue) {
			$(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
		} else {
			alert('Sorry, the maximum value was reached');
			$(this).val($(this).data('oldValue'));
		}


	});

        // Allows key press functions
        $(".input-number").keydown(function (e) {
            // Allows backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    // Allows Ctrl+A
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                            // Allows home, end, left, right
                            (e.keyCode >= 35 && e.keyCode <= 39)) {
                        // let it happen, don't do anything
                    return;
                }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    	e.preventDefault();
                    }
                });
    });

// New Product Page
// Hides/Shows form based on selected radio buttons
$(document).ready(function () 
{ 

		//default hides all
		$("#service").hide();


		$("#isService").click(function()
		{
			$("#service:hidden").show('slow');
			$("#product").hide();
		});
		$("#isService").click(function()
		{
			if($('isService').prop('checked')===false)
			{
				$('#service').hide();
			}
		});


		$("#notService").click(function()
		{
			$("#product:hidden").show('slow');
			$("#service").hide();
		});
		$("#notService").click(function()
		{
			if($('notService').prop('checked')===false)
			{
				$('#product').hide();
			}
		});

	});

// login 
$(document).ready(function () {
	var intputElements = document.getElementsByTagName("INPUT");
	for (var i = 0; i < intputElements.length; i++) {
		intputElements[i].oninvalid = function (e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				if (e.target.name == "email") {
					e.target.setCustomValidity("The field 'Email' cannot be left blank");
				}
				else if (e.target.name == "password"){
					e.target.setCustomValidity("The field 'Password' cannot be left blank");
				}
			}
		};
	}
})