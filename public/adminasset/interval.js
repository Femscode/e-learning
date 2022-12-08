setInterval(function(){ 
   
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    

  const fd = new FormData;
var json = {    
}
        fd.append('login_data' , JSON.stringify(json));
        console.log(fd,'the fd')
        $.ajax({
            type: 'POST',
            url: 'https://editor.crownpersonalcare.com/crowndocs/pages/login/renew',
            data: fd,
            processData: false,
            xhrFields: {
        withCredentials: true
            },
            contentType: false
        }).done(function(resp) {
           
           console.log(resp,'session should be renewed now')
          
        }).fail(function(resp) {
           console.log(resp,'session renewal failed')
        
        });
        },2 * 3600 * 1000);
    // },12600000);
