document.addEventListener("DOMContentLoaded", function(event) {

    window.Echo.private(`unread_messages_count.${user_id}`)
    .listen('.unreadMessagesCount', (data) => {
        console.log('aaaaaaaaa')
        console.log(data)

        if(typeof room_id !== 'undefined') {
            if(data.unreadMessageCount > 0 && room_id != data.roomId){
                document.getElementById('user_'+data.userId).innerHTML = `<span class="badge bg-danger float-end">${data.unreadMessageCount}</span>`

            }
        }
        else{
            if(data.unreadMessageCount > 0 ){
                document.getElementById('user_'+data.userId).innerHTML = `<span class="badge bg-danger float-end">${data.unreadMessageCount}</span>`

            }

        }

    })
})





