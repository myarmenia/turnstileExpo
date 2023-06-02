document.addEventListener("DOMContentLoaded", function(event) {

    window.Echo.private(`message.${room_id}`)
    .listen('.roomAs', (data) => {
        console.log(data)
        let listMessage = '';
        let user_id = "{{auth()->user()->id}}";
        let file = ''
        if (data.message.file != null){
            file = `<div>
                        <a href="/get-file?path=${data.message.file}" download> File </a>
                    </div>`
        }

        if (data.message.user_id == user_id){
                listMessage += `
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
                                    <i class="far fa-clock"></i> 12 mins ago
                                </p>
                            </div>
                            <div class="card-body">
                                <p class="mb-0">${data.message.content} </p>
                                ${file}
                            </div>
                        </div>
                    </li>`;
                }
                else
                {
                    listMessage += `
                        <li class="d-flex justify-content-end mb-4">
                            <div class="card w-100">
                                <div class="card-header d-flex justify-content-between p-3">
                                    <p class="fw-bold mb-0">${data.message.user.name}</p>
                                    <p class="text-muted small mb-0 mx-3">
                                        <i class="far fa-clock"></i> 13 mins ago
                                    </p>
                                </div>
                                <div class="card-body">
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
                url: "/room/1/message-store",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success: function(result){
                    console.log(3333333333333333)
                    scrollToBottom()
                    $('#file-up').val('')
                    // let user = "{{auth()->user()}}";
                    $('#message_content').val('')
                    // let listMessage = `
                    //         <li class="d-flex justify-content-between mb-4">
                    //             <img
                    //                 src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                    //                 alt="avatar"
                    //                 class="rounded-circle d-flex align-self-start me-3 shadow-1-strong"
                    //                 width="60"
                    //             />
                    //             <div class="card">
                    //                 <div class="card-header d-flex justify-content-between p-3">
                    //                 <p class="fw-bold mb-0">${user.name}</p>
                    //                 <p class="text-muted small mb-0">
                    //                     <i class="far fa-clock"></i> 12 mins ago
                    //                 </p>
                    //                 </div>
                    //                 <div class="card-body">
                    //                 <p class="mb-0">${message} </p>
                    //                 </div>
                    //             </div>
                    //         </li>`;
                    // $("#scroll_messages").append(listMessage);


                }
        })

    })
})
function scrollToBottom() {
    let scrollmes = document.getElementById('scroll_messages');
console.log(scroll_div.scrollHeight)

    scrollmes.scrollTo({ behavior: "smooth", top: scroll_div.scrollHeight + 100 });
    // scrollmes.scrollTo=scroll_div.scrollHeight

  }
  scrollToBottom();
