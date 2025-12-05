// Quantity buttons
	function qtySum(){
    var arr = document.getElementsByName('qtyInput');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }

    var cardQty = document.querySelector(".qtyTotal");
    if(cardQty) {
        cardQty.innerHTML = tot;
    }
	} 
	// Only call qtySum if elements exist
	if(document.getElementsByName('qtyInput').length > 0) {
		qtySum();
	}

	$(function() {
	   // Only initialize if qtyButtons elements exist
	   if($(".qtyButtons input").length === 0) {
		   return;
	   }

	   $(".qtyButtons input").after('<div class="qtyInc"></div>');
	   $(".qtyButtons input").before('<div class="qtyDec"></div>');
	   $(".qtyDec, .qtyInc").on("click", function(e) {

		  var $button = $(this);
		  var oldValue = $button.parent().find("input").val();
		  var input = $button.parent().find("input")[0];
		  var maxPerson = input ? parseInt(input.getAttribute('max')) : null;

		  if ($button.hasClass('qtyInc')) {
			 // Cek max_person jika ada
			 if (maxPerson && parseFloat(oldValue) >= maxPerson) {
				e.preventDefault();
				e.stopPropagation();
				return false;
			 }
			 var newVal = parseFloat(oldValue) + 1;
		  } else {
			 // don't allow decrementing below zero
			 if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			 } else {
				newVal = 0;
			 }
		  }

		  $button.parent().find("input").val(newVal);
		  qtySum();
		  var qtyTotalEl = $(".qtyTotal");
		  if(qtyTotalEl.length > 0) {
			  qtyTotalEl.addClass("rotate-x");
		  }
		  
		  // Trigger update untuk disable/enable button
		  if (typeof updateQuantityButtons === 'function') {
			  updateQuantityButtons();
		  }

	   });

	   function removeAnimation() { 
		   var qtyTotalEl = $(".qtyTotal");
		   if(qtyTotalEl.length > 0) {
			   qtyTotalEl.removeClass("rotate-x"); 
		   }
	   }
	   const counter = document.querySelector(".qtyTotal");
	   if(counter) {
		   counter.addEventListener("animationend", removeAnimation);
	   }

	});