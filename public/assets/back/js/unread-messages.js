document.addEventListener("DOMContentLoaded", function(event) {

    console.log(room_id)
    window.Echo.private(`unread_messages_count.${user_id}`)
    .listen('.unreadMessagesCount', (data) => {
        console.log('aaaaaaaaa')
        console.log(data)
        if(data.unreadMessageCount > 0 && room_id != data.roomId){
            document.getElementById('user_'+data.userId).innerHTML = `<span class="badge bg-danger float-end">${data.unreadMessageCount}</span>`
        }

    })
})
