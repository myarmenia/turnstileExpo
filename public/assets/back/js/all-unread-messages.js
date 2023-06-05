document.addEventListener("DOMContentLoaded", function(event) {

    window.Echo.private(`all_unread_messages.${user_id}`)
    .listen('.allUnreadMessages', (data) => {
        console.log(data)
        let content = ''
        let count = data.allUnreadMessages.original.length
        if(count > 0 ){
            document.getElementById('unread-messages_count').innerHTML = `<span class="badge bg-success badge-number all-uread-message-count">${count}</span>`


            data.allUnreadMessages.original.forEach(message => {
                console.log(message)
                content +=`<li class="message-item">
                                <a href="{{route('room', $message->room_id )}}">
                                    <img src="/get-file?path=${message.user.roles[0].avatar}" alt="" class="rounded-circle">
                                    <div>
                                        <h4>${message.user.name}</h4>

                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>`
            });
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
