		$(document).ready(function () {
			var thisFloat = parseFloat("10.1"); 
			$("#content").each(function () {
				$(this).bind('click', (function() { 
					var currValue = parseFloat($("#content")[0].innerText);
					$("#content")[0].innerText = currValue + thisFloat; 
				}));
			});
			
			$('#home')[0].classList.add('active');
		});
