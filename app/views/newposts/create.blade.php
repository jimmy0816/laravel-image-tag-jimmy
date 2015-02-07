@extends('layout')

@section('content')
<style>
@import url(//fonts.googleapis.com/css?family=Lato:700);

body {
   margin:0;
   font-family:'Lato', sans-serif;
   text-align:center;
   color: #999;
}

.welcome {
   width: 300px;
   height: 200px;
   position: absolute;
   left: 50%;
   top: 50%;
   margin-left: -150px;
   margin-top: -100px;
}

a, a:visited {
   text-decoration:none;
}

h1 {
   font-size: 32px;
   margin: 16px 0 0 0;
}

.l-box {
   padding: 1em;
}	
.button-secondary {
   background: rgb(66, 184, 221); /* this is a light blue */
} 

.home-menu .pure-menu-heading {
   color: white;
   font-weight: 400;
   font-size: 120%;
}

.home-menu .pure-menu-selected a {
   color: white;
}

.home-menu a {
   color: #6FBEF3;
}
.home-menu li a:hover,
.home-menu li a:focus {
   background: none;
   border: none;
   color: #AECFE5;
}


/*
 * -- SPLASH STYLES --
 * This is the blue top section that appears on the page.
 */

 .splash-container {
 	background: #18bc9c;
 	z-index: 1;
 	overflow: hidden;
 	/* The following styles are required for the "scroll-over" effect */
 	width: 100%;
 	height: 88%;
 	top: 0;
 	left: 0;
 	position: fixed !important;
    margin-top: 110px;
}

.splash {
  /* absolute center .splash within .splash-container */
  width: 80%;
  height: 50%;
  margin: auto;
  position: absolute;
  top: 100px; left: 0; bottom: 0; right: 0;
  text-align: center;
  text-transform: uppercase;
}

/* This is the main heading that appears on the blue section */
.splash-head {
  font-size: 20px;
  font-weight: bold;
  color: white;
  border: 3px solid white;
  padding: 1em 1.6em;
  font-weight: 100;
  border-radius: 5px;
  line-height: 1em;
}


/* This is the class used for the main content headers (<h2>) */
.content-head {
  font-weight: 400;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  margin: 2em 0 1em;
}
.button-success {
    color:white;
    background: rgb(28, 184, 65); /* this is a green */
}
.input-tags{
    width: 100%;
    height: 40px;
}
</style>
<section id="portfolio">
    <div class="splash-container">    
       <div class="row">
          <div class="col-md-12">
             {{ Form::open(array('url' => 'newposts','files' => 'true')) }}

             <div class="content-wrapper">
                <div class="splash">
                   <div class="x">
                      <div class="pure-u-1 pure-u-md-1-3 img-field"><button class="button-small pure-button btn-upload"> 上傳圖片</button></div>
                      <div class="pure-u-1 pure-u-md-1-3"><div class="l-box img-preview"></div></div>
                      <input type="file" accept='image/*' name="image" class="input-file" hidden>
                  </div>	
                  <div class="x">
                      <div class="pure-u-1 pure-u-md-1-3" height="360px"><p>標籤(多個標籤用空格分隔):</p></div>
                      <div class="pure-u-1 pure-u-md-1-3"><input type="text" class="input-tags" name="tags" id="tags"></div>

                  </div>
                  <div class="x">
                      <div class="pure-u-1 pure-u-md-1-3" height="360px"><p>我的標籤:</p></div>
                      <div class="pure-u-1 pure-u-md-1-3 label-tag" height="360px">
                        @foreach($tags as $item)
                        <button data-tag="{{$item->name}}">{{$item->name}}</button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="">
              <div class="pure-u-1 pure-u-md-1-3"> <button class="button-success pure-button" id="btn-submit">save</button> </div>
          </div>	
      </div>
  </div>
</div>
{{ Form::close() }}
</div>
</section>
@stop

@section('script')
<script>
$(function(){

   $('.btn-upload').on('click',function(){
      event.preventDefault();
      $('.input-file').trigger('click');
  });

   $('.label-tag').on('click','button',function(){

      event.preventDefault();
      var tags = $('#tags');
      var oldTags = tags.val();
      var newTag = $(this).html();
      var res = oldTags.split(" ");

        // console.log(res);
        var blnExist =false;
        res.forEach(function(item){
        	if(item == newTag) blnExist = true;
        })
        if(!blnExist){
        	tags.val(oldTags+" "+newTag);   
        }

        tags.focus();
        
    });

   $('.input-file').on('change',function(event){
      var input = event.target;
      console.log(event);
      var reader = new FileReader();
      reader.onload = function(){
         var dataURL = reader.result;
         var imageObj = new Image();
         imageObj.src = dataURL;

         var oraginalW =imageObj.width;
         var oraginalH =imageObj.height;

         if(oraginalW > 360 || oraginalH > 360){

            if(oraginalW > oraginalH){
               imageObj.width = 360;
               imageObj.height = 360 * (oraginalH / oraginalW);
           }else{
               imageObj.height = 360;
               imageObj.width = 360 * (oraginalW / oraginalH);

           }
       }
				// console.log(imageObj.width,imageObj.height);
				$('.img-preview').html(imageObj);
			};
			if(input.files[0])reader.readAsDataURL(input.files[0]);			
		});

	// $('#btn-submit').on('click',function(){
	// 	$('form').submit();
	// })
});
</script>
@stop
