(function($){$.fn.jFlow=function(options){var opts=$.extend({},$.fn.jFlow.defaults,options);var cur=0;var timer;var selected_class="jFlowSelected";var maxi=$(".jFlowControl").length;$(this).find(".jFlowControl").each(function(i){$(this).click(function(){dotimer();if(i==0){$(".jFlowControl").removeClass(selected_class+"2");$(".jFlowControl").removeClass(selected_class+"3");}
if(i==1){$(".jFlowControl").removeClass(selected_class+"1");$(".jFlowControl").removeClass(selected_class+"3");}
if(i==2){$(".jFlowControl").removeClass(selected_class+"2");$(".jFlowControl").removeClass(selected_class+"3");}
if(i==3){$(".teaser2").removeClass(selected_class+"2");$(".teaser3").removeClass(selected_class+"3");}
if(i==4){$(".teaser1").removeClass(selected_class+"1");$(".teaser3").removeClass(selected_class+"3");}
if(i==5){$(".teaser2").removeClass(selected_class+"2");$(".teaser3").removeClass(selected_class+"3");}
if(i==0)$(this).addClass(selected_class+"1");if(i==1)$(this).addClass(selected_class+"2");if(i==2)$(this).addClass(selected_class+"3");if(i==3)$(this).addClass(selected_class+"1");if(i==4)$(this).addClass(selected_class+"2");if(i==5)$(this).addClass(selected_class+"3");var dur=Math.abs(cur-i);$(opts.slides).animate({marginLeft:"-"+(i*$(opts.slides).find(":first-child").width()+"px")},opts.duration*(dur));cur=i;});});$(opts.slides).before('<div id="jFlowSlide"></div>').appendTo("#jFlowSlide");$(opts.slides).find("div").each(function(){$(this).before('<div class="jFlowSlideContainer"></div>').appendTo($(this).prev());});$(".jFlowControl").eq(cur).addClass(selected_class+1);var resize=function(x){$("#jFlowSlide").css({position:"relative",width:opts.width,height:opts.height,overflow:"hidden"});$(opts.slides).css({position:"relative",width:$("#jFlowSlide").width()*$(".jFlowControl").length+"px",height:$("#jFlowSlide").height()+"px",overflow:"hidden"});$(opts.slides).children().css({position:"relative",width:$("#jFlowSlide").width()+"px",height:$("#jFlowSlide").height()+"px","float":"left"});$(opts.slides).css({marginLeft:"-"+(cur*$(opts.slides).find(":first-child").width()+"px")});}
resize();$(window).resize(function(){resize();});$(".jFlowPrev").click(function(){dotimer();doprev();});var doprev=function(x){if(cur>0)
cur--;else
cur=maxi-1;$(".jFlowControl").removeClass(selected_class+(maxi-cur-1));$(opts.slides).animate({marginLeft:"-"+(cur*$(opts.slides).find(":first-child").width()+"px")},opts.duration);if(cur==3){$(".teaser1").addClass(selected_class+"1");$(".teaser2").removeClass(selected_class+"2");$(".teaser3").removeClass(selected_class+"3");}
else if(cur==4){$(".teaser2").addClass(selected_class+"2");$(".teaser1").removeClass(selected_class+"1");$(".teaser3").removeClass(selected_class+"3");}
else if(cur==5){$(".teaser3").addClass(selected_class+"3");$(".teaser1").removeClass(selected_class+"1");$(".teaser2").removeClass(selected_class+"2");}
else{$(".jFlowControl").eq(cur).addClass(selected_class+(cur+1));}}
$(".jFlowNext").click(function(){donext();dotimer();});var donext=function(x){if(cur<maxi-1)
cur++;else
cur=0;if(cur==maxi)$(".jFlowControl").removeClass(selected_class+"1");if(cur==0)$(".jFlowControl").removeClass(selected_class+"3");else $(".jFlowControl").removeClass(selected_class+(cur));$(opts.slides).animate({marginLeft:"-"+(cur*$(opts.slides).find(":first-child").width()+"px")},opts.duration);if(cur==3){$(".teaser1").addClass(selected_class+"1");$(".teaser2").removeClass(selected_class+"2");$(".teaser3").removeClass(selected_class+"3");}
else if(cur==4){$(".teaser2").addClass(selected_class+"2");$(".teaser1").removeClass(selected_class+"1");$(".teaser3").removeClass(selected_class+"3");}
else if(cur==5){$(".teaser3").addClass(selected_class+"3");$(".teaser1").removeClass(selected_class+"1");$(".teaser2").removeClass(selected_class+"2");}
else{$(".jFlowControl").eq(cur).addClass(selected_class+(cur+1));}}
var dotimer=function(x){if(timer!=null)
clearInterval(timer);timer=setInterval(function(){/*donext();*/},3600);}
dotimer();};$.fn.jFlow.defaults={easing:"swing",duration:1,width:"100%"};})(jQuery);