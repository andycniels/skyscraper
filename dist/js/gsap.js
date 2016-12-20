

$(".search-bar .search input[value=Search], .search-bar .search input[value=Search]").mouseenter(function(){
			var tween = TweenMax.to('.search-bar .search input[value=Search]', 1, {css:{backgroundColor:'#f2f2f2', border: '2px solid #50a4b9', color:'#50a4b9' }, ease:Power4.easeOut});  
        });

        $(".search-bar .search input[value=Search], .search-bar .search input[value=Search]").mouseleave(function(){
        	var tween = TweenMax.to('.search-bar .search input[value=Search]', 0.750, {css:{backgroundColor:'#50a4b9', border: 'none', color: 'white'}, ease:Power4.easeOut});
            
        });

//////////////////////////////////////////////////////////////////////////////////////////////////


$(".label-an, .label-an").mouseenter(function(){
            var tween = TweenMax.to('.label-an', 1, {css:{backgroundColor:'#f2f2f2', border: '1px solid #50a4b9', color:'#50a4b9', scale: 0.98}, ease:Power4.easeOut});  
        });

        $(".label-an, .label-an").mouseleave(function(){
            var tween = TweenMax.to('.label-an', 0.750, {css:{backgroundColor:'#303030', border: '1px solid white', color: 'white', scale: 1}, ease:Power4.easeOut});
            
        });

///////////////////////////////////////////////////////////////////////////////////////////////////

$(".btn-an, .btn-an").mouseenter(function(){
            var tween = TweenMax.to('.btn-an', 1, {css:{backgroundColor:'#f2f2f2', border: '1px solid #50a4b9', color:'#50a4b9', scale: 0.98}, ease:Power4.easeOut});  
        });

        $(".btn-an, .btn-an").mouseleave(function(){
            var tween = TweenMax.to('.btn-an', 0.750, {css:{backgroundColor:'#303030', border: '1px solid white', color: 'white', scale: 1}, ease:Power4.easeOut});
            
        });

///////////////////////////////////////////////////////////////////////////////////////////////////

$(".info-box, .info-box").mouseenter(function(){
            var tween = TweenMax.to('.info-box', 1, {css:{color:'#50a4b9'}, ease:Power4.easeOut});  
        });

        $(".info-box, .info-box").mouseleave(function(){
            var tween = TweenMax.to('.info-box', 0.750, {css:{color:'#8b8b8b'}, ease:Power4.easeOut});
            
        });                
      
