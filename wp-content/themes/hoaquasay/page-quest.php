	<?php  
		/* 
			Template Name: Template Quest 
		*/ 
	?>
<?php get_header(); ?>
<style>
#showDiv{display:none;}
</style>
	<div class="container">
		<div class="pull-right main-container">
			<?php get_breadcrumb_navigation(); ?>
			<h1 class="titlePosts"><?php the_title(); ?></h1>
			<div class="quest-info">
		<script>
		$(document).ready(function() {
			$("#startQuest").click(function (){
					$('html, body').animate({
						scrollTop: $("#showDiv").offset().top
					}, 1500);
			});
		});	
		
		var score; 						
		function ShowTemp() {
			  score=0;
			  for(var j=1;j<=20;j++){
					   var q = document.getElementsByName("q"+j);

					   if(q.length>0) {
						 if(!val(q)){
							return false;
						  }
						 for(var i=0;i<q.length;i++) {
						   if(q[i].checked) {
								score+=parseInt(q[i].value);
								break;       
							 }
						  }
						}else {
							break;
						}
					}
		}				
											
	function startQuest() {
		var showDiv= document.getElementById("showDiv");   
		var showscore= document.getElementById("score");  
		if(ShowTemp()==false) {
			alert("Bạn chưa chọn câu trả lời");
			return ;
		}
		 if(score<=0) {
		    alert("dca");
			return;
		 }
		 else if(score<10) {
		    showscore.innerHTML="<strong>Điểm của bạn: "+score+" Bệnh giai đoạn 1</strong>";
		 }
		 else if(score>=10&&score<=15) {
            showscore.innerHTML="<strong>Điểm của bạn: "+score+" Bệnh giai đoạn 2</strong>";
		 }
		 else if(score>15&&score<=20){
		    showscore.innerHTML="<strong>Điểm của bạn: "+score+" Bệnh giai đoạn cuối</strong>";
		 }
		 showDiv.style.display="block";
      }
	  
		function closeQuest()  {
				var closeQ = document.getElementById("showDiv");
				closeQ.style.display="none";
		}
		function val(radioList) {
				for(var i=0;i<radioList.length;i++){
					if(radioList[i].checked){
						return true;
					}
				 }
					return false;
			  }
				
				
				</script>
				<form id="frm" class="" name="frm" method="POST" action="">
					<div class="quest-input">
						<h3> Câu 1：Câu hỏi 1?</h3>
						<div class="quest-rdo">
						  <ul>
							A.
							<input type="radio" name="q1" id="q1" value="1"/>
							<label for="q1a"> 1 điểm</label>
							<br>
							B.
							<input type="radio" name="q1" id="q1" value="2">
							<label for="q1b"> 2 điểm</label>
							<br>
							C.
							<input type="radio" name="q1" id="q1" value="3">
							<label for="q1c"> 3 điểm</label>
							<br>
							D.
							<input type="radio" name="q1" id="q1" value="4">
							<label for="q1d"> 4 điểm</label>
							<br>
						  </ul>
						</div>
					  </div>
					  
					  <div class="quest-input">
						<h3> Câu 2：Câu hỏi 2?</h3>
						<div class="quest-rdo">
						  <ul>
							A.
							<input type="radio" name="q2" id="q2" value="1"  />
							<label for="q2a"> 1 điểm</label>
							<br>
							B.
							<input type="radio" name="q2" id="q2" value="2">
							<label for="q2b"> 2 điểm</label>
							<br>
							C.
							<input type="radio" name="q2" id="q2" value="3">
							<label for="q2c"> 3 điểm</label>
							<br>
							D.
							<input type="radio" name="q2" id="q2" value="4">
							<label for="q2d"> 4 điểm</label>
							<br>
						  </ul>
						</div>
					  </div>
					  
					  <div class="quest-input">
						<h3> Câu 3：Câu hỏi 3?</h3>
						<div class="quest-rdo">
						  <ul>
							A.
							<input type="radio" name="q3" id="q3" value="1"  />
							<label for="q3a"> 1 điểm</label>
							<br>
							B.
							<input type="radio" name="q3" id="q3" value="2">
							<label for="q3b"> 2 điểm</label>
							<br>
							C.
							<input type="radio" name="q3" id="q3" value="3">
							<label for="q3c"> 3 điểm</label>
							<br>
							D.
							<input type="radio" name="q3" id="q3" value="4">
							<label for="q3d"> 4 điểm</label>
							<br>
						  </ul>
						</div>
					  </div>
					  
					  <div class="quest-input">
						<h3> Câu 4：Câu hỏi 4?</h3>
						<div class="quest-rdo">
						  <ul>
							A.
							<input type="radio" name="q4" id="q4" value="1"  />
							<label for="q4a"> 1 điểm</label>
							<br>
							B.
							<input type="radio" name="q4" id="q4" value="2">
							<label for="q4b"> 2 điểm</label>
							<br>
							C.
							<input type="radio" name="q4" id="q4" value="3">
							<label for="q4c"> 3 điểm</label>
							<br>
							D.
							<input type="radio" name="q4" id="q4" value="4">
							<label for="q4d"> 4 điểm</label>
							<br>
						  </ul>
						</div>
					  </div>
					  
					  <div class="quest-input">
						<h3> Câu 5：Câu hỏi 5?</h3>
						<div class="quest-rdo">
						  <ul>
							A.
							<input type="radio" name="q5" id="q5" value="1" />
							<label for="q5a"> 1 điểm</label>
							<br>
							B.
							<input type="radio" name="q5" id="q5" value="2">
							<label for="q5b"> 2 điểm</label>
							<br>
							C.
							<input type="radio" name="q5" id="q5" value="3">
							<label for="q1c"> 3 điểm</label>
							<br>
							D.
							<input type="radio" name="q5" id="q5" value="4">
							<label for="q5d"> 4 điểm</label>
							<br>
						  </ul>
						</div>
					  </div>
					  <div id="showDiv">
						<div id="score" style="text-align: center"> </div>
						<p>Chữa hẹp bao quy đầu như thế nào? 
						luôn là chủ đề được nhiều người bệnh quan tâm và tìm hiểu bởi đây là cách duy nhất 
						giúp họ có thể sớm thoát khỏi những ảnh hưởng tồi tệ do bệnh gây ra. 
						Dưới đây các bác sĩ phòng khám An Khang xin bật bí cách chữa hẹp bao quy đầu
						đơn giản và hiệu quả nhất.</p>
					</div>
					<div class="input-group">
						<a onclick="startQuest()" href="javascript:void(0)" id="startQuest" class="btn btn-primary" value="">Xem tình hình của bạn</a>
						&nbsp
						<input type="button" onclick="closeQuest()" id="closeButton" class="btn btn-danger" value="Đóng lại"/>	
					</div>
				</form>
			</div>

		</div>

	<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
