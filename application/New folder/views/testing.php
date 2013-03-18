<!DOCTYPE html>
<html>
<head>

</head>
<body>
  
  <script type="text/javascript">
    $(document).ready(function() {
      /* Multi select - allow multiple selections */
      /* Allow click without closing menu */
      /* Toggle checked state and icon */
      $('.multicheck').click(function(e) {     
         $(this).toggleClass("checked"); 
         $(this).find("span").toggleClass("icon-ok"); 
         return false;
      });
      /* Single Select - allow only one selection */  
      /* Toggle checked state and icon and also remove any other selections */  
       $('.singlecheck').click(function (e) {
            $(this).parent().siblings().children().removeClass("checked");
            $(this).parent().siblings().children().find("span").removeClass("icon-ok");
            $(this).toggleClass("checked");
            $(this).find("span").toggleClass("icon-ok");
            return false;
        });
 
      /* To check whether an item is checked use the hasClass method */
      //alert($("#chkB").hasClass("checked"));
        
    });
    
    
 
    
  </script>
 
  <div class="navbar">
              <div class="navbar-inner">
 
                    <ul class="nav">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Multi Select<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a id="chkA" class="multicheck" href="#">Test A
                            <span class="pull-right"></span></a></li>
                          <li><a id="chkB" class="multicheck checked" href="#">Test B
                            <span class="icon-ok pull-right"></span></a></li>
                          <li><a id="chkC" class="multicheck checked" href="#">Test C
                            <span class="icon-ok pull-right"></span></a></li>
                          <li><a id="chkD" class="multicheck checked" href="#">Test D
                            <span class="icon-ok pull-right"></span></a></li>
						  <li><a id="chkA" class="multicheck" href="#">Test A
                            <span class="pull-right"></span></a></li>
                          <li><a id="chkB" class="multicheck checked" href="#">Test B
                            <span class="icon-ok pull-right"></span></a></li>
                          <li><a id="chkC" class="multicheck checked" href="#">Test C
                            <span class="icon-ok pull-right"></span></a></li>
                          <li><a id="chkD" class="multicheck checked" href="#">Test D
                            <span class="icon-ok pull-right"></span></a></li>
                          <div class="clearfix"></div>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Single Select<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a id="chkA" class="singlecheck" href="#">Test A
                            <span class="pull-right"></span></a></li>
                          <li><a id="chkB" class="singlecheck checked" href="#">Test B
                            <span class="icon-ok pull-right"></span></a></li>
                          <li><a id="chkC" class="singlecheck checked" href="#">Test C
                            <span class="icon-ok pull-right"></span></a></li>
                          <li><a id="chkD" class="singlecheck checked" href="#">Test D
                            <span class="icon-ok pull-right"></span></a></li>
						  <li><a id="chkA" class="singlecheck" href="#">Test A
                            <span class="pull-right"></span></a></li>
                          <li><a id="chkB" class="singlecheck checked" href="#">Test B
                            <span class="icon-ok pull-right"></span></a></li>
                          <li><a id="chkC" class="singlecheck checked" href="#">Test C
                            <span class="icon-ok pull-right"></span></a></li>
                          <li><a id="chkD" class="singlecheck checked" href="#">Test D
                            <span class="icon-ok pull-right"></span></a></li>
                          <div class="clearfix"></div>
                        </ul>
                      </li>
 
                    </ul>
                
              </div>
            </div>
  
</body>
</html>