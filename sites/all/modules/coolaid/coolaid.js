// $Id: coolaid.js,v 1.1.2.2 2010/12/13 01:54:27 danielb Exp $

function getViewportHeight() {
  var viewportheight;
  // the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
  if (typeof window.innerWidth != 'undefined') {
    viewportheight = window.innerHeight;
  }
  else if (typeof document.documentElement != 'undefined'
   && typeof document.documentElement.clientWidth !=
   'undefined' && document.documentElement.clientWidth != 0) {
     viewportheight = document.documentElement.clientHeight;
  }
  // older versions of IE
  else {
     viewportheight = document.getElementsByTagName('body')[0].clientHeight;
  }
    return viewportheight;
}

Drupal.behaviors.coolaid = function(context) {
  // Setup
  $('div.coolaid', context).before("<a title='Help' class='coolaid-launch' href='#'>(?)</a>");
  if ($('div.coolaid div.coolaid-message', context).length == 0) {
    $('a.coolaid-launch', context).addClass('coolaid-add-message')
                                  .html("(+)")
                                  .attr('title', 'Add help');
  }
  var coolaid_width = $('div.coolaid', context).width();
  var coolaid_height = $('div.coolaid', context).height();
  $('div.coolaid', context).hide();
  $('body', context).append("<div class='coolaid-sup'>" + $('div.coolaid', context).html() + "</div>");
  $('div.coolaid-sup div.coolaid-content', context).prepend("<a title='Close' class='coolaid-close' href='#'>(X)</a>");
  $('div.coolaid-sup', context).hide();
  $('body', context).append("<div id='coolaid-overlay'></div>");
  $('div#coolaid-overlay', context).fadeTo(0, 0)
                                   .hide();

  // Show overlay
  $('a.coolaid-launch', context).click(function() {
    viewportheight = getViewportHeight();
    var max_height = viewportheight*0.8;
    if (coolaid_height < max_height) {
      max_height = coolaid_height;
    }
    var top_offset = (viewportheight-max_height)/2;
    $('div.coolaid-sup', context).css('top', top_offset+'px')
                                 .css('height', max_height+'px')
                                 .css('position', 'absolute')
                                 .css('width', coolaid_width+'px')
                                 .css('left', '50%')
                                 .css('margin-left', -(coolaid_width/2));
    $('div#coolaid-overlay', context).css('width', $("html").width())
                                     .css('height', $("html").height())
                                     .show()
                                     .fadeTo("fast", 0.66);
    $('div.coolaid-sup', context).show();
  });

  // Hide overlay
  $('div#coolaid-overlay, a.coolaid-close', context).click(function() {
    $('div.coolaid-sup', context).hide();
    $('div#coolaid-overlay', context).fadeTo('slow', 0)
                                     .hide();
  });
};