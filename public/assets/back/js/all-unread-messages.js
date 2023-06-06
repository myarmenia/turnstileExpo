document.addEventListener("DOMContentLoaded", function(event) {

    window.Echo.private(`all_unread_messages.${user_id}`)
    .listen('.allUnreadMessages', (data) => {
        console.log(data)
        let content = ''
        let count = data.allUnreadMessages.original.count
        let result = data.allUnreadMessages.original.messages
        let messages = Object.values(result)

        if(typeof room_id !== 'undefined') {
            if(count > 0 && room_id != data.roomId){
                document.getElementById('unread-messages_count').innerHTML = `<span class="badge bg-success badge-number all-uread-message-count">${count}</span>`
                document.getElementById('span-unread-message-count').innerHTML = `<li class="dropdown-header">
                                You have <span >${count}</span>new messages
                            </li>`

                messages.forEach(message => {
                    console.log(message)
                    content +=`<li class="message-item">
                                    <a href="/room/${message.room_id}">
                                        <img src="/get-file?path=${message[0].user.roles[0].avatar}" alt="" class="rounded-circle">
                                        <div>
                                            <h4>${message[0].user.name}</h4>
                                            <p>${formatDate(message[0].created_at)}</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>`
                });
            }
        }
        else{
            if(count > 0 ){
                document.getElementById('unread-messages_count').innerHTML = `<span class="badge bg-success badge-number all-uread-message-count">${count}</span>`
                document.getElementById('span-unread-message-count').innerHTML = `<li class="dropdown-header">
                                You have <span >${count}</span>new messages
                            </li>`

                messages.forEach(message => {
                    console.log(message)
                    content +=`<li class="message-item">
                                    <a href="/room/${message.room_id}">
                                        <img src="/get-file?path=${message[0].user.roles[0].avatar}" alt="" class="rounded-circle">
                                        <div>
                                            <h4>${message[0].user.name}</h4>
                                            <p>${formatDate(message[0].created_at)}</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>`
                });
            }
        }

        document.getElementById('li-messages').innerHTML = content

    })
})

$('.nav-profile').on('click', function(event){
    $(this).toggleClass('show')
    $('.profile').toggleClass('show')

})

$('.unread-messages').on('click', function(event){
    $(this).toggleClass('show')
    $('.messages').toggleClass('show')

})

const formatDate = (date) => {
    let d = new Date(date);
    let month = (d.getMonth()+1).toString().padStart(2, '0');
    let day = d.getDate().toString().padStart(2, '0');
    let year = d.getFullYear();
    let hour = d.getHours().toString().padStart(2, '0');
    let minute = d.getMinutes().toString().padStart(2, '0');
    let data = day+'-'+month+'-'+year+' '+hour+':'+minute

        return data
}
