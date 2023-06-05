document.addEventListener("DOMContentLoaded", function(event) {

    window.Echo.private(`message.${room_id}`)
    .listen('.roomAs', (data) => {
        console.log('user_id '+user_id)
        console.log('mmm user id '+data.message.user_id)

        let listMessage = '';
        
        let file = ''
        if (data.message.file != null){
            file = `<div class="file-div">
                        <a href="/get-file?path=${data.message.file}" download><i class="bi bi-box-arrow-down"></i> File </a>
                    </div>`
        }

        if (data.message.user_id != user_id){
                listMessage = `
                    <li class="d-flex justify-content-start mb-4">
                        <img
                            src="/get-file?path=${data.message.user.roles[0].avatar}"
                            alt="avatar"
                            class="rounded-circle d-flex align-self-start me-3 shadow-1-strong"
                            width="60"
                        />
                        <div class="card">
                            <div class="card-header d-flex justify-content-between p-3">
                                <p class="fw-bold mb-0">${data.message.user.name}</p>
                                <p class="text-muted small mb-0 mx-3">
                                    <i class="far fa-clock"></i> ${formatDate(data.message.created_at)}
                                </p>
                            </div>
                            <div class="card-body mt-2">
                                <p class="mb-0">${data.message.content} </p>
                                ${file}
                            </div>
                        </div>
                    </li>`;

                    // roommate read message
                    readMessage(data.message.id, data.message.user_id)
                }
                else
                {
                    listMessage = `
                        <li class="d-flex justify-content-end mb-4">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between p-3">
                                    <p class="fw-bold mb-0">${data.message.user.name}</p>
                                    <p class="text-muted small mb-0 mx-3">
                                        <i class="far fa-clock"></i> ${formatDate(data.message.created_at)}
                                    </p>
                                </div>
                                <div class="card-body mt-2">
                                    <p class="mb-0">${data.message.content}</p>
                                    ${file}
                                </div>
                            </div>
                            <img
                                src="/get-file?path=${data.message.user.roles[0].avatar}"
                                alt="avatar"
                                class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong"
                                width="60"
                            />
                        </li>`;
                }
                $("#scroll_messages").append(listMessage);
                scrollToBottom()
        });

});

$(document).ready(function (){

    $('#send_message').on('submit', function(event){
        event.preventDefault();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
        });

        $.ajax({
                type: 'post',
                url: `/room/${room_id}/message-store`,
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(result){

                    scrollToBottom()
                    $('#file-up').val('')
                    $('#message_content').val('')

                }
        })

    })
})

// reade message in room
function readMessage(message_id, user_id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'get',
        url: `/message/${message_id}`,
        // data: {},
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            console.log(112233)
            document.getElementById('user_'+user_id).innerHTML = ''
        }
    })
}

function scrollToBottom() {
    let scrollmes = document.getElementById('scroll_messages');
    let elements = document.getElementById("scroll_messages").getElementsByTagName("li")
    let last_child_top = 0

    if(elements.length>0){
        last_child_top = elements[elements.length - 1].offsetTop
    }

        scrollmes.scrollTo({ behavior: "smooth", top: last_child_top });
}
scrollToBottom();


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
