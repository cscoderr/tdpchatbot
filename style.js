$(function(){
	var msgList = '';
	var k = 0;
	var msgBody = $('#msg_body');
	msgList += `<div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                  <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                  Hey Dude! i am tommydprogrammer, whats your name?
                </div>
              </div>`;
    msgBody.html(msgList);
	$('#submit').click(function(){
		var msg = $('#msg');

		if (msg.val() == "") {
		} else {
			msgList += `<div class="d-flex justify-content-end mb-4">
                <div class="msg_cotainer_send">
                ${msg.val()}
                  <span class="msg_time_send">8:55 AM, Today</span>
                </div>
                <div class="img_cont_msg">
                  <img src="img/user1.png" class="rounded-circle user_img_msg">
                </div>
              </div>`;
              msgBody.html(msgList);
              if(k == 6){""
              	msg.attr("disabled", "");
              }
             var formData = new FormData();
             formData.append('pssid', 'kjkjw838a3a839a0a');
             formData.append('msg', msg.val());
             formData.append('msgid', k);
			$.ajax({
			method : 'POST',
			url : 'http://localhost/chatbot/chat.php',
			processData : false,
			contentType : false,
			data : formData,
			success : function(responseTxt, statusTxt, xhr){
				// k++;
				var data = JSON.parse(responseTxt);
				if(data == ''){
					alert('ajax:null');
				} else{
					k = Number(data.k);
					msgList += `<div class="d-flex justify-content-start mb-4">
					                <div class="img_cont_msg">
					                  <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
					                </div>
					                <div class="msg_cotainer">
					                  ${data.msg}
					                </div>
					              </div>`;
				}
				msgBody.html(msgList);
			},
			error : function(responseTxt, statusTxt, xhr){
				alert('ajax:error');
			}
		});
			msg.val('');
		}
	});
})
//<span class="msg_time">8:40 AM, Today</span>