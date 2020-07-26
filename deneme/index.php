<!doctype html public "-//W3C//DTD HTML 4.0 //EN">

<html>

<head>
<title>Demos :  99Points.info : Fresh Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax</title>

<link href="facebox.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="jquery.livequery.js"></script>
<link href="dependencies/screen.css" type="text/css" rel="stylesheet" />

<script src="jquery.elastic.js" type="text/javascript" charset="utf-8"></script>

<script src="jquery.watermarkinput.js" type="text/javascript"></script>

<script type="text/javascript">

	// <![CDATA[	

	$(document).ready(function(){	
	
		$('#shareButton').click(function(){

			var a = $("#watermark").val();
			if(a != "What's on your mind?")
			{
				$.post("posts.php?value="+a, {
	
				}, function(response){
					
					$('#posting').prepend($(response).fadeIn('slow'));
					$("#watermark").val("What's on your mind?");
				});
			}
		});	
		
		
		$('.commentMark').livequery("focus", function(e){
			
			var parent  = $('.commentMark').parent();
			$(".commentBox").children(".commentMark").css('width','320px');
			$(".commentBox").children("a#SubmitComment").hide();
			$(".commentBox").children(".CommentImg").hide();			
		
			var getID =  parent.attr('id').replace('record-','');			
			$("#commentBox-"+getID).children("a#SubmitComment").show();
			$('.commentMark').css('width','300px');
			$("#commentBox-"+getID).children(".CommentImg").show();			
		});	
		
		//showCommentBox
		$('a.showCommentBox').livequery("click", function(e){
			
			var getpID =  $(this).attr('id').replace('post_id','');	
			
			$("#commentBox-"+getpID).css('display','');
			$("#commentMark-"+getpID).focus();
			$("#commentBox-"+getpID).children("CommentImg").show();			
			$("#commentBox-"+getpID).children("a#SubmitComment").show();		
		});	
		
		//SubmitComment
		$('a.comment').livequery("click", function(e){
			
			var getpID =  $(this).parent().attr('id').replace('commentBox-','');	
			var comment_text = $("#commentMark-"+getpID).val();
			
			if(comment_text != "Write a comment...")
			{
				$.post("add_comment.php?comment_text="+comment_text+"&post_id="+getpID, {
	
				}, function(response){
					
					$('#CommentPosted'+getpID).append($(response).fadeIn('slow'));
					$("#commentMark-"+getpID).val("Write a comment...");					
				});
			}
			
		});	
		
		//more records show
		$('a.more_records').livequery("click", function(e){
			
			var next =  $('a.more_records').attr('id').replace('more_','');
			
			$.post("posts.php?show_more_post="+next, {

			}, function(response){
				$('#bottomMoreButton').remove();
				$('#posting').append($(response).fadeIn('slow'));

			});
			
		});	
		
		//deleteComment
		$('a.c_delete').livequery("click", function(e){
			
			if(confirm('Are you sure you want to delete this comment?')==false)

			return false;
	
			e.preventDefault();
			var parent  = $('a.c_delete').parent();
			var c_id =  $(this).attr('id').replace('CID-','');	
			
			$.ajax({

				type: 'get',

				url: 'delete_comment.php?c_id='+ c_id,

				data: '',

				beforeSend: function(){

				},

				success: function(){

					parent.fadeOut(200,function(){

						parent.remove();

					});

				}

			});
		});	
		
		/// hover show remove button
		$('.friends_area').livequery("mouseenter", function(e){
			$(this).children("a.delete").show();	
		});	
		$('.friends_area').livequery("mouseleave", function(e){
			$('a.delete').hide();	
		});	
		/// hover show remove button
		
		
		$('a.delete').livequery("click", function(e){

		if(confirm('Are you sure you want to delete this post?')==false)

		return false;

		e.preventDefault();

		var parent  = $('a.delete').parent();

		var temp    = parent.attr('id').replace('record-','');

		var main_tr = $('#'+temp).parent();

			$.ajax({

				type: 'get',

				url: 'delete.php?id='+ parent.attr('id').replace('record-',''),

				data: '',

				beforeSend: function(){

				},

				success: function(){

					parent.fadeOut(200,function(){

						main_tr.remove();

					});

				}

			});

		});

		$('textarea').elastic();

		jQuery(function($){

		   $("#watermark").Watermark("What's on your mind?");
		   $(".commentMark").Watermark("Write a comment...");

		});

		jQuery(function($){

		   $("#watermark").Watermark("watermark","#369");
		   $(".commentMark").Watermark("watermark","#EEEEEE");

		});	

		function UseData(){

		   $.Watermark.HideAll();

		   //Do Stuff

		   $.Watermark.ShowAll();

		}

	});	

	// ]]>

</script>

</head>

<body>

<h1>Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.</h1>

	<div align="center">
	
		<form action="" method="post" name="postsForm">
	
		<div class="UIComposer_Box">
	
		<span class="w">
		<textarea class="input" id="watermark" name="watermark" style="height:20px" cols="60"></textarea>
		</span>
	
			<br clear="all" />
			
			<div align="left" style="height:30px; padding:10px 5px;">
				
				<span style="float:left">&nbsp;PHP, Codeigniter, JQuery, AJAX Programming + Tutorials ( <a href="http://www.99points.info" target="_blank" style="color:#EC092B">www.99Points.info</a> )&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;
				</span>
				<a id="shareButton" style="float:left" class="smallbutton Detail"> Share</a>
	
			</div>
	
		</div>
	
		</form>
	
		<br clear="all" />
	
		<div id="posting" align="center">
	
		<?php
		include('dbcon.php');
		
		include_once('posts.php');?>
		  
		</div>
	</div>

<br clear="all" /><br clear="all" /><br clear="all" />
<br clear="all" />

 <!-- FaceBook Button Start, Remove Or leave -->

		     <a href='http://www.facebook.com/sharer.php?u=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' target='_blank' title='Add To Facebook'><img alt='Add To Facebook' border='0' class='icon-action' src='http://3.bp.blogspot.com/_vLeiVavkV_M/SnleIlLdGwI/AAAAAAAABd8/RfHnWIGGMEY/s200/facebook.png'/></a>

		     <!-- FaceBook Button End, Remove Or leave -->

  

			  <!-- Stumbleupon Button Start, Remove Or leave -->

			  <a href='http://www.stumbleupon.com/refer.php?url=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' target='_blank' title='Stumble This'><img alt='Stumble This' border='0' class='icon-action' src='http://2.bp.blogspot.com/_vLeiVavkV_M/SnleiulEMVI/AAAAAAAABeU/kO09nNTlQeo/s200/stumbleupon.png'/></a>

			  <!-- Stumbleupon Button End, Remove Or leave -->



			  <!-- Digg Button Start, Remove Or leave -->

			  <a target='_blank' href='http://digg.com/submit?phase=2&amp;url=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' title='Digg This'><img alt='Digg This' border='0' class='icon-action' src='http://3.bp.blogspot.com/_vLeiVavkV_M/Snld_x-wXoI/AAAAAAAABd0/cTsGU_Y-zQ8/s200/digg.png'/></a>

			  <!-- Digg Button End, Remove Or leave -->

     		  



			  <!-- Delicious Button Start, Remove Or leave -->

			  <a href='http://del.icio.us/post?url=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' target='_blank' title='Add To Del.icio.us'><img alt='Add To Del.icio.us' border='0' class='icon-action' src='http://2.bp.blogspot.com/_vLeiVavkV_M/Snld35mPSDI/AAAAAAAABds/ccrOpOmP9Zk/s200/delicious.png'/></a>

			  <!-- Delicious Button End, Remove Or leave -->

				

			  <!-- Reddit Button Start, Remove Or leave -->

			  <a href='http://reddit.com/submit?url=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' target='_blank' title='Add To Reddit'><img alt='Add To Reddit' border='0' class='icon-action' src='http://3.bp.blogspot.com/_vLeiVavkV_M/SnleX1tMMtI/AAAAAAAABeM/gQSYdrmSc3k/s200/reddit.png'/></a>



			  <!-- Reddit Button End, Remove Or leave -->

			

			  <!-- Yahoo Button Start, Remove Or leave -->

			  <a href='http://myweb2.search.yahoo.com/myresults/bookmarklet?t=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&amp;title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' target='_blank' title='Add To Yahoo'><img alt='Add To Yahoo' border='0' class='icon-action' src='http://1.bp.blogspot.com/_vLeiVavkV_M/SnlexsGX2QI/AAAAAAAABes/ai6zvzZKCgw/s200/yahoo.png'/></a>

				

			  <!-- Yahoo Button End, Remove Or leave -->

		

			  <a href='http://twitthis.com/twit?url=http://www.99points.info/2010/07/facebook-style-wallpost-and-comments-system-using-jquery-ajax-and-php-reloaded/&title=Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax.' target='_blank' title='Tweet This' >

			  <img src='http://www.99points.info/wp-content/themes/twitterico.png' alt='Add To Twitter' border='0' height="48" class='icon-action' /></a>
			  
			  <br clear="all" /><br clear="all" /><br clear="all" />
			  
			  
</body>

</html>

