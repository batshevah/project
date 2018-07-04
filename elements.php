  <html>

<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>mains</title>

  <style type="text/css">
  <?php if($hasNoData == "true"){?>
	#dataBox {
		display: none;
	}
  <?php }?>

.points *{
	pointer-events:none;
	cursor:all-scroll;
}
 #AttendanceContainer img{
	width:25px;
	height:25px;
}
.far, .fal {
	cursor:pointer;
	
}
.fa-caret-up, .fa-caret-down
{
	font-size: 1.4em;
	margin-left:6px;
}
  </style>
</head>
<body>
  <div  class="col-md-6 col-sm-6"  id="dataBox" >
   <div  class="portlet portlet-boxed" >
      <div class="portlet-header">
              <h4 class="portlet-title">Attendance Status </h4>
              <span ><i onclick="return toggle(this)" class="fal fa-caret-up  pull-left ui-popover" data-toggle="tooltip" data-placement=right	data-trigger="hover" data-content=toggleIn aria-hidden="true" ></i></span>
              <span ><i id="refreshAttStats" class="far fa-sync-alt rotate pull-left aria-hidden="true" ></i></span>
              <br>
            <font id="AttStats_last_update" class="pull-left"></font>
            </div>
            <div class="portlet-body"  >
		       	<ul id="myTab1" class="nav nav-tabs">
              <li class="active">
                <a href="#" id="today_AttStats" data-toggle="tab" class="AttStatsTab">today</a>
              </li>
              <li class="">
                <a href="#" id="yesterday_AttStats" data-toggle="tab" class="AttStatsTab">Yesterday</a>
              </li>
              <li class="">
                <a href="#" id="lastweektoday_AttStats" data-toggle="tab" class="AttStatsTab">Today a week ago</a>
              </li>
            </ul>
              <div class="row" id="AttStatsContainer"></div>
			  <div id="AttStats_loading" class="initialText loading"><h3>Loading..</h3></div>
			  <div id="AttStats_invalid" class="initialText" style="display:none;"><h3>invalid</h3></div>
            </div>
          </div>
      </div>
      </body>
     </html> 
