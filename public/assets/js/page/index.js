$(function() {
 google.charts.load('upcoming', {'packages':['geochart']});
  google.charts.setOnLoadCallback(drawRegionsMap);
  function drawRegionsMap() {
	"use strict";
    var data = google.visualization.arrayToDataTable([
	  ['Country', 'Visitors'],
	  ['Germany', 200],
	  ['America', 600],
	  ['Brazil', 100],
	  ['Canada', 400],
	  ['France', 190],
	  ['RU', 210]
	]);
	var options = {};
	var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
	chart.draw(data, options);
		
// Initialize Line Chart
		var data1 = [{
			data: [[1,5.3],[2,5.9],[3,7.2],[4,8],[5,7],[6,6.5],[7,6.2],[8,6.7],[9,7.2],[10,7],[11,6.8],[12,7]],
			label: 'Sales',
			points: {
				show: true,
				radius: 6
			},
			splines: {
				show: true,
				tension: 0.45,
				lineWidth: 5,
				fill: 0
			}
		}, {
			data: [[1,6.6],[2,7.4],[3,8.6],[4,9.4],[5,8.3],[6,7.9],[7,7.2],[8,7.7],[9,8.9],[10,8.4],[11,8],[12,8.3]],
			label: 'Orders',
			points: {
				show: true,
				radius: 6
			},
			splines: {
				show: true,
				tension: 0.45,
				lineWidth: 5,
				fill: 0
			}
		}];

		var options1 = {
			colors: ['#a2d200', '#cd97eb'],
			series: {
				shadowSize: 0
			},
			xaxis:{
				font: {
					color: '#3d4c5a'
				},
				position: 'bottom',
				ticks: [
					[ 1, 'Jan' ], [ 2, 'Feb' ], [ 3, 'Mar' ], [ 4, 'Apr' ], [ 5, 'May' ], [ 6, 'Jun' ], [ 7, 'Jul' ], [ 8, 'Aug' ], [ 9, 'Sep' ], [ 10, 'Oct' ], [ 11, 'Nov' ], [ 12, 'Dec' ]
				]
			},
			yaxis: {
				font: {
					color: '#3d4c5a'
				}
			},
			grid: {
				hoverable: true,
				clickable: true,
				borderWidth: 0,
				color: '#ccc'
			},
			tooltip: true,
			tooltipOpts: {
				content: '%s: %y.4',
				defaultTheme: false,
				shifts: {
					x: 0,
					y: 20
				}
			}
		};

		var plot1 = $.plot($("#line-chart"), data1, options1);

		$(window).resize(function() {
			// redraw the graph in the correctly sized div
			plot1.resize();
			plot1.setupGrid();
			plot1.draw();
		});
		// * Initialize Line Chart
  }

<!-- Page Specific Scripts  -->
	$(window).load(function(){ 		
		// Initialize rickshaw chart
		var graph;

		var seriesData = [ [], []];
		var random = new Rickshaw.Fixtures.RandomData(50);

		for (var i = 0; i < 50; i++) {
			random.addData(seriesData);
		}

		graph = new Rickshaw.Graph( {
			element: document.querySelector("#realtime-rickshaw"),
			renderer: 'area',
			height: 200,
			series: [{
				name: 'Series 1',
				color: '#9675ce',
				data: seriesData[0]
			}, {
				name: 'Series 2',
				color: '#d4bdfa',
				data: seriesData[1]
			}]
		});

		var hoverDetail = new Rickshaw.Graph.HoverDetail( {
			graph: graph,
		});

		graph.render();

		setInterval( function() {
			random.removeData(seriesData);
			random.addData(seriesData);
			graph.update();

		},1000);
		//* Initialize rickshaw chart 

		//initialize datatable
		$('#project-progress').DataTable({
			"aoColumnDefs": [
			  { 'bSortable': false, 'aTargets': [ "no-sort" ] }
			],
		});
		//*initialize datatable

		//load wysiwyg editor
		$('#summernote').summernote({
			toolbar: [
				//['style', ['style']], // no style button
				['style', ['bold', 'italic', 'underline', 'clear']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']],
				//['insert', ['picture', 'link']], // no insert buttons
				//['table', ['table']], // no table button
				//['help', ['help']] //no help button
			],
			height: 143   //set editable area's height
		});
		//*load wysiwyg editor
	});
    
});
// Morph Search =======================================================================
$(function() {
    var morphSearch = document.getElementById( 'morphsearch' ),
        input = morphSearch.querySelector( 'input.morphsearch-input' ),
        ctrlClose = morphSearch.querySelector( 'span.morphsearch-close' ),
        isOpen = isAnimating = false,
        // show/hide search area
        toggleSearch = function(evt) {
            // return if open and the input gets focused
            if( evt.type.toLowerCase() === 'focus' && isOpen ) return false;

            var offsets = morphsearch.getBoundingClientRect();
            if( isOpen ) {
                classie.remove( morphSearch, 'open' );

                // trick to hide input text once the search overlay closes 
                // todo: hardcoded times, should be done after transition ends
                if( input.value !== '' ) {
                    setTimeout(function() {
                        classie.add( morphSearch, 'hideInput' );
                        setTimeout(function() {
                            classie.remove( morphSearch, 'hideInput' );
                            input.value = '';
                        }, 300 );
                    }, 500);
                }
                
                input.blur();
            }
            else {
                classie.add( morphSearch, 'open' );
            }
            isOpen = !isOpen;
        };

    // events
    input.addEventListener( 'focus', toggleSearch );
    ctrlClose.addEventListener( 'click', toggleSearch );
    // esc key closes search overlay
    // keyboard navigation events
    document.addEventListener( 'keydown', function( ev ) {
        var keyCode = ev.keyCode || ev.which;
        if( keyCode === 27 && isOpen ) {
            toggleSearch(ev);
        }
    } );


    /***** for demo purposes only: don't allow to submit the form *****/
    morphSearch.querySelector( 'button[type="submit"]' ).addEventListener( 'click', function(ev) { ev.preventDefault(); } );
});
// End Morph Search =======================================================================