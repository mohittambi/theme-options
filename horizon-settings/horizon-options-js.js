<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function(){
  jQuery(".second").hide();
  jQuery(".third").hide();
  jQuery(".fourth").hide();

  jQuery('.text-box').click(function(){     
    jQuery(".first").show();
    jQuery(".second").hide();
    jQuery(".third").hide();
    jQuery(".fourth").hide();
  });

  jQuery('.social-box').click(function(){     
    jQuery(".second").show(); 
    jQuery(".first").hide();
    jQuery(".third").hide();
    jQuery(".fourth").hide();
  }); 

  jQuery('.section-box').click(function(){     
    jQuery(".third").show();
    jQuery(".first").hide();
    jQuery(".second").hide();
    jQuery(".fourth").hide(); 
  });

  jQuery('.css-box').click(function(){     
    jQuery(".third").hide();
    jQuery(".first").hide();
    jQuery(".second").hide();
    jQuery(".fourth").show(); 
  });

});
</script>