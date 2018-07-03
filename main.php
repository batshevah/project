
$(".portlet-header").css("cursor", "all-scroll");

var cols = $("div[class^='col']");
for (var i = 0; i < cols.length; i++) {
    cols[i].id='d'+i;
    cols[i].draggable= "true";
	  cols[i].addEventListener('dragstart', drag);
    cols[i].addEventListener('dragover', allowDrop);
    cols[i].addEventListener('drop', drop);
    cols[i].addEventListener('dragend', dropOut);
}

    var stop = true;
    var ie = isIE();
    if (ie == false)
       steps = 1;
    else steps = 7;  
    var maxValue = $(document).height() - $(window).height() ;
    $("[draggable=true]").on("drag", function (e) {

        stop = true;

        if (e.originalEvent.clientY < 150) {
            stop = false;
            scroll(-steps)
        }

        if (e.originalEvent.clientY > ($(window).height() - 150)) {
            stop = false;
            scroll(steps)
        }

    });

    $("[draggable=true]").on("dragend", function (e) {
         stop = true;
    });

    var scroll = function (step) {
        var scrollY = $(window).scrollTop();
         window.scrollTo(0, scrollY + step);
        if (!stop) {
            setTimeout(function () { 
            	scroll(step)
            	 }, 20);
        }
    }

function dropOut(ev) {
	colsChildren=$("div[class^='col']");
  colsChildren.removeClass("points");
}
  
var target_drop="";
function allowDrop(ev) {

  target_drop=ev.target.id;
  ev.preventDefault();
}
function drag(ev)
  {
   
  var colsChildren=$("div[class^='col']");
  //colsChildren.css("pointer-events","none");
  colsChildren.addClass("points");
    ev.dataTransfer.setData
    ("text",ev.target.id);
  }

function drop(ev) {
  ev.preventDefault();
  var drop_target = $('#'+ev.target.id)[0];
  var drag_target_id = ev.dataTransfer.getData("text");
  var drag_target = $('#'+drag_target_id)[0];
  if(target_drop!="" && ev.target.id!=drag_target_id)
  {


 var drop_target2=drop_target.innerHTML;
 drop_target.innerHTML=drag_target.innerHTML;
 drag_target.innerHTML=drop_target2;
  draggedBoxes[drag_target.id.substr(1)]=drag_target.lastElementChild.id.substr(1);
  draggedBoxes[drop_target.id.substr(1)]=drop_target.lastElementChild.id.substr(1);
  saveDNDprefer();

  var functionName=$(drop_target).find("div[id$='Container']")[0].id;
  var fn = window[functionName];
  if(typeof fn === 'function') {
    fn();
  }
  functionName=$(drag_target).find("div[id$='Container']")[0].id;
  fn = window[functionName];
  if(typeof fn === 'function') {
    fn();
  }
  
  
  target_drop="";
  }

  colsChildren=$("div[class^='col']");
  colsChildren.removeClass("points");
  $.fn.tooltip && $(".ui-tooltip").tooltip({
                container: "body"
            }), $.fn.popover && $(".ui-popover").popover({
                container: "body",
                html: "true"
            })
 
}
