!function ($) {
  	$(function(){
  		
		// datepicker
		$(".datepicker-input").each(function(){ $(this).datepicker();});

		
		// typeahead
		var vendors = new Bloodhound({
		    datumTokenizer: function (datum) {
		        return Bloodhound.tokenizers.whitespace(datum.value);
		    },
		    queryTokenizer: Bloodhound.tokenizers.whitespace,
		    limit: 10,
		    prefetch: {
		    	// url: 'http://localhost/vpa/public/api/vendors.json',
			    url: 'http://10.128.48.35/vpa/api/vendors.json',
			    filter: function (vendors) {
		            return $.map(vendors, function (vendor) {
		                return {
		                    id: vendor.id,
		                    value: vendor.name
		                };
		            });
		        }
		  	}
		});
		vendors.clear();
		vendors.clearPrefetchCache();
		vendors.clearRemoteCache();
		vendors.initialize(true);
		$('#vendor-name').typeahead(null, {
			name: 'vendors',
		    displayKey: 'value',
		    source: vendors.ttAdapter()
		}).on('typeahead:selected', function(event, data){
	        $('#vendor-id').val(data.id);
	    });


		var buyers = new Bloodhound({
		    datumTokenizer: function (datum) {
		        return Bloodhound.tokenizers.whitespace(datum.value);
		    },
		    queryTokenizer: Bloodhound.tokenizers.whitespace,
		    limit: 10,
		    prefetch: {
		    	// url: 'http://localhost/vpa/public/api/employees.json',
			    url: 'http://10.128.48.35/vpa/api/employees.json',
			    filter: function (buyers) {
		            return $.map(buyers, function (buyer) {
		                return {
		                	id: buyer.id,
		                    value: buyer.name
		                };
		            });
		        }
		  	}
		});
		buyers.initialize();
		$('#buyer-name').typeahead(null, {
			name: 'buyers',
		    displayKey: 'value',
		    source: buyers.ttAdapter()
		}).on('typeahead:selected', function(event, data){
	        $('#buyer-id').val(data.id);
	        // console.log($('#buyer-name').val());
	    });

		
		var employees = new Bloodhound({
		    datumTokenizer: function (datum) {
		        return Bloodhound.tokenizers.whitespace(datum.value);
		    },
		    queryTokenizer: Bloodhound.tokenizers.whitespace,
		    limit: 10,
		    prefetch: {
		    	ttl: 0, //-- not to cache
		    	// url: 'http://localhost/vpa/public/api/employees.json',
			    url: 'http://10.128.48.35/vpa/api/employees.json',
			    filter: function (employees) {
		            return $.map(employees, function (employee) {
		                return {
		                	id: employee.id,
		                    value: employee.name
		                };
		            });
		        }
		  	}
		});
		employees.initialize();
		$('.typeahead-employee').typeahead(null, {
			name: 'employees',
		    displayKey: 'value',
		    source: employees.ttAdapter()
		}).on('typeahead:selected', function(event, data){
			if ($(this).attr('id') == 'project-manager') {
				$('#project-manager-id').val(data.id);
			} else if($(this).attr('id') == 'end-user') {
				$('#end-user-id').val(data.id);
			}
	        console.log(data.id);
	    });;
		// typeahead end
		

		// //-- submit button clicked
		// $('#submit-btn').click(function(){
		// 	$('#hidden-editor').html($("#editor").html());
		// });



	});
}(window.jQuery);