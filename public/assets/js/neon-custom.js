/**
 *	Neon Main JavaScript File
 *
 *	Theme by: www.laborator.co
 **/

var public_vars = public_vars || {};

;(function($, window, undefined){

	"use strict";

	$(document).ready(function()
	{
		// Sidebar Menu var
		public_vars.$body	 	 	= $("body");
		public_vars.$pageContainer  = public_vars.$body.find(".page-container");		


		public_vars.$body.addClass('loaded');

		// Just to make sure...
		$(window).on('error', function(ev)
		{
			// Do not let page without showing if JS fails somewhere
			init_page_transitions();
		});

		if(public_vars.$pageContainer.hasClass('right-leftmenu'))
		{
			public_vars.isRightSidebar = true;
		}

		


		
		// Panels

		// Added on v1.1.4 - Fixed collapsing effect with panel tables
		$(".panel-heading").each(function(i, el)
		{
			var $this = $(el),
				$body = $this.next('table');

			$body.wrap('<div class="panel-body with-table"></div>');

			$body = $this.next('.with-table').next('table');
			$body.wrap('<div class="panel-body with-table"></div>');

		});

		continueWrappingPanelTables();
		// End of: Added on v1.1.4


		$('body').on('click', '.panel > .panel-heading > .panel-options > a[data-rel="reload"]', function(ev)
		{
			ev.preventDefault();

			var $this = jQuery(this).closest('.panel');

			blockUI($this);
			$this.addClass('reloading');

			setTimeout(function()
			{
				unblockUI($this)
				$this.removeClass('reloading');

			}, 900);

		}).on('click', '.panel > .panel-heading > .panel-options > a[data-rel="close"]', function(ev)
		{
			ev.preventDefault();

			var $this = $(this),
				$panel = $this.closest('.panel');

			var t = new TimelineLite({
				onComplete: function()
				{
					$panel.slideUp(function()
					{
						$panel.remove();
					});
				}
			});

			t.append( TweenMax.to($panel, .2, {css: {scale: 0.95}}) );
			t.append( TweenMax.to($panel, .5, {css: {autoAlpha: 0, transform: "translateX(100px) scale(.95)"}}) );

		}).on('click', '.panel > .panel-heading > .panel-options > a[data-rel="collapse"]', function(ev)
		{
			ev.preventDefault();

			var $this = $(this),
				$panel = $this.closest('.panel'),
				$body = $panel.children('.panel-body, .table'),
				do_collapse = ! $panel.hasClass('panel-collapse');

			if($panel.is('[data-collapsed="1"]'))
			{
				$panel.attr('data-collapsed', 0);
				$body.hide();
				do_collapse = false;
			}

			if(do_collapse)
			{
				$body.slideUp('normal');
				$panel.addClass('panel-collapse');
			}
			else
			{
				$body.slideDown('normal');
				$panel.removeClass('panel-collapse');
			}
		});




		


		// jQuery Knob
		if($.isFunction($.fn.knob))
		{
			$(".knob").knob({
				change: function (value) {
				},
				release: function (value) {
				},
				cancel: function () {
				},
				draw: function () {

					if (this.$.data('skin') == 'tron') {

						var a = this.angle(this.cv) // Angle
							,
							sa = this.startAngle // Previous start angle
							,
							sat = this.startAngle // Start angle
							,
							ea // Previous end angle
							, eat = sat + a // End angle
							,
							r = 1;

						this.g.lineWidth = this.lineWidth;

						this.o.cursor && (sat = eat - 0.3) && (eat = eat + 0.3);

						if (this.o.displayPrevious) {
							ea = this.startAngle + this.angle(this.v);
							this.o.cursor && (sa = ea - 0.3) && (ea = ea + 0.3);
							this.g.beginPath();
							this.g.strokeStyle = this.pColor;
							this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
							this.g.stroke();
						}

						this.g.beginPath();
						this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
						this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
						this.g.stroke();

						this.g.lineWidth = 2;
						this.g.beginPath();
						this.g.strokeStyle = this.o.fgColor;
						this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
						this.g.stroke();

						return false;
					}
				}
			});
		}




		


		// Tile Stats
		$(".tile-stats").each(function(i, el)
		{
			var $this = $(el),
				$num = $this.find('.num'),

				start = attrDefault($num, 'start', 0),
				end = attrDefault($num, 'end', 0),
				prefix = attrDefault($num, 'prefix', ''),
				postfix = attrDefault($num, 'postfix', ''),
				duration = attrDefault($num, 'duration', 1000),
				delay = attrDefault($num, 'delay', 1000),
				format = attrDefault($num, 'format', false);

			if(start < end)
			{
				if(typeof scrollMonitor == 'undefined')
				{
					$num.html(prefix + end + postfix);
				}
				else
				{
					var tile_stats = scrollMonitor.create( el );

					tile_stats.fullyEnterViewport(function(){

						var o = {curr: start};

						TweenLite.to(o, duration/1000, {curr: end, ease: Power1.easeInOut, delay: delay/1000, onUpdate: function()
							{
								$num.html(prefix + (format ? numberWithCommas( Math.round(o.curr) ) : Math.round(o.curr)) + postfix);
							}
						});

						tile_stats.destroy()
					});
				}
			}
		});



// Root Wizard Current Tab
function setCurrentProgressTab($rootwizard, $nav, $tab, $progress, index)
{
	$tab.prevAll().addClass('completed');
	$tab.nextAll().removeClass('completed');

	var items      	  = $nav.children().length,
		pct           = parseInt((index+1) / items * 100, 10),
		$first_tab    = $nav.find('li:first-child'),
		margin        = (1/(items*2) * 100) + '%';//$first_tab.find('span').position().left + 'px';

	if( $first_tab.hasClass('active'))
	{
		$progress.width(0);
	}
	else
	{
		if(rtl())
		{
			$progress.width( $progress.parent().outerWidth(true) - $tab.prev().position().left - $tab.find('span').width()/2 );
		}
		else
		{
			$progress.width( ((index-1) /(items-1)) * 100 + '%' ); //$progress.width( $tab.prev().position().left - $tab.find('span').width()/2 );
		}
	}


	$progress.parent().css({
		marginLeft: margin,
		marginRight: margin
	});

	/*var m = $first_tab.find('span').position().left - $first_tab.find('span').width() / 2;

	$rootwizard.find('.tab-content').css({
		marginLeft: m,
		marginRight: m
	});*/
}


